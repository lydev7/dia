@extends('layouts.guest')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Dia</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

                <form action="{{ route('password.update',compact('token')) }}" method="post">
                    @csrf
                    <div class="input-group mb-3 ">
                        <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') border-danger @enderror" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text @error('email') border-danger @enderror">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control @error('password') border-danger @enderror" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text @error('password') border-danger @enderror">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Retype password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
