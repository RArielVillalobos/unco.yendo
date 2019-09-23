@extends('theme.back.layout.admin')

@section('content')
    <form method="post" action="{{ route('register') }}">
        @csrf
        <div class="container">

            <div class="row mt-1">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">person</i>
                    <input name="nombre" id="nombre" type="text" class="validate" value="{{old('nombre')}}">
                    <label for="nombre">Nombre</label>
                    @error('nombre')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror


                </div>
            </div>
            <div class="row mt-1">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">person</i>
                    <input name="apellido"  id="apellido" type="text" class="validate">
                    <label for="apellido">Apellido</label>
                    @error('apellido')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror


                </div>



            </div>
            <div class="row mt-1">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">looks_one</i>
                    <input  name="legajo" id="legajo" type="text" class="validate">
                    <label for="legajo">Legajo</label>
                    @error('legajo')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror


                </div>



            </div>
            <div class="row mt-1">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">mail_outline</i>
                    <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <label for="email">Email</label>
                    @error('email')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror


                </div>



            </div>
            <div class="row mt-1">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="usuario" type="text" class="validate" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario">
                    <label for="usuario">Nombre de usuario</label>
                    @error('usuario')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror


                </div>



            </div>
            <div class="row mt-1">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password" type="password" class="validate" name="password" value="{{ old('password') }}" required autocomplete="password">
                    <label for="password">Contraseña</label>
                    @error('email')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror


                </div>



            </div>
            <div class="row mt-1">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password-confirm" type="password" class="validate" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">Ingrese nuevamente la contraseña</label>
                    @error('password_confirmation')
                    <span class="helper-text error-login" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror

                </div>

            </div>
            <div class="row mb-2">
                <div class="col s6 offset-s2 center">
                    <button class="btn waves-effect orange darken-1light" type="submit" name="action">Registrarme
                        <i class="material-icons right">send</i>
                    </button>

                </div>


            </div>




        </div>
    </form>

    {{--
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
