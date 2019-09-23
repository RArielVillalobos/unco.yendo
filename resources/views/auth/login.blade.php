@extends('theme.back.layout.admin')

@section('title','Iniciar Sesión')

@section('head')

@endsection

@section('content')
    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row mt-5">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">mail_outline</i>
                    <input  id="first_name" name="email" type="text" class="validate">
                    <label for="first_name">E-mail</label>
                    @error('email')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror


                </div>


            </div>
            <div class="row">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">lock_outline</i>
                    <input name="password"  id="first_name" type="password" class="validate">
                    <label for="first_name">Password</label>
                    @error('password')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="row mb-2">
                <div class="col s6 offset-s2">
                    <button class="btn waves-effect orange darken-1light" type="submit" name="action">Iniciar Sesion
                        <i class="material-icons right">send</i>
                    </button>
                    <a href="{{route('register')}}" class="btn waves-effect orange darken-3" type="submit" name="action">Registrarme
                        <i class="material-icons right">send</i>
                    </a>
                </div>


            </div>
        </form>
    </div>


    {{--


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     --}}

@endsection


