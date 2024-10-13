@extends('layouts/layoutMaster')
@php
$superAdmin = 'Minue';
@endphp


@section('title', 'Customer List')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection


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
<link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

<!-- Page CSS -->
<style>
    span {
        color: red;
    }
</style>
<!-- Page CSS -->
@endsection

@section('page-style')
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
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
@endsection
@section('content')
@include('success')

<!-- Content -->


{{-- Start Add New Affiliate --}}
<!-- FormValidation -->
<div class="col-12">
    <div class="card">
        <h5 class="card-header">Affiliate Add</h5>
        <div class="card-body">
            <form id="formValidationExamples" action="{{ route('proccess_new_affiliate') }}" method="POST"
                enctype="multipart/form-data" class="row g-3">
                <!-- Account Details -->

                <div class="col-12">
                    <h6 class="fw-normal">1. Account Details</h6>
                    <hr class="mt-0" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="formValidationName">Full Name</label>
                    <input type="text" id="formValidationName" class="form-control" placeholder="Affiliate Name"
                        name="name" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="formValidationEmail">Email</label>
                    <input class="form-control" type="email" id="formValidationEmail" name="email"
                        placeholder="Affiliate Email" />
                </div>

                <div class="col-md-6">
                    <div class="form-password-toggle">
                        <label class="form-label" for="formValidationPass">Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" type="password" id="formValidationPass" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="multicol-password2" />
                            <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                                    class="bx bx-hide"></i></span>
                        </div>
                    </div>
                </div>


                <!-- Personal Info -->

                <div class="col-12">
                    <h6 class="mt-2 fw-normal">2. Personal Info</h6>
                    <hr class="mt-0" />
                </div>

                <div class="col-md-6">
                    <label for="formValidationFile" class="form-label">Phone Number</label>
                    <input class="form-control" placeholder="Phone Number" type="number" id="formValidationFile"
                        name="phone" />

                </div>
                <div class="col-md-6">
                    <label class="form-label" for="formValidationDob">Identity</label>
                    <input type="text" placeholder="Idintity Card Affiliate" class="form-control flatpickr-validation"
                        name="identity" id="formValidationDob" required />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="formValidationDob">Commission</label>
                    <input type="number" placeholder=" Affiliate commission" class="form-control flatpickr-validation"
                        name="commission" id="formValidationDob" required />
                </div>

                <div class="mb-3 col-6">
                    <label class="form-label" for="basic-default-upload-file">
                        Afilliate Image
                    </label>
                    <input type="file" name="image" class="form-control" id="basic-default-upload-file">
                </div>


                {{--
                <div class="col-12">
                    <label class="switch switch-primary">
                        <input type="checkbox" class="switch-input" name="formValidationSwitch" />
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                        <span class="switch-label">Send me related emails</span>
                    </label>
                </div> --}}
                <div class="col-12">
                    {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formValidationCheckbox"
                            name="formValidationCheckbox" />
                        <label class="form-check-label" for="formValidationCheckbox">Agree to our terms and
                            conditions</label>
                    </div> --}}
                </div>
                <div class="col-12">
                    <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /FormValidation -->
{{-- End Add New Affiliate --}}
<!-- / Content -->



</div>
@section('script')
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
{{-- <script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../assets/vendor/js/menu.js"></script> --}}
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/select2/select2.js"></script>
<script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="../assets/vendor/libs/moment/moment.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="../assets/vendor/libs/tagify/tagify.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

<!-- Main JS -->

<!-- Page JS -->
<script src="../assets/js/form-validation.js"></script>

@endsection

@endsection