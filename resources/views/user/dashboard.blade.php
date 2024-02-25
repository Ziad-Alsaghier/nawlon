@extends('layouts/layoutMaster')
@php
$user='';
$menuHorizontal ='';

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
<link rel="stylesheet" href="../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="../ assets/vendor/libs/typeahead-js/typeahead.css" />

<!-- Page CSS -->
@endsection

@section('style-page')
<style>
    .template-customizer-open-btn {
        display: none;
    }
</style>
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

<!-- Page CSS -->
@endsection
@section('vendor-script')
<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>
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
<!-- Flat Picker -->
<script src="../assets/vendor/libs/moment/moment.js"></script>
<script src="../assets/vendor/libs/flatpickr/flatpickr.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/tables-datatables-advanced.js"></script>
@endsection
@section('content')
@include('success')



<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            مرحبا بك <i class="fa-regular fa-face-smile-beam" style="color: #f08914;"></i>
            {{auth()->user()->name }}
        </h4>
        <!-- Cards Draggable -->
        {{-- Cars Data --}}
        <div class="row mb-4" id="sortable-cards">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="bx bx-car text-danger display-6" style="color:red;"></i>
                        </h2>
                        <h4>عدد السيارات المعطلة</h4>
                        @if($countunAvailableCar == 0)
                        <h5>لا يوجد سيارات</h5>
                        @else
                        <h5>
                            <a href="{{ route('statusCarList',['id'=>'0']) }}">

                                {{$countunAvailableCar }}
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="bx bx-car text-info display-6"></i>
                        </h2>
                        <h4>عدد السيارات المتاحة</h4>
                        @if($countavailableCar == 0)
                        <h5>لا يوجد سيارات</h5>
                        @else
                        <h5>
                            <a href="{{ route('statusCarList',['id'=>'1']) }}">

                                {{$countavailableCar }}
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="bx bx-car text-primary display-6"></i>
                        </h2>
                        <h4>عدد السيارات </h4>

                        @if($countCar == 0)
                        <h5>لا يوجد سيارات</h5>
                        @else
                        <h5>
                            <a href="{{ route('carList') }}">

                                {{$countCar }}
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-truck-arrow-right fa-flip-horizontal"></i>
                        </h2>
                        <h4> عدد السيارات في الطريق</h4>

                        @if($countBusyCar == 0)
                        <h5>لا يوجد سيارات في الطريق</h5>
                        @else
                        <h5>
                            <a href="{{ route('statusCarList',['id'=>'2']) }}">

                                {{$countBusyCar }}
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Cars Data --}}









        {{-- Personal --}}
        <div class="row mb-4" id="sortable-cards">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-user-gear"></i>
                        </h2>
                        <h4>مجموعة الصيانات</h4>
                        @if($countMaintanence == 0)
                        <h5> مجموعة الصيانات</h5>
                        @else
                        <h5>
                            <a href="{{ route('maintenance') }}">
                                {{ number_format($total )}}
                                <span>جنيه في الشهر</span>
                            </a>

                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="bx bx-car text-info display-6"></i>
                        </h2>
                        <h4>مجموع النوالين </h4>
                        @if($countNawlone == 0)
                        <h5>لا يوجد سيارات في الطريق</h5>
                        @else
                        <h5>
                            <a href="{{ route('nawloneList',['status'=>'0']) }}">

                                {{ number_format($totalNawlon) }}
                                <span>جنيه في الشهر</span>
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-user-group"></i>
                        </h2>
                        <h4>عدد التباعين</h4>

                        @if($countDriverFollow == 0)
                        <h5>لا يوجد تباعين</h5>
                        @else
                        <h5>
                            <a href="{{ route('editFollowDriver') }}">

                                {{$countDriverFollow }}
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-user"></i>
                        </h2>
                        <h4> عدد السائقين </h4>

                        @if($countDriver == 0)
                        <h5>لا يوجد سائقين</h5>
                        @else
                        <h5>
                            <a href="{{ route('driverList') }}">

                                {{$countDriver }}
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Personal --}}



        {{-- Total Mony --}}
        <div class="row mb-4" id="sortable-cards">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-user-gear"></i>
                        </h2>
                        <h4>مجموعة السائقين</h4>
                        @if($countavailableDriver == 0)
                        <h5> لا يوجد السائقين</h5>
                        @else
                        <h5>
                            <a href="{{ route('driverList')}}">
                                {{ $countavailableDriver }}

                            </a>

                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </h2>
                        <h4>جميع قطع الغيار </h4>
                        @if($totalCarPart == 0)
                        <h5>لا يوجد قطع غيار</h5>
                        @else
                        <h5>
                            <a href="{{ route('nawloneList',['status'=>'0']) }}">

                                {{ $totalCarPart }}
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-money-bill"></i>
                        </h2>
                        <h4>جميع المصروفات</h4>

                        @if($totalExpenses == 0)
                        <h5>لا يوجد مصروفات</h5>
                        @else
                        <h5>
                            <a href="{{ route('editFollowDriver') }}">

                                {{number_format($totalExpenses) }}
                                <span>جنيه في الشهر</span>
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="fa-solid fa-user"></i>
                        </h2>
                        <h4> الايرادات </h4>

                        @if($totalRevenues == 0)
                        <h5>لا يوجد ايرادات</h5>
                        @else
                        <h5>
                            <a href="{{ route('driverList') }}">

                                {{ number_format($totalRevenues) }}
                                <span>جنيه في الشهر</span>
                            </a>
                        </h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Total Mony --}}
        <!-- /Cards Draggable ends -->



        <!-- Multiple Lists Draggable -->
        {{-- <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Multiple List</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-md-0 mb-4">
                                <p>Pending Tasks</p>
                                <ul class="list-group list-group-flush" id="pending-tasks">
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Buy products.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Reply to emails.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Write blog post.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Update packages.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>New blog layout.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-12 mb-md-0 mb-4">
                                <p>Completed Tasks</p>
                                <ul class="list-group list-group-flush" id="completed-tasks">
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>New icons set for an iOS app.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span> Fix validation bugs and commit.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span> Help Web developers with HTML integration.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Buy antivirus.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Answer support tickets.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Multiple Lists Draggable ends -->

        <!-- Cloning Example -->
        {{-- <div class="row mb-4">
            <div class="col-sm-12">
                <div class="card">
                    <h5 class="card-header">Cloning</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-md-0 mb-4">
                                <p>Pending Tasks</p>
                                <ul class="list-group list-group-flush" id="clone-source-1">
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Buy products.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Reply to emails.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Write blog post.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Update packages.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>New blog layout.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-12 mb-md-0 mb-4">
                                <p>Completed Tasks</p>
                                <ul class="list-group list-group-flush" id="clone-source-2">
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>New icons set for an iOS app.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span> Fix validation bugs and commit.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span> Help Web developers with HTML integration.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Buy antivirus.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">
                                        <span>Answer support tickets.</span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Cloning Example ends -->

        <!-- Handles Example -->
        {{-- <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h5 class="card-header">Handle</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-md-0 mb-4">
                                <p>Pending Tasks</p>
                                <ul class="list-group list-group-flush" id="handle-list-1">
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Buy products</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Reply to emails</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Write blog post</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Update packages</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>New blog layout</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-12 mb-md-0 mb-4">
                                <p>Completed Tasks</p>
                                <ul class="list-group list-group-flush" id="handle-list-2">
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>New icons set for an iOS app</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Fix validation bugs and commit</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Help Web developers with HTML integration</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Buy antivirus</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">
                                        <span class="d-flex justify-content-between align-items-center">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <span>Answer support tickets</span>
                                        </span>
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="avatar"
                                            height="32" width="32">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Handles Example ends -->
    </div>
    <!-- / Content -->



</div>

@endsection