<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Komentar;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function home()
    {
        // Mengambil semua produk
        $produk = Produk::all()->take(8);

        // Mengambil 4 produk terbaru
        $produkTerbaru = Produk::orderBy('created_at', 'desc')->take(4)->get();

        return view('home', compact('produk', 'produkTerbaru'));
    }

    public function createView()
    {
        return view('rentaru.actions.create');
    }

    public function createLogic(Request $request)
    {
        // merequest semua data yang dimasukkan pada website kemudian di input ke database
        $table = Produk::create($request->except('_token'));

        //untuk memasukkan file foto ke dalam folder assets dan juga menambahkan original name dari foto ke db
        if($request->hasFile('gambar','logoToko')){
            $request->file('gambar')->move('assets/', $request->file('gambar')->getClientOriginalName());
            $request->file('logoToko')->move('assets/', $request->file('logoToko')->getClientOriginalName());
            $table->gambar = $request->file('gambar')->getClientOriginalName();
            $table->logoToko = $request->file('logoToko')->getClientOriginalName();
            $table->save();
        }

        return redirect('/home');
    }

    public function produkView($id)
    {
        // memanggil data di databases sesuai id yang dipilih
        $produk = Produk::find($id);

        return view('rentaru.produk', compact(['produk']));
    }

    public function komentarLogic(Request $request, $id)
    {
        $comment = new Komentar();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->produk_id = $id; // Assign the product ID to the comment
    
        $comment->save();
    
        // Redirect back to the product view page with the corresponding product ID
        return redirect()->route('produkView', ['id' => $id]);
    }
    
    public function favoriteView()
    {
        $user = auth()->user();
        $favoriteProducts = $user->favoriteProducts;
    
        return view('rentaru.favorite', compact('favoriteProducts'));
    }

}
