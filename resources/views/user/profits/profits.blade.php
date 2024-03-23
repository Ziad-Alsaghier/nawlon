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
@section('style')
<style>
    span {
        color: red;
    }
</style>
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
<link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css" />

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


<!-- Bootstrap Table with Header - Dark -->

<div class="card col-4 d-flex justfy-content-center">
    <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
                <span>الربح النهائي</span>
                <div class="d-flex align-items-end mt-2">
                    @if($totalProfit > 0)
                    <h4 class="mb-0 me-2 " style="color: green">{{ $totalProfit }}</h4>
                    <small class="text-success">(+{{ "%".round($totalProfitPercentage )}})</small>
                    @else
                    <h4 class="mb-0 me-2 " style="color: red">{{ $totalProfit }}</h4>
                    <small class="text-danger">(-{{ "%". round($totalProfitPercentage) }})</small>
                    @endif
                </div>
                <small>الربح الكلي</small>
            </div>
            <span class="badge bg-label-primary rounded p-2">
                <i class="fa-solid fa-dollar-sign" style="color: #63E6BE;"></i>
            </span>
        </div>
    </div>
</div>
<div class="card  d-inline-block col-5 mx-5">
    <h5 class="card-header">جميع الايرادات</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th> الايرادات</th>
                    <th> سعر الناولون</th>


                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                <tr>

                    <td>
                        <strong>
                            جميع النوالون
                        </strong>
                    </td>
                    <td>
                        <strong>
                            {{ $totalNawlonPrice }}
                        </strong>
                    </td>

            </tbody>
        </table>
    </div>
</div>




<div class="card  d-inline-block col-5 m-5">

    <h5 class="card-header">جميع المصروفات</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th> المصروفات</th>
                    <th> المصروفات المدفوعة</th>


                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                <tr>
                    <td>
                        الصيانات
                    </td>
                    <td>
                        {{ $totalPriceMaintanence }}
                    </td>
                <tr>
                    <td>
                        الضرائب
                    </td>
                    <td>
                        {{ $taxses }}
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card  d-inline-block col-12">

    <h5 class="card-header">جميع المصروفات للسيارات</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th> #</th>
                    <th> المصروفات</th>
                    <th> المصروفات للصيانة</th>
                    <th> المصروفات نوالون</th>
                    <th> مصروفات الضرائب</th>


                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @foreach($cars as $car)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $car->cars_name }}
                    </td>
                    <td>
                        {{ $car->maintenances_price() }}
                    </td>
                    <td>
                        @if($car->nawlon_price() == 0)
                        <span>لا يوجد ناولون</span>
                        @else
                        {{ $car->nawlon_price() }}
                        @endif

                    </td>
                    <td>
                        @if($car->taxes() == 0)
                        <span>لا يوجد ضرائب</span>
                        @else
                        {{ $car->taxes() }}
                        @endif

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>




@endsection