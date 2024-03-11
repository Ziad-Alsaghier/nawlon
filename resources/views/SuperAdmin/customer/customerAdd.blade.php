@extends('layouts/layoutMaster')
@php
$superAdmin = 'Minue';
@endphp


@section('title', 'Customer')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@section('style-header')
<!-- Favicon -->
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
<link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
<link rel="stylesheet" href="../assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection


@section('vendor-style')
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
@section('vendor-style')
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
<link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<style>
    .span {
        color: red;
    }
</style>
<!-- Page CSS -->
@endsection

@section('page-style')

@endsection
@section('vendor-script')

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
<script src="../assets/vendor/libs/select2/select2.js"></script>
<script src="../assets/vendor/libs/tagify/tagify.js"></script>
<script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="../assets/vendor/libs/bloodhound/bloodhound.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/forms-selects.js"></script>
<script src="../assets/js/forms-tagify.js"></script>
<script src="../assets/js/forms-typeahead.js"></script>
<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>
@endsection
@section('content')


@include('success')



<div class="row mb-4">

    <!-- Bootstrap Validation -->
    <div class="col-md">

        <div class="card">
            <h5 class="card-header">Add New Customer</h5>
            <div class="card-body">
                <form class="needs-validation" action="{{ route('newCustomer') }}" method="POST"
                    enctype="multipart/form-data" novalidate="">
                    @csrf

                    <div class="mb-3">

                        <label class="form-label" for="bs-validation-name">Name</label>
                        <input type="text" class="form-control" name="name" id="bs-validation-name"
                            placeholder="Enter Your Full name" required="The Name Can't Be Emty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    @error('name')
                    <span class="span"> {{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Email</label>
                        <input type="email" id="bs-validation-email" class="form-control" name="email"
                            placeholder="Enter Your Email" required="The Email Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    @error('email')
                    <span class="span"> {{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Phone</label>
                        <input type="number" id="bs-validation-email" class="form-control" name="phone"
                            placeholder="Enter your Phone" required="The Phone Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    @error('phone')
                    <span class="span"> {{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Parent Phone</label>
                        <input type="number" id="bs-validation-email" class="form-control" name="parent_phone"
                            placeholder="Enter your Parent Phone" required="The  Parent Phone Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    @error('parent_phone')
                    <span class="span"> {{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">password</label>
                        <input type="password" id="bs-validation-email" class="form-control" name="password"
                            placeholder="Enter your Password" required="The password Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    @error('password')
                    <span class="span"> {{ $message }}</span>
                    @enderror



                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="bs-validation-password">Package</label>
                        <div class="input-group input-group-merge">
                            {{-- Start Selector --}}
                            <div class="col-md-6 mb-4">
                                <div class="select2-success">
                                    <div class="position-relative">
                                        <select id="select2Success" name="package"
                                            class="select2 form-select select2-hidden-accessible"
                                            data-select2-id="select2Success" tabindex="-1" aria-hidden="true">
                                            @foreach ($package as $packages)
                                            <option value="{{ $packages->id }}">{{ $packages->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- End Selector --}}
                                <div class="d-flex align-items-start align-items-sm-center gap-4 mt-5">
                                    {{-- <img src="../assets/img/avatars/1.png" alt="user-avatar"
                                        class="d-block rounded" height="100" width="100" id="uploadedAvatar" /> --}}
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">اضافة صورة لوجو الشركة</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="logoImage" id="upload" class="account-file-input"
                                                hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>

                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-upload-file">اضافة صورة
                                        للسيار</label>
                                    <input type="file" name="image" class="form-control" id="basic-default-upload-file">
                                </div>
                            </div>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <!-- /Bootstrap Validation -->
</div>


@section('script')
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
<script src="../assets/vendor/libs/select2/select2.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="../assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/pages-account-settings-account.js"></script>
@endsection
@endsection