<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite; // Ganti sesuai dengan namespace dan model yang sesuai
use App\Models\Produk;

class FavoriteController extends Controller
{
    /**
     * Menambahkan item ke daftar favorit.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    //function favorite
    public function addToFavorite(Request $request, $id)
    {
        $user = auth()->user(); // Mengambil user yang saat ini sedang login
        $produk = Produk::find($id);

        // Periksa apakah item sudah ada dalam daftar favorit
        $existingFavorite = Favorite::where('user_id', $user->id)
            ->where('produk_id', $produk)
            ->first();

        if ($existingFavorite) {
            return response()->json(['message' => 'Item sudah ada dalam daftar favorit.'], 400);
        }

        $favorite = Favorite::where('user_id', $user->id)
            ->where('produk_id', $produk->id)
            ->first();

        // Tambahkan item ke daftar favorit
        if (!$favorite) {
            $favorite = new Favorite();
            $favorite->user_id = $user->id;
            $favorite->produk_id = $produk->id;
            $favorite->save();

            return redirect()->back()->with('success', 'Produk telah ditambahkan ke Favorit.');
        } else {
            return redirect()->back()->with('error', 'Produk sudah ada di Favorit Anda.');
        }
    }

    /**
     * Menghapus item dari daftar favorit.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeFromFavorite(Request $request, $id)
    {
        $user = auth()->user(); // Mengambil user yang saat ini sedang login
        $produk = Produk::find($id);

        // Temukan item favorit yang sesuai
        $favorite = Favorite::where('user_id', $user->id)
        ->where('produk_id', $produk->id)
        ->first();
    

        if ($favorite) {
            // Hapus item dari daftar favorit
            $favorite->delete();

            return redirect()->back()->with('success', 'Produk telah ditambahkan ke Favorit.');
        } else {
            return redirect()->back()->with('error', 'Produk sudah ada di Favorit Anda.');
        }
        // Hapus item dari daftar favorit
        $favorite->delete();

        return redirect()->back()->with('success', 'Produk telah ditambahkan ke Favorit.');
    }

    /**
     * Mendapatkan daftar item favorit untuk pengguna saat ini.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFavoriteItems()
    {
        $user = auth()->user(); // Mengambil user yang saat ini sedang login
        $favoriteItems = Favorite::where('user_id', $user->id)->get();

        return response()->json(['favorite_items' => $favoriteItems]);
    }
}
