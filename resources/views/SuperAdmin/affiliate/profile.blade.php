@extends('layouts/layoutMaster')
@php
$superAdmin='Minue';
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
<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="../../ assets/vendor/libs/typeahead-js/typeahead.css" />
<style>
    span {
        color: red;
    }
</style>
<!-- Page CSS -->
@endsection

@section('page-style')
<link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
<link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

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


@if($affiliate->position == 'pending')
@else
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            Affiliate/ <span class="text-muted fw-light">Details</span>
        </h4>

        <!-- Cards Draggable -->
        <div class="row mb-4" id="sortable-cards">

            {{-- <div class="col-lg-3 col-md-6 col-sm-12">

            </div> --}}
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="bx bx-globe text-info display-6"></i>
                        </h2>
                        <h4>Total Wallet</h4>
                        <h5>{{ $affiliate->user_account->wallet ?? 0}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="bx bx-gift text-danger display-6"></i>
                        </h2>
                        <h4>Total Earned</h4>
                        <h5>{{ $affiliate->user_account->total_earned ?? 0 }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card drag-item cursor-move mb-lg-0 mb-4">
                    <div class="card-body text-center">
                        <h2>
                            <i class="bx bx-user text-primary display-6"></i>
                        </h2>
                        <h4>Users</h4>
                        <h5>{{ count($affiliate->customers) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Cards Draggable ends -->



        <!-- Customer Pending -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Customers Pending</h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 col-12 mb-md-0 mb-4">
                                <ul class="list-group list-group-flush" id="completed-tasks">

                                    @foreach ($affiliate->campanies_pending as $customer_pending)


                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">

                                        @if($customer_pending->status == 'pending')
                                        <a class="btn btn-success d-flex justify-content-between align-items-center"
                                            href="{{ route('status_update',['id'=>$customer_pending->id,'type'=>'accepted']) }}">
                                            ACCEPTED
                                        </a>
                                        @else
                                        <button
                                            class="btn btn-warning d-flex justify-content-between align-items-center">
                                            Acceepted
                                        </button>
                                        @endif
                                        <span>{{ $customer_pending->email }}</span>
                                        <img class="rounded-circle"
                                            src="{{ asset('public/images/customer/'.$customer_pending->image) }}"
                                            alt="avatar" height="32" width="32" />
                                        {{$loop->iteration}}
                                    </li>

                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Customer Pending -->
        <!-- Customer Accepted -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Customers Accepted</h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 col-12 mb-md-0 mb-4">
                                <ul class="list-group list-group-flush" id="completed-tasks">

                                    @foreach ($affiliate->customer_accepted as $customer_accepted)

                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center">

                                        @if($customer_accepted->status == 'accepted')
                                        <a class="btn btn-danger d-flex justify-content-between align-items-center"
                                            href="{{ route('status_update',['id'=>$customer_accepted->id,'type'=>'rejected']) }}">
                                            Rejected
                                        </a>
                                        @else
                                        No Customer Accepted
                                        @endif
                                        <span>{{ $customer_accepted->email }}</span>
                                        <img class="rounded-circle"
                                            src="{{ asset('public/images/customer/'.$customer_accepted->image) }}"
                                            alt="avatar" height="32" width="32" />
                                        {{$loop->iteration}}
                                    </li>

                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Customer Accepted -->



        <!-- Handles Example -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h5 class="card-header text-center">Total Acount Process</h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 col-12 mb-md-0 mb-4">
                                <p>Payment Pending</p>
                                <ul class="list-group list-group-flush" id="handle-list-2">
                                    @isset($affiliate->user_account->account_process)
                                    @foreach ($affiliate->user_account->account_process as $account_process)
                                    <li class="list-group-item lh-1 d-flex justify-content-between align-items-center">

                                        <span class="">
                                            <i class="drag-handle cursor-move bx bx-menu align-text-bottom me-2"></i>
                                            <a href="{{ route('accept_money',['id'=>$account_process->id,'account_id'=>$affiliate->user_account->id,'type'=>'rejected','process_type'=>$account_process->process_type]) }}"
                                                @class(['btn btn-danger', 'font-bold'=> true])>
                                                Rejected
                                            </a>
                                            <a href="{{ route('accept_money',['id'=>$account_process->id,'account_id'=>$affiliate->user_account->id,'type'=>'accepted','process_type'=>$account_process->process_type]) }}"
                                                @class(['btn btn-warning', 'font-bold'=> true])>
                                                Accepted
                                            </a>

                                        </span>
                                        <a class="btn btn-success">
                                            {{ $account_process->process_type }}
                                        </a>
                                        <span>
                                            <i>{{ $account_process->money }}
                                    </li>
                                    @endforeach
                                    @endisset



                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Handles Example ends -->
    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
@endif
@section('script')
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/sortablejs/sortable.js"></script>

<!-- Main JS -->

<!-- Page JS -->
<script src="../../assets/js/extended-ui-drag-and-drop.js"></script>

@endsection
@endsection