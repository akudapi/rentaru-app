@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/produk.css') }}">

{{-- NAVBAR --}}
<nav class="navigasi">
    <ul>
        <li><a href="javascript:history.back()"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg><a/></li>
        <div class="navigasi-2">
            <ul>
                <li><h5>Produk</h5></li>
            </ul>
        </div>
    </ul>
</nav>

<div class="container-fluid">
    
    {{-- BAGIAN PRODUK  --}}
    <div class="d-flex" style="margin: 0 50px 0 50px">
        <div class="produk-img">
            <img src="{{asset('assets/'.$produk->gambar)}}" alt="foto produk">
        </div>

        <div class="produk-con">
            <div class="product-space">

                <div>
                    <label for="label" class="labelan">Nama Produk:</label>
                    <p class="product">{{$produk->judulProduk}}</p>
                </div>
                <div>
                    <label for="label" class="labelan">Harga Sewa:</label>
                    <p class="product">{{$produk->harga}}</p>
                </div>
                <div>
                    <label for="label" class="labelan">Alamat Toko:</label>
                    <p class="product">{{$produk->alamatToko}}</p>
                </div>
                <div>

                    <div class="d-flex">
                        <a href="{{ $produk->sosmed }}" type="submit" class="btn btn-secondary btn-set">Hubungi Penjual</a>


                        @if (auth()->check()) <!-- Pastikan pengguna sudah login -->
                            @php
                                $isFavorite = $produk->favorite()->where('user_id', auth()->user()->id)->count() > 0;
                            @endphp

                            @if ($isFavorite)
                                <form action="{{ route('removeFromFavorite', $produk->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-set">Hapus dari Favorit</button>
                                </form>
                            @else
                                <form action="{{ route('addToFavorite', $produk->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-set">Tambahkan ke Favorit</button>
                                </form>
                            @endif
                        @endif
                    </div>


                        {{-- <form action="{{ route('addToFavorite', ['produk_id' => $produk->id]) }}" method="POST">
                            <input type="submit" class="btn btn-secondary btn-set" value="Masukkan Favorite">
                        </form> --}}
                    </div>

                </div>

            </div>
        </div>
    </div>

    <section class="R">
        <!--profil dari akun penjual-->
        <div class="pp">
            <img src="{{asset('assets/'.$produk->logoToko)}}">{{$produk->namaToko}}</i>
        </div>
    </section>

    {{-- DESKRIPSI PRODUK --}}
    <div class="deskripsi-sett">
        <div class="deskripsi-box">
            <p>{{$produk->deskripsi}}</p>
        </div>
    </div>

    {{-- KOMENTAR --}}
    <div class="komentar-con">
        <div class="komentar">

            <div class="title-komentar">
                <h2>Tinggalkan Komentar:</h2>
            </div>

            {{-- FORM UNTUK MENINGGALKAN KOMENTAR --}}
            <form action="{{ route('komentarLogic', ['id' => $produk->id]) }}" method="post">

                @csrf
                <div class="mt-4 mx-5">
                    <label for="label" class="form-label">Name:<br><span style="font-size: 10px; color:red;">*Maximal 18 Karakter</span></label>
                    <input type="text" class="form-control" name="name" maxlength="18">
                </div>
                <div class="mt-4 mx-5">
                    <label for="label" class="form-label">Komentar:<br><span style="font-size: 10px; color:red;">*Maximal 255 Karakter</span></label>
                    <input type="text" class="form-control" name="comment" placeholder="Komentar......." maxlength="255">
                </div>

                <div class="btn-sett">
                    <input type="submit" class="btn btn-secondary" name="submit" value="Kirim Komentar">
                </div>
                
            </form>
            
        </div>
    </div>

    {{-- MENAMPILKAN KOMENTAR DISINI --}}
    <div class="komen-css">
        <hr>
        @foreach($produk->comments as $comment)
            <div class="komen-box">
                <div class="komen-user">
                    <p>
                        <strong>{{ $comment->name }}</strong>
                        <span style="font-size: 8px">{{ $comment->created_at }}</span>
                    </p>
                </div>
                <div class="komen-isi">
                    <p>{{ $comment->comment }}</p>
                </div>
                <hr>
            </div>
        @endforeach
    </div>
    
</div>

@endsection