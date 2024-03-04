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


<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y" id="printData">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                <div class="card invoice-preview-card">

                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-3 gap-2">

                                    <img src="../public/images/customer/{{ auth()->user()->logoImage }}" width="250px"
                                        alt="">
                                </div>


                            </div>
                            <div>
                                <h4>الناولون رقم {{ $nawlone->id }}</h4>
                                <div class="mb-2">
                                    <span class="me-1">تاريخ الناولون:</span>
                                    <span class="fw-semibold">{{ $nawlone->created_at->format('Y-m-d') }}</span>
                                </div>
                                <div>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 d-flex align-items-center justify-content-center my-5 mx-5">

                            <img src="../public/images/cars/{{ $nawlone->car->image }}" width="500px" alt="">
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                <h6 class="pb-2">تفاصيل:السيارة</h6>
                                <p class="mb-1">اسم السيارة : {{ $nawlone->car->cars_name }}</p>
                                <p class="mb-1">نوع السيارة : {{ $nawlone->car->brand }}</p>
                                <p class="mb-1">فئة السيارة : {{ $nawlone->car->category->category }}</p>
                                <p class="mb-1"> رقم السيارة : {{ $nawlone->car->car_number }}</p>
                            </div>
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                <h6 class="pb-2">تاريخ الوصول:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-3">تاريخ الطلعة من:</td>
                                            <td>{{ $nawlone->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-3">تاريخ الانتهاء:</td>
                                            <td>{{ $nawlone->updated_at->format('Y-m-d') }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-top m-0">
                            <thead>
                                <tr>

                                    <th>مكان التحميل</th>
                                    <th>مكان التعتيق</th>
                                    <th>سعر النقلة</th>
                                    <th>العهدة</th>
                                    <th>سولار</th>
                                    <th>تاريخ النقلة</th>
                                    <th>تاريخ الانتهاء</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap">
                                        {{ $nawlone->down_location->name ??$nawlone->location_name}}
                                    <td class="text-nowrap">
                                        {{ $nawlone->location_tatek->name ?? $nawlone->location_tatek_name}}
                                    </td>
                                    <td class="text-nowrap">{{ $nawlone->nawlone_price }} EGP</td>
                                    <td>{{ $nawlone->custody }}</td>
                                    <td>{{ $nawlone->solar }}</td>
                                    <td>{{ $nawlone->created_at }}</td>
                                    <td>{{ $nawlone->updated_at }}</td>

                                </tr>


                                <tr>
                                    <td colspan="3" class="align-top px-4 py-5">
                                        <p class="mb-2">
                                            <span class="me-1 fw-semibold">Salesperson:</span>
                                            <span>Alfie Solomons</span>
                                        </p>
                                        <span>Thanks for your business</span>
                                    </td>
                                    <td class="text-end px-4 py-5">
                                        <p class="mb-2"> قيمة الناولون:</p>
                                        <p class="mb-2">العهدة:</p>
                                        <p class="mb-2">السولار:</p>
                                        <p class="mb-0"> الربح:</p>
                                    </td>
                                    <td class="px-4 py-5">
                                        <p class="fw-semibold mb-2">{{ $nawlone->nawlone_price }}</p>
                                        <p class="fw-semibold mb-2">{{ $nawlone->custody }}</p>
                                        <p class="fw-semibold mb-2">{{ $nawlone->solar }}</p>
                                        <p class="fw-semibold mb-0">{{ ($nawlone->custody
                                            - $nawlone->solar)+$nawlone->nawlone_price }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="bx bx-paper-plane bx-xs me-1"></i>ارسال</span>
                        </button>
                        <button class="btn btn-label-secondary d-grid w-100 mb-3">تحميل</button>
                        <a class="btn btn-label-secondary d-grid w-100 mb-3" onClick="window.print()"
                            Printtarget="#printData{{ $nawlone->id }}" href="#">
                            طباعة
                        </a>


                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>

        <!-- Offcanvas -->
        <!-- Send Invoice Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
            <div class="offcanvas-header border-bottom">
                <h6 class="offcanvas-title">ارسال</h6>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form>
                    <div class="mb-3">
                        <label for="invoice-from" class="form-label">From</label>
                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-to" class="form-label">To</label>
                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com"
                            placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="invoice-subject"
                            value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-message" class="form-label">Message</label>
                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">
Dear Queen Consolidated,
          Thank you for your business, always a pleasure to work with you!
          We have generated a new invoice in the amount of $95.59
          We would appreciate payment of this invoice by 05/11/2021</textarea>
                    </div>
                    <div class="mb-4">
                        <span class="badge bg-label-primary">
                            <i class="bx bx-link bx-xs"></i>
                            <span class="align-middle">Invoice Attached</span>
                        </span>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">ارسال</button>
                        <button type="button" class="btn btn-label-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->



        <!-- /Offcanvas -->
    </div>
    <!-- / Content -->

    <!-- Footer -->

    <!-- / Footer -->


</div>







































@section('script')

<script src="../assets/js/main.js"></script>

<script src="../assets/js/offcanvas-send-invoice.js"></script>

@endsection
@endsection