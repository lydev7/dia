@extends('layouts.app')
@section('content')
    <div class="col-12 offset-0 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
        <div class="register-logo">
            <a href="/"><b>Dia</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('params.update') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="name" type="text" value="{{ (old('name')) ? old('name') : auth()->user()->name }}"
                               class="form-control @error('name') border-danger @enderror" placeholder="Name" required>
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
                        <input name="email" type="email" value="{{ (old('email')) ? old('email') : auth()->user()->email }}"
                               class="form-control @error('email') border-danger @enderror" placeholder="Email"
                               required>
                        <div class="input-group-append">
                            <div class="input-group-text @error('email') border-danger @enderror">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="update_password_check" name="passwords" value="1" {{ (old('passwords')) ? 'checked' : '' }}>
                                <label for="agreeTerms">
                                    Update My Password
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="passwords">
                        <div class="input-group mb-3">
                            <input name="password" type="password"
                                   class="form-control @error('password') border-danger @enderror"
                                   placeholder="Password" >
                            <div class="input-group-append">
                                <div class="input-group-text @error('password') border-danger @enderror">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="passwords">
                        <div class="input-group mb-3">
                            <input name="password_confirmation" type="password" class="form-control"
                                   placeholder="Retype password" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="row">
                        <div class="offset-8 col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
@push('script')
<script type="text/javascript">
    (function () {
        let $passwords = $('.passwords');
        $passwords.hide();
        let $password_check = $('#update_password_check');
        checked($password_check);
        $('body').on('click',$password_check,function () {
            checked($password_check)
        });

        function checked($password_check) {
            if ($password_check.is(':checked')) {
                $passwords.show();
            }
            else{
                $passwords.hide();
            }
        }

    })(jQuery)
</script>
@endpush