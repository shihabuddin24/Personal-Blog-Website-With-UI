@extends('layouts.frontendmaster')

@section('frontendcontent')

  <!--Login-->
  <section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="login-content">
                    <h4>Log In</h4>
                    <p></p>
                    <form  action="{{route('guest.login')}}" class="sign-form widget-form " method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Username*" name="email" value="">
                            @error('email')
                            <p class="text-danger">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password*" name="password" value="">
                            @error('password')
                            <p class="text-danger">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="sign-controls form-group">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                            </div>
                            <a href="{{route('password.request')}}" class="btn-link ">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-custom">Login in</button>
                        </div>
                        <p class="form-group text-center">Don't have an account? <a href="{{route('guest.register')}}" class="btn-link">Create One</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@if (session('success'))
    <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "top",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
            });
            Toast.fire({
            icon: "success",
            title: "{{session('success')}}"
            });
    </script>
@endif


@endsection
