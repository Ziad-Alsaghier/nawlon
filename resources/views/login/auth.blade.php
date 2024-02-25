@extends('layouts.layoutLogin')
@section('stylePage')
<link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<!-- Vendor -->
<link rel="stylesheet" href="../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

<!-- Page CSS -->
<!-- Page -->
<link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
<!-- Helpers -->
@endsection
@section('script')
<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>
@endsection
@section('content')
<!-- Content -->

@if (auth()->check())


YOU ALREADY LOGIN

<a href="{{ route('login.destroy') }}">Logout</a>
@else


<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
            <div class="flex-row text-center mx-auto">
                <img src="../assets/img/pages/transporter.png" alt="Auth Cover Bg color" width="520"
                    class="img-fluid authentication-cover-img" data-app-light-img="pages/login-light.png"
                    data-app-dark-img="pages/login-dark.png" />
                <div class="mx-auto">

                    <h3>Nawlon 🥳</h3>
                </div>
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <a href="index.html" class="app-brand-link gap-2 mb-2">
                        <i class="fa-solid fa-truck-arrow-right" @style('font-size:30px; color:#f55839;')></i>
                        <span class="app-brand-text demo h3 mb-0 fw-bold">Nawlon</span>
                    </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">اهلا بك في ناولون 👋</h4>
                @include('success')
                <form id="formAuthentication" class="mb-3" action="{{ route('login_check') }}" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label"> الايميل </label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="اكتب الايميل الخاص بك" autofocus />
                        @error('email')
                        {{ $messge }}
                        @enderror

                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">كلمة المرور</label>
                            <a href="auth-forgot-password-cover.html">
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"></span>
                        </div>
                        @error('error')
                        {{ $message }}
                        @enderror
                        @error('password')
                        {{ $messge }}
                        @enderror

                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" />
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">تسجيل الدخول</button>
                </form>

            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
@endif
@section('scriptPage')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
    integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Users List Table -->



<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/pages-auth.js"></script>
@endsection
<!-- / Content -->
@endsection