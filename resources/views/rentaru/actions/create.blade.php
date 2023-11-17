@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/create.css') }}">

<div>
    <nav class="navigasi">
        <ul>
            <li><a href="{{ route('home') }}"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg><a/></li>
            <div class="navigasi-2">
                <ul>
                    <li><h5>Tambah Produk</h5></li>
                </ul>
            </div>
        </ul>
    </nav>

    <form class="container mt-2" action="/create" enctype="multipart/form-data" method="POST">

        @csrf
        <div class="mb-3">
            <label for="label" class="form-label">Upload Gambar:</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Judul Produk:</label>
            <input type="text" class="form-control" name="judulProduk" placeholder="Masukkan judul produk...">
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Harga Sewa:</label>
            <input type="number" class="form-control" name="harga" placeholder="Masukkan harga produk...">
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Deskripsi Produk:</label>
            <textarea type="text" class="form-control" name="deskripsi" rows="15" placeholder="Masukkan deskripsi produk..."></textarea>
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Alamat Toko:</label>
            <input type="text" class="form-control" name="alamatToko" placeholder="Masukkan alamat toko...">
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Masukkan sosial media Toko untuk dihubungi:<br><span style="font-size: 15px; color: red;">*Masukkan satu sosialmedia saja, seperti IG/FB/WA atau gunakan link tree</span></label>
            <input type="text" class="form-control" name="sosmed" placeholder="Masukkan sosial media Toko....">
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Upload Logo Toko:</label>
            <input type="file" class="form-control" name="logoToko">
        </div>
        <div class="mb-3">
            <label for="label" class="form-label">Nama Toko:</label>
            <input type="text" class="form-control" name="namaToko" placeholder="Masukkan nama toko...">
        </div>


        <input type="submit" class="btn btn-success" name="submit" value="tambah">
    </form>
</div>

@endsection
