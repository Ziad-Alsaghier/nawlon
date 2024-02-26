@extends('layouts/layoutMaster')
@php
$user = 'Minue';
@endphp


@section('title', 'Customer List')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection


@section('vendor-style')
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
@section('script-page')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection
<!-- Icons -->
<link rel="styles
    heet" href="../../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

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
<link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="../../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

<!-- Page CSS -->
<link rel="stylesheet" href="../../assets/vendor/css/pages/page-profile.css" />
<!-- Helpers -->
@endsection
@section('vendor-script')
<script src="../../assets/vendor/js/helpers.js"></script>
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<!-- Main JS -->
<script src="../../assets/js/main.js"></script>

<!-- Page JS -->

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/config.js"></script>
@endsection
@section('script-header')
<script src="../../assets/js/pages-profile.js"></script>
@endsection
@section('content')
@include('success')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- Header -->
        <div class="row">
            <div class="col-8">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="../../public/images/cars/{{ $car->image }}" alt="{{ $car->name }}"
                            class="rounded-start ">

                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">

                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    {{ $car->cars_name }}

                                </div>
                                @if ($car->status == 1)
                                <a class="btn btn-success col-2 mr-5" data-bs-toggle="modal"
                                    data-bs-target="#modalTop{{ $car->id }}" href="">
                                    السيارة متوفرة
                                </a>

                                {{-- Modale Update Status --}}
                                <div class="col-lg-4 col-md-6">

                                    <div class="mt-3">
                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal modal-top fade" id="modalTop{{ $car->id }}" tabindex="-1">

                                            <div class="modal-dialog">
                                                <form class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من تغيير
                                                            حالة
                                                            السيارة </h2>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-label-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <input type="hidden" name="status" value="0">
                                                        <a href="{{ route('updateStatus', ['id' => $car->id ,'status'=>'0']) }}"
                                                            class="btn btn-primary">Save</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modale Update Status --}}
                                @elseif($car->status == 0)
                                <a class="btn btn-danger text-nowrap" data-bs-toggle="modal"
                                    data-bs-target="#modalTop{{ $car->id }}">

                                    السيارة معطلة

                                </a>
                                {{-- Modale Update Status --}}
                                <div class="col-lg-4 col-md-6">

                                    <div class="mt-3">
                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal modal-top fade" id="modalTop{{ $car->id }}" tabindex="-1">

                                            <div class="modal-dialog">
                                                <form class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من تغيير
                                                            حالة
                                                            السيارة </h2>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-label-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <input type="hidden" name="status" value="0">
                                                        <a href="{{ route('updateStatus', ['id' => $car->id ,'status'=>'1']) }}"
                                                            class="btn btn-primary">Save</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modale Update Status --}}
                                @elseif($car->status == 2)
                                <a href="javascript:void(0)" class="btn btn-warning text-nowrap">
                                    <i class="fa-solid fa-wrench"></i>
                                    السيارة في الطريق
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-car text-white "></i>
                            التفاصيل</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="pages-profile-teams.html"><i class="bx bx-group me-1"></i> Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-profile-projects.html"><i class="bx bx-grid-alt me-1"></i>
                            Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-profile-connections.html"><i class="bx bx-link-alt me-1"></i>
                            Connections</a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row mb-2">
            {{-- Total Nawlon --}}
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-4">

                    <div class="card-body">
                        <small class="text-muted text-uppercase">بياناتك</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-user"></i><span class="fw-semibold mx-2"> اسم السيارة</span>
                                <span>{{ $car->cars_name }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-check"></i><span class="fw-semibold mx-2">فئة السياارة:</span>
                                <span>{{ $car->category->category }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-star"></i><span class="fw-semibold mx-2"> نوع السيارة:</span>
                                <span>{{ $car->brand }}</span>
                            </li>



                        </ul>
                        <small class="text-muted text-uppercase">رقم السيارة</small>
                        <ul class="list-unstyled mb-4 mt-3">

                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-chat"></i><span class="fw-semibold mx-2">رقم السيارة:</span>
                                <span>{{ $car->car_number }}</span>
                            </li>

                        </ul>

                    </div>
                </div>
                <!--/ About User -->
                <!-- Profile Overview -->
                <div class="card mb-4">
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-0">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bx bx-check"></i><span class="fw-semibold mx-2">جميع النوالين</span>
                                <span> : {{ count($car->nawlon) }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="fa-solid fa-money-bills"></i><span class="fw-semibold mx-2">السعر الكلي :

                                </span>
                                <span>{{ $totalnawlon }} EGP </span>
                            </li>
                            <li class="d-flex align-items-center">
                            <li class="d-flex align-items-center mb-3">
                                <i class="fa-solid fa-wrench"></i><span class="fw-semibold mx-2">عدد الصيانات:</span>
                                <span> {{ count($car->maintenances) }}</span>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Profile Overview -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7 ">
                <!-- Activity Timeline -->

                <!--/ Activity Timeline -->

                <!-- Projects table -->
                {{-- Start Manage Car --}}

                <div class="col-xl-12">
                    <div class="card text-center mb-3">
                        <div class="card-header border-bottom">
                            <ul class="nav nav-pills" style="justify-content: space-between;" role="tablist">
                                <li class="nav-item" role="presentation">

                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-pills-within-card-active"
                                        aria-controls="navs-pills-within-card-active" aria-selected="true">
                                        نوالين السيارة

                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">

                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-pills-within-card-linkk"
                                        aria-controls="navs-pills-within-card-linkk" aria-selected="false"
                                        tabindex="-1">
                                        الصيانات
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-pills-within-card-Disabled"
                                        aria-controls="navs-pills-within-card-Disabled" aria-selected="false"
                                        tabindex="-1">
                                        المخالفات
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-pills-within-card-three"
                                        aria-controls="navs-pills-within-card-three" aria-selected="false"
                                        tabindex="-1">
                                        الرخص </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-pills-within-card-foure"
                                        aria-controls="navs-pills-within-card-foure" aria-selected="false"
                                        tabindex="-1">
                                        المكسب / الخسارة
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-pills-within-card-five"
                                        aria-controls="navs-pills-within-card-five" aria-selected="false" tabindex="-1">
                                        حالة السيارة
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">










                            <div class="tab-pane fade active show" id="navs-pills-within-card-active" role="tabpanel">

                                <div class="card-datatable table-responsive  ">

                                    <div id="DataTables_Table_0_wrapper"
                                        class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        {{-- Start Date Nawlon --}}
                                        <div class="row">
                                            <div class="col-md-12 mt-5">
                                                <h1 class="text-center">Filter With Date</h1>
                                                <hr>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        {{-- Filter section Date --}}
                                                        <div class="col-md-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-info text-white"
                                                                    id="basic-addonl">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="" id="start_date"
                                                                placeholder="Start Date" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">

                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-info text-white"
                                                                    id="basic-addonl">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="" id="end_date"
                                                                placeholder="End Date" class="form-control" readonly>
                                                        </div>
                                                        <div class="col-md-5 d-flex "
                                                            style="flex-direction: column; row-gap: 10px">

                                                            <div class="d-flex">

                                                                <button id="filter"
                                                                    class="btn btn-outline-info btn-sm col-6  mx-2"
                                                                    style="height: 30px;">filter</button>
                                                                <button id="reset"
                                                                    class="btn btn-outline-warning btn-sm col-6"
                                                                    style="height: 30px;" 11:43 PM>Reset</button>
                                                            </div>
                                                            <div class="result-date col-md-12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Start Date Nawlon --}}
                                        <div class="card-header pb-0 pt-sm-0">


                                            <div class="head-label text-center">
                                                <h5 class="card-title mb-0">النوالين</h5>
                                                {{-- <h4 class="card-title"> عدد النوالين {{ count($car->nawlon) ?? 'لا
                                                    يوجد'
                                                    }} </h4> --}}
                                            </div>
                                            <div class="d-flex justify-content-center justify-content-md-end">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter"
                                                    style="display: flex;direction: ltr;flex-direction: row-reverse;align-items: center;column-gap: 10px;">
                                                    <input type="search" class="form-control" placeholder=""
                                                        aria-controls="DataTables_Table_0" id="textbox_nawlon">
                                                    <label>Search:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <table
                                            class="datatables-projects border-top table   no-footer dtr-column collapsed"
                                            id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>

                                                    <th class="sorting sorting_desc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" aria-sort="descending"
                                                        aria-label="Name: activate to sort column ascending">
                                                        مكان التحميل</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        aria-label="Leader: activate to sort column ascending">سعر
                                                        النقلة</th>

                                                    <th class="" tabindex="0" aria-controls="DataTables_Table_0"
                                                        aria-label="Status: activate to sort column ascending">كمسيون
                                                        السواق
                                                    </th>
                                                    <th class="sorting_disabled dtr-hidden" aria-label="Actions">عهده
                                                    </th>
                                                    <th class="sorting_disabled dtr-hidden" aria-label="Actions">سولار
                                                    </th>
                                                    <th class="sorting_disabled dtr-hidden" aria-label="Actions">
                                                        تاريخ
                                                    </th>
                                                    <th class="sorting_disabled dtr-hidden" aria-label="Actions">
                                                        تقارير
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody id="my_table_nawlon">

                                            </tbody>
                                        </table>
                                        <div class="emty-text text-center col-md-12"><span class='text-center'>data Is
                                                Empty</span></div>

                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                    aria-live="polite">Showing 0 to
                                                    0 of 0 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="DataTables_Table_0_paginate">
                                                    {{-- <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="DataTables_Table_0_previous"><a href="#"
                                                                aria-controls="DataTables_Table_0"
                                                                data-dt-idx="previous" tabindex="0"
                                                                class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item next disabled"
                                                            id="DataTables_Table_0_next"><a href="#"
                                                                aria-controls="DataTables_Table_0" data-dt-idx="next"
                                                                tabindex="0" class="page-link">Next</a></li>
                                                    </ul> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- total nawlon --}}
                            </div>
                            <div class="tab-pane fade" id="navs-pills-within-card-linkk" role="tabpanel">

                                <h4 class="card-title">عدد الصيانات {{ count($car->maintenances) }}</h4>
                                <div class="card mb-3">
                                    {{-- total Nawlon --}}

                                    {{-- Start Maintanence --}}
                                    <div class="card-datatable table-responsive my-3">
                                        {{-- Start Date Nawlon --}}
                                        <div class="row">
                                            <div class="col-md-12 mt-5">
                                                <h1 class="text-center">Filter With Date</h1>
                                                <hr>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">


                                                        <div class="col-md-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-info text-white"
                                                                    id="basic-addonl">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="" id="start_date_maintanence"
                                                                placeholder="Start Date" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">

                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-info text-white"
                                                                    id="basic-addonl">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" name="" id="end_date_maintanence"
                                                                placeholder="End Date" class="form-control" readonly>
                                                        </div>

                                                        <div class="col-md-5 d-flex"
                                                            style="flex-direction: column; row-gap: 10px">

                                                            <div class="d-flex">

                                                                <button id="filter_maintanence"
                                                                    class="btn btn-outline-info btn-sm col-6  mx-2"
                                                                    style="height: 30px;">filter</button>
                                                                {{-- <button id="reset"
                                                                    class="btn btn-outline-warning btn-sm col-6"
                                                                    style="height: 30px;" 11:43 PM>Reset</button> --}}
                                                            </div>
                                                            <div class="result-date col-md-12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Start Date Nawlon --}}
                                        <div id="DataTables_Table_0_wrapper"
                                            class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="card-header pb-0 pt-sm-0">
                                                <div class="head-label text-center">
                                                    <h5 class="card-title mb-0">الصيانات</h5>
                                                </div>
                                                <div class="d-flex justify-content-center justify-content-md-end">
                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"
                                                        style="display: flex;direction: ltr;flex-direction: row-reverse;align-items: center;column-gap: 10px;">
                                                        <input type="search" class="form-control" placeholder=""
                                                            aria-controls="DataTables_Table_0"
                                                            id="textbox_nawlon_maintenances">
                                                        <label>Search:</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <table
                                                class="datatables-projects border-top table  no-footer dtr-column collapsed"
                                                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr>

                                                        <th class="sorting sorting_desc" tabindex="0"
                                                            aria-controls="DataTables_Table_0" aria-sort="descending"
                                                            aria-label="Name: activate to sort column ascending">
                                                            مكان التحميل</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0"
                                                            aria-label="Leader: activate to sort column ascending">سعر
                                                            الصيانة</th>

                                                        <th class="sorting_disabled dtr-hidden" aria-label="Actions">
                                                            قطعة الغيار</th>
                                                        <th class="sorting_disabled dtr-hidden" aria-label="Actions">
                                                            اسم السيارة</th>
                                                        <th class="sorting_disabled dtr-hidden" aria-label="Actions">
                                                            رقم السيارة</th>
                                                        <th class="sorting_disabled dtr-hidden" aria-label="Actions">
                                                            التاريخ</th>


                                                    </tr>
                                                </thead>
                                                <tbody id="my_table_maintenances">

                                                </tbody>
                                            </table>
                                            <div class="row mx-2">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info"
                                                        role="status" aria-live="polite">Showing 0
                                                        to
                                                        0 of 0 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="DataTables_Table_0_paginate">
                                                        {{-- <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="DataTables_Table_0_previous"><a href="#"
                                                                    aria-controls="DataTables_Table_0"
                                                                    data-dt-idx="previous" tabindex="0"
                                                                    class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item next disabled"
                                                                id="DataTables_Table_0_next"><a href="#"
                                                                    aria-controls="DataTables_Table_0"
                                                                    data-dt-idx="next" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Start Maintanence --}}
                                </div>

                            </div>
                            <div class="tab-pane fade" id="navs-pills-within-card-Disabled" role="tabpanel">
                                <h4 class="card-title">comming Soon</h4>
                                <p class="card-text">
                                </p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-within-card-three" role="tabpanel">
                                <h4 class="card-title">comming Soon</h4>
                                <p class="card-text">
                                </p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-within-card-foure" role="tabpanel">
                                <h4 class="card-title">comming Soon</h4>
                                <p class="card-text">
                                </p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-within-card-five" role="tabpanel">
                                <h4 class="card-title">comming Soon</h4>
                                <p class="card-text">
                                </p>
                                <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- End Manage Car --}}

                <!--/ Projects table -->
            </div>
        </div>
        <!--/ User Profile Content -->
    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
</div>










@section('script')



<!-- Page JS -->
<script>
    $(document).ready(() => {

            /* function to search in Nawlon table  */
            $("#textbox_nawlon").on('keyup', function() {
                var f = $(this).val();
                $("#my_table_nawlon tr").each(function() {
                    if ($(this).text().search(new RegExp(f, "i")) < 0) {
                        $(this).fadeOut();
                    } else {
                        $(this).show();
                    }
                });
            });
            /* function to search in Nawlon Maintenances  */
            $("#textbox_nawlon_maintenances").on('keyup', function() {
                var f = $(this).val();
                $("#my_table_nawlon_maintenances tr").each(function() {
                    if ($(this).text().search(new RegExp(f, "i")) < 0) {
                        $(this).fadeOut();
                    } else {
                        $(this).show();
                    }
                });
            });
        })
        // })
        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
            $("#end_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
        });





        //  Start Send Ajax data Filter Between 
        $(document).ready(() => {
            $('#filter').on('click', function() {
                // console.log("Sssss");
                start_date = $('#start_date').val();
                end_date = $('#end_date').val();


                $.ajax({
                    type: 'GET',
                    url: '{{ route('filterNawlon') }}',
                    dataType: "json",
                    data: {
                        'car_id': {{ $car->id }},
                        "start_date": start_date,
                        "end_date": end_date,
                    },
                    success: function(response) {
                        nawlone = response.nawlone;
                        ele = ` <span>${nawlone}</span>`
                        // $(".result-date").append(nawlone[1].id);


                        $(".emty-text").remove();

                        $("#my_table_nawlon tr").remove();


                        if (nawlone.length <= 0) {
                            // console.log("YES");
                            $(".emty-text").append(
                                "<span class='text-center'>data Is Empty</span>")
                        } else {
                            console.log("noo");
                            $(".emty-text").addClass("d-none")
                            $(nawlone).each((value, ele) => {
                                // console.log("object value, ele");
                                // console.log(value, ele);
                                var nawlonens = `<tr>
                                <td>${ele.tatek_location}</td>
                                <td>${ele.nawlone_price}</td>
                                <td>${ele.comsion_driver}</td>
                                <td>${ele.custody}</td>
                                <td>${ele.solar}</td>
                                <td>${ele.created_at}</td>
                                <td>
                                    <a type="button" class="btn btn-info" href="/Nawlone/nawlonInfo/${ele.id}">
                                        تفاصيل
                                    </a>
                                </td>
                            </tr>`
                                $("#my_table_nawlon").append(nawlonens)

                            })

                        }
                        console.log(nawlone.length);

                        console.log(JSON.stringify(nawlone));

                    },
                    error: function(xhr) {
                        // console.log("noooo");
                        $("#total_data").append("<tr class='text-center'>data Is Empty</tr>");
                    }
                });

            });
            $(function() {
            $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
            });
            $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
            });
            });


        });

        // Filter Maintanence

        $(document).ready(() => {
            
            $('#filter_maintanence').on('click', function() {
                console.log("Sssss");
                start_date_maintanence = $('#start_date_maintanence').val();
                end_date_maintanence = $('#end_date_maintanence').val();


                $.ajax({

                    type: 'GET',
                    url: '{{ route('filterMaintanence') }}',
                    dataType: "json",
                    data: {
                        'car_id': {{ $car->id }},
                        "start_date_maintanence": start_date_maintanence,
                        "end_date_maintanence": end_date_maintanence,
                    },
                    success: function(response) {
                        console.log(response.maintanence);
                        maintanence = response.maintanence;
                        ele = ` <span>${maintanence}</span>`
                        // $(".result-date").append(nawlone[1].id);


                        $(".emty-text").remove();

                        $("#my_table_nawlon tr").remove();


                        if (maintanence.length <= 0) {
                            console.log("YES");
                            $(".emty-text").append(
                                "<span class='text-center'>data Is Empty</span>")
                        } else {
                            console.log("noo");
                            $(".emty-text").addClass("d-none")
                            $(maintanence).each((value, ele) => {
                                
                                console.log("object value, ele");
                                console.log(value, ele);
                                var maintanence = `<tr>
                                    <td>${ele.description}</td>
                                    <td>${ele.maintenances_price}</td>
                                    <td>${ele.car_parts[0].name}</td>
                                    <td>${ele.car.cars_name}</td>
                                    <td>${ele.car.car_number}</td>
                                        <td>${ele.created_at}</td>
                                </tr>`
                                $("#my_table_maintenances").append(maintanence)

                            })

                        }
                        console.log(maintanence.length);

                        console.log(JSON.stringify(maintanence));

                    },
                    error: function(xhr) {
                        console.log("noooo");
                        $("#total_data").append("<tr class='text-center'>data Is Empty</tr>");
                    }
                });

            });
            $(function() {
                $("#start_date_maintanence").datepicker({
                    "dateFormat": "yy-mm-dd"
                });
                $("#end_date_maintanence").datepicker({
                    "dateFormat": "yy-mm-dd"
                });
            });

        });
</script>


{{-- Date Range --}}


<script src="assets/js/pages-profile.js"></script>
@endsection

@endsection