<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- PROPER UNTUK DROPDOWN --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-dark text-light">

    <!-- NAVBAR -->
    <nav class="navbar text-light" style="background-color: #111111;">
        
        <div class="container-fluid me-3">
            <!-- Nama User dan dropdown logout -->
            <section class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Username
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                        </a>
                    </li>
                </ul>
            </section>
            <!-- search bar -->
            <section>
                <form class="d-flex">
                    <input class="form-control me-2" style="width: 300px;" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success me-5" type="submit">Search</button>
                </form>
            </section>
            <!-- favorite -->
            <section class="nav-item">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#ffffff}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg></a>
            </section>
        </div>

    </nav>

    <!-- BANNER -->
    <section class="banner">
        <a href="#"><img src="{{ asset('assets/PURPLE BANNER.jpeg') }}" alt="Banner"></a>
    </section>

    <!-- JUDUL2 -->
    <section class="text-title">
        <p>Produk Teratas</p>
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

    <!-- FOOTER -->
    <footer>
        <div class="footer text-light">
            <div class="h">
                <p>Contact Us</p>
            </div>
            <div class="p">
                <p>Rentaru Banjarmasin</p>
            </div>
            <div class="icon-img">
                <img src="{{ asset('assets/fb.svg') }}" alt="facebook">
                <img src="{{ asset('assets/ig.svg') }}" alt="instagram">
                <img src="{{ asset('assets/twt.svg') }}" alt="twitter">
            </div>
            <hr>
            <div class="c">
                <p>© 2023 Rentaru Banjarmasin</p>
            </div>
        </div>
    </footer>

</body>
</html>