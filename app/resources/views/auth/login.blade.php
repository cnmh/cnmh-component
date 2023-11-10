<x-laravel-ui-adminlte::adminlte-layout>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>CNMH</b></a>
            </div>
            <!-- /.login-logo -->

            <!-- /.login-box-body -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Connectez-vous pour démarrer votre session.
                    </p>
                    @if(session('error'))
                    <div class="bg-danger p-2 mt-3 mb-3">
                        <span class="font-medium text-light">{{ session('error') }}</span>
                    </div>
                    @endif

                    <form method="post" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="name" name="name" value="service social" placeholder="name"
                                class="form-control @error('name') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('error')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" value="social" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Se souvenir de moi




                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary ">Connexion</button>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>

        </div>
        <!-- /.login-box -->
    </body>
</x-laravel-ui-adminlte::adminlte-layout>