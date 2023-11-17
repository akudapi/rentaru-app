@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/favorite.css') }}">

    {{-- HEADER --}}
    <nav class="navigasi">
        <ul>
            <li><a href="{{ route('home') }}"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg><a/></li>
            <div class="navigasi-2">
                <ul>
                    <li><h5>Produk Favorit</h5></li>
                </ul>
            </div>
        </ul>
    </nav>

    <div class="produk_container">

        <!-- PRODUK -->
        <section class="produk-container" style="height: 480px">
            @if (isset($favoriteProducts) && !$favoriteProducts->isEmpty())
                @foreach ($favoriteProducts as $favoriteProduct)
                    <div class="produk-space">
                        <div class="produk-box" onclick="window.location.href = '/home/produk/{{$favoriteProduct->id}}'">
                            <img src="{{ asset('assets/'.$favoriteProduct->gambar) }}" alt="Gambar Produk">
                            <h3>{{$favoriteProduct->judulProduk}}</h3>
                            <h4>{{$favoriteProduct->harga}}</h4>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <h4 style="margin-top: 50px">Anda belum memiliki produk favorit.</h4>
                </div>
            @endif
        </section>

    </div>

@endsection
