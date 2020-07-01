@extends('layouts.guest')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>Register</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="name" type="text" value="{{ old('name') }}" class="form-control @error('name') border-danger @enderror" placeholder="Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text @error('name') border-danger @enderror">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="agree" value="agree" required>
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                            @error('agree')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <hr>
                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.login-box -->
@stop


