@extends('layouts/layoutMaster')
@php
$user='Minue';
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
<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="../../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="../ assets/vendor/libs/typeahead-js/typeahead.css" />
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

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

<!-- Page CSS -->
<link rel="stylesheet" href="../assets/vendor/css/pages/page-profile.css" />
<!-- Helpers -->
@endsection
@section('vendor-script')
<script src="../assets/vendor/js/helpers.js"></script>
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
<script src="../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/pages-profile.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>
@endsection
@section('content')
@include('success')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <label for="profile_image">
                                <img id="image-profile-prev" style=" cursor: pointer;"
                                    class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img"
                                    src="{{ asset('public/images/customer/' . auth()->user()->logoImage) }}" />
                            </label>

                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ auth()->user()->name }}</h4>

                                </div>
                                <a href="javascript:void(0)" class="btn btn-primary text-nowrap">
                                    <i class="bx bx-user-check me-1"></i>Connected
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->


        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="text-muted text-uppercase">بياناتك</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-user"></i><span class="fw-semibold mx-2">الأسم كامل :</span>
                                <span>{{ auth()->user()->name }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-check"></i><span class="fw-semibold mx-2">الأيميل:</span>
                                <span>{{ auth()->user()->email }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-star"></i><span class="fw-semibold mx-2">نوع المستخدم:</span>
                                <span>{{ auth()->user()->position }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span>
                                <span>USA</span>
                            </li>

                        </ul>
                        <small class="text-muted text-uppercase">الخطة المستخدمة</small>
                        <ul class="list-unstyled mb-4 mt-3">

                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-chat"></i><span class="fw-semibold mx-2">اسم الخطة:</span>
                                <span>{{ auth()->user()->package->name }}</span>
                            </li>

                        </ul>

                    </div>
                </div>
                <!--/ About User -->
                <!-- Profile Overview -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="text-muted text-uppercase">تفاصيل الخطة</small>
                        <ul class="list-unstyled mt-3 mb-0">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-check"></i><span class="fw-semibold mx-2"> الحد الاقصي للسيارات</span>
                                <span>{{ auth()->user()->package->car_limitation }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-customize"></i><span class="fw-semibold mx-2">الدفع الشهري:</span>
                                <span>{{ auth()->user()->package->price_monthly }}</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bx bx-user"></i><span class="fw-semibold mx-2">الدفع السنوي:</span>
                                <span>{{ auth()->user()->package->price_year }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Profile Overview -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->

                <!--/ Activity Timeline -->
                <div class="row fv-plugins-icon-container">
                    <div class="col-md-12">
                        <ul class="nav nav-pills flex-column flex-md-row mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                                    Account</a>
                            </li>


                        </ul>
                        <div class="card mb-4">
                            <h5 class="card-header">Profile Details</h5>
                            <!-- Account -->

                            <hr class="my-0">
                            <div class="card-body">
                                <form id="formAccountSettings" method="POST" action="{{ route('editProfile') }}"
                                    enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                            <label for="name" class="form-label">الاسم</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="{{ auth()->user()->name }}">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                            <label for="email" class="form-label">الايميل الخاص</label>
                                            <input class="form-control" type="text" name="email" id="email"
                                                value="{{ auth()->user()->email }}">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="phone">رقم التليفون</label>
                                            <div class="input-group input-group-merge">
                                                {{-- <span class="input-group-text">US (+1)</span> --}}
                                                <input type="text" id="phone" name="phone" class="form-control"
                                                    value="{{ auth()->user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="parent_phone" class="form-label">رقم التليفون
                                                الثاني</label>
                                            <input class="form-control" type="text" id="parent_phone"
                                                name="parent_phone" value="{{ auth()->user()->parent_phone }}">
                                        </div>


                                        <div class='d-flex justify-content-center py-2' style="flex-direction: column;">
                                            <label for="logoImage">
                                                <img id="image-profile-prev"
                                                    style="height: 130px; cursor: pointer; width: 200px;"
                                                    src="{{ asset('public/images/customer/' . auth()->user()->logoImage) }}" />
                                            </label>
                                            <input type="file" name="logoImage" class="form-control" id="logoImage" />
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                        </div>
                                </form>
                            </div>


                            </form>
                        </div>
                        <!-- /Account -->
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--/ User Profile Content -->
</div>
<!-- / Content -->



<div class="content-backdrop fade"></div>
</div>
@section('script')
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>



@endsection

@endsection