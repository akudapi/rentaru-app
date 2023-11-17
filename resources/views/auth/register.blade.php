@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
        
    <!-- Logo -->
    <div class="logo">
        <img src="{{ asset('assets/cheetos cat.jpg') }}" alt="logo">
    </div>

    <div class="teks">
		<h3>Registrasikan Akun anda</h3>
	</div>
    
<!-- Tampilan Registrasi -->
    <div class="page-login">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1>Registrasi</h1>
            
            {{-- INPUT NAMA USER DISNI --}}
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>

                <div>
                    <input id="name" type="text" placeholder="Name" class="input-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- INPUT EMAIL USER DISNI --}}
            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>

                <div>
                    <input id="email" type="email" placeholder="Email Address" class="input-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- INPUT PASSWORD USER DISNI --}}
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" placeholder="Password" class="input-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- INPUT KONFIRMASI PASSWORD USER DISNI --}}
            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="input-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <!-- jika tombol daftar user ditekan dan berhasil maka customer harus menuju ke tombol login untuk login -->
            <div>
                <div class="btn-space">
                    <button type="submit" class="btn btn-secondary" onclick="return confirm('Apakah Anda yakin?')">
                        {{ __('Register') }}
                    </button>
                </div>
                <h4>Already have an account? <a href="{{ route('login') }}">{{ __('Login') }}</a></h4>
            </div>
        </form>
        
    </div>

@endsection
