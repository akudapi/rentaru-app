@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
	
	<!-- Logo -->
	<div class="logo">
        <img src="{{ asset('assets/cheetos cat.jpg') }}" alt="logo">
    </div>
    
	<div class="teks">
		<h3>Selamat datang di halaman Login<br>Website RENTARU</h3>
	</div>

	<!-- Tampilan Login -->
	<div class="page-login">

        <form class="peeee" method="POST" action="{{ route('login') }}">
            @csrf

            <h1>Login</h1>

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <div>
                    <input id="email" type="email" class="input-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <div>
                    <input id="password" type="password" class="input-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Tombol login jika ditekan dan berhasil akan menuju halaman landing page -->
                <div class="btn-space">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Login') }}
                    </button>
                </div>
            <h4>Don't have an account? <a href="{{ route('register') }}">{{ __('Register') }}</a></h4>
        </form>
	</div>

@endsection
