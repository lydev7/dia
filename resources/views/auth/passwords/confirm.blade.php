@extends('layouts.guest')

@section('content')
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="/"><b>Dia</b></a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">{{ auth()->user()->email }}</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="{{ auth()->user()->email }}">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form action="{{ route('password.confirm') }}" method="POST" class="lockscreen-credentials">
                @csrf
                <div class="input-group">
                    <input name="password" type="password" class="form-control @error('password') border-danger @enderror" placeholder="password">

                    <div class="input-group-append">
                        <button type="button" class="btn @error('password') border-danger @enderror"><i class="fas fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            For access to the modification of your information it is necessary to be sure of your identity please indicate your password
        </div>

        <div class="lockscreen-footer text-center">
            Copyright &copy; 2020 <b><a href="#" class="text-black">LY</a></b><br>
            All rights reserved
        </div>
    </div>
@endsection
