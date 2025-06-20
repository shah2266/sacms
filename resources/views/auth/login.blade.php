@extends('layouts.app')

@section('content')

<div class="container">

    <section class="login">
        <h1 class="login-title"> Admin panel</h1>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">
                <input id="email"
                       type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       placeholder="Enter email address"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                </label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">
                    <input id="password"
                           type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           placeholder="Enter your password"
                           required autocomplete="current-password"
                    >
                </label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="login-btn">
                <button type="submit">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </section>

</div>
@endsection
