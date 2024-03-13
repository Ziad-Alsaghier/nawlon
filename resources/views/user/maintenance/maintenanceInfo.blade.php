@extends('layouts/layoutMaster')
@php
$user = 'Minue';
@endphp


@section('title', 'Report Maintanence')

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
<!-- Favicon -->
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
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />

@endsection
@section('style-header')
<style>
    @media print {



        .action {
            display: none;
        }

        .content-wrapper {
            width: 100%;
        }

        aside#layout-menu {
            display: none;
        }

        nav#layout-navbar {
            display: none;
        }
    }
</style>
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


<div class="content-wrapper" id="print">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex justify-content-center svg-illustration mb-3 gap-2">

                                    <img width="150px" src="{{ asset(" ../../public/images/customer/" .
                                        auth()->user()->logoImage) }}"
                                    width="200px" alt="">
                                </div>

                            </div>
                            <div>

                                <h4>رقم &nbsp; #{{ $maintanences->id }}</h4>
                                <div class="mb-2">
                                    <span class="me-1">بداية الصيانة :</span>
                                    <span class="fw-semibold">{{ $maintanences->created_at->format('d-m-Y') }}</span>
                                </div>
                                <div>
                                    <span class="me-1">انتهاء الصيانة:</span>
                                    <span class="fw-semibold">{{ $maintanences->updated_at->format('d-m-Y')
                                        }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <img width="150px" src="{{ asset(" ../../public/images/cars/" . $maintanences->car->image) }}"
                        width="" alt="" >
                        <div class="row p-sm-3 p-0">

                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                <h6 class="pb-2">تفاصيل:السيارة</h6>
                                <p class="mb-1">اسم السيارة : {{ $maintanences->car->cars_name }}</p>
                                <p class="mb-1">نوع السيارة :{{ $maintanences->car->brand }} </p>
                                <p class="mb-1">رقم السيارة : {{ $maintanences->car->car_number }}</p>
                            </div>
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                <h6 class="pb-2">Bill To:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-3">بداية الصيانة:</td>
                                            <td>{{ $maintanences->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-3">تاريخ الانتهاء :</td>
                                            <td>{{ $maintanences->updated_at->format('d-m-Y')
                                                }}</td>
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
                                    <th>اسم قطعة الغيار</th>
                                    <th>رقم قطعة الغيار</th>
                                    <th colspan="2">تفاصيل</th>
                                    <th>سعر الصيانة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($maintanences->car_parts as $carPart)

                                <tr>
                                    <td class="text-nowrap">{{$carPart->name }}</td>
                                    <td class="text-nowrap">{{ $carPart->code }}</td>
                                    <td colspan="2">{{ $maintanences->description }}</td>
                                    <td>{{ $maintanences->maintenances_price }}</td>
                                </tr>
                                @endforeach



                                <tr>
                                    <td colspan="3" class="align-top px-4 py-5">
                                        <p class="mb-2">

                                        </p>
                                    </td>
                                    <td class="text-end px-4 py-5">
                                        <p class="mb-2">Total:</p>
                                        {{-- <p class="mb-2">Discount:</p>
                                        <p class="mb-2">Tax:</p>
                                        <p class="mb-0">Total:</p> --}}
                                    </td>
                                    <td class="px-4 py-5">
                                        <p class="fw-semibold mb-2">
                                            {{ round($maintanences->maintenances_price) }} EGP
                                        </p>
                                        {{-- <p class="fw-semibold mb-2">$00.00</p>
                                        <p class="fw-semibold mb-2">$50.00</p>
                                        <p class="fw-semibold mb-0">$204.25</p> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-top m-0">
                            <thead>
                                <tr>
                                    <th>الخدمة</th>
                                    <th>ثمن الخدمة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($maintanences->sevicesMaintanenc as $service)

                                <tr>
                                    <td class="text-nowrap">{{$service->servicesTitle }}</td>
                                    <td class="text-nowrap">{{ $service->servicesPrice }}</td>

                                </tr>
                                @endforeach



                                <tr>

                                    <td class="text-end px-4 py-5">
                                        <p class="mb-2">Total:</p>
                                        {{-- <p class="mb-2">Discount:</p>
                                        <p class="mb-2">Tax:</p>
                                        <p class="mb-0">Total:</p> --}}
                                    </td>
                                    <td class="px-4 py-5">
                                        <p class="fw-semibold mb-2">
                                            {{ round($maintanences->totalServicesPrice) }} EGP
                                        </p>
                                        {{-- <p class="fw-semibold mb-2">$00.00</p>
                                        <p class="fw-semibold mb-2">$50.00</p>
                                        <p class="fw-semibold mb-0">$204.25</p> --}}
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
            <div class="col-xl-3 col-md-4 col-12 invoice-actions action">
                <div class="card">
                    <div class="card-body">

                        <button class="btn btn-label-secondary d-grid w-100 mb-3">تحميل</button>
                        <a class="btn btn-label-secondary d-grid w-100 mb-3" onclick="window.print()" target="print"
                            href="print">
                            طباعة
                        </a>
                        <a href="./app-invoice-edit.html" class="btn btn-label-secondary d-grid w-100 mb-3">
                            نهاية
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
                <h6 class="offcanvas-title">Send Invoice</h6>
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
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->

        <!-- Add Payment Sidebar -->
        <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
            <div class="offcanvas-header border-bottom">
                <h6 class="offcanvas-title">Add Payment</h6>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
                    <p class="mb-0">Invoice Balance:</p>
                    <p class="fw-bold mb-0">$5000.00</p>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="invoiceAmount">Payment Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" id="invoiceAmount" name="invoiceAmount"
                                class="form-control invoice-amount" placeholder="100" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="payment-date">Payment Date</label>
                        <input id="payment-date" class="form-control invoice-date" type="text" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="payment-method">Payment Method</label>
                        <select class="form-select" id="payment-method">
                            <option value="" selected disabled>Select payment method</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                        <textarea class="form-control" id="payment-note" rows="2"></textarea>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Add Payment Sidebar -->

        <!-- /Offcanvas -->
    </div>
    <!-- / Content -->

    <!-- Footer -->
    {{-- <footer class="content-footer footer bg-footer-theme">
        <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://pixinvent.com" target="_blank" class="footer-link fw-semibold">PIXINVENT</a>
            </div>
            <div>
                <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
                <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More
                    Themes</a>

                <a href="https://demos.pixinvent.com/frest-html-admin-template/documentation/" target="_blank"
                    class="footer-link me-4">Documentation</a>

                <a href="https://pixinvent.ticksy.com/" target="_blank"
                    class="footer-link d-none d-sm-inline-block">Support</a>
            </div>
        </div>
    </footer> --}}
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>






































@section('script')

<script src="../../assets/js/main.js"></script>

<script src="../../assets/js/offcanvas-send-invoice.js"></script>

@endsection
@endsection