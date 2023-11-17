@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- HEADER AND NAVBAR -->
    <header class="navbar text-light">
        
        <div class="container-fluid me-3">
            <!-- Nama User dan dropdown logout -->
            <section class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </section>
            <!-- favorite -->
            <section class="nav-item nav-gap">

                {{-- FORM UNTUK KE HALAMAN TAMBAH PRODUK --}}
                <a href="{{ route('createView') }}" class="image-container">
                    <img class="icon" src="{{ asset('assets/ICON TAMBAH.svg') }}" alt="Icon Tambah">
                    <span class="tooltips">Tambahkan Produk</span>
                </a>
            
                {{-- FORM UNTUK KE HALAMAN FAVORITE --}}
                <a href="{{ route('favoriteView') }}" class="image-container">
                    <img src="{{asset('assets/STAR.svg')}}" alt="">
                    <span class="tooltips">Favorite</span>
                </a>

            </section>
        </div>

    </header>

    {{-- STICKY NAVBAR --}}
    <nav class="sticky-navbar">

        <!-- search bar -->
        <section id="navbar">
            <form>
                <input class="form-control me-1" style="max-width: 500px" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </section>

    </nav>

    <!-- BANNER -->
    <section class="banner">
        <a href="#"><img src="{{ asset('assets/PURPLE BANNER.jpeg') }}" alt="Banner"></a>
    </section>

    <!-- JUDUL2 -->
    <section class="text-title">
        <p>Produk Terbaru</p>
    </section>

    <!-- PRODUK -->
    <section class="produk-container">
        @foreach ($produkTerbaru as $dp)
            <div class="produk-space">
                <a style="text-decoration: none" class="text-white" href="/home/produk/{{$dp->id}}">
                    <div class="produk-box">
                        <img src="{{ asset('assets/'.$dp->gambar) }}"; alt="Gambar Produk">
                        <h3>{{$dp->judulProduk}}</h3>
                        <h4>{{$dp->harga}}</h4>
                    </div>
                </a>
            </div>
        @endforeach
    </section>
    
    <!-- JUDUL2 -->
    <section class="text-title">
        <p>Produk Tersedia</p>
    </section>

    <!-- PRODUK -->
    <section class="produk-container">
        @foreach ($produk as $dp)
            <div class="produk-space">
                <a style="text-decoration: none" class="text-white" href="/home/produk/{{$dp->id}}">
                    <div class="produk-box">
                        <img src="{{ asset('assets/'.$dp->gambar) }}"; alt="Gambar Produk">
                        <h3>{{$dp->judulProduk}}</h3>
                        <h4>{{$dp->harga}}</h4>
                    </div>
                </a>
            </div>
        @endforeach
    </section>


@endsection
