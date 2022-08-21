<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('Login_v5/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Login_v5/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Login_v5/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login_v5/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url({{ asset('Login_v5/images/bg-01.jpg') }});">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form method="post" action="{{ route('post.login') }}"
                    class="login100-form validate-form flex-sb flex-w">
                    @csrf
                    <span class="login100-form-title p-b-53">
                        Sign In With
                    </span>
                    {{-- <a href="" class="btn-face m-b-20">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                    </a> --}}

                    <a href="{{ route('auth.google') }}" style="background: #ffff;color:black"
                        class="login100-form-btn btn-google m-b-20">
                        <img src="{{ asset('Login_v5/images/icons/icon-google.png') }}" alt="GOOGLE">
                        Google
                    </a>

                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Email
                        </span>
                    </div>
                    <div class="wrap-input100 ">
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100"></span>

                    </div>
                    @error('email')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @enderror
                    <br>
                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password
                        </span>

                        <a href="" class="txt2 bo1 m-l-5">
                            Forgot?
                        </a>
                    </div>
                    <div class="wrap-input100 ">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>

                    </div>
                    @error('password')
                        <div class="alert alert-danger"> <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @enderror
                    <p class="text-danger login-box-msg">
                        <?php //Hiển thị thông báo thành công
                        ?>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        <?php //Hiển thị thông báo lỗi
                        ?>
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{ Session::get('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Sign In
                        </button>
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Not a member?
                        </span>

                        <a href="" class="txt2 bo1">
                            Sign up now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('Login_v5/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v5/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v5/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('Login_v5/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v5/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v5/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('Login_v5/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v5/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('Login_v5/js/main.js') }}"></script>

</body>

</html>
