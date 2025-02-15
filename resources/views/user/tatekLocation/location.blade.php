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


<!-- Bootstrap Table with Header - Dark -->


<div class="mt-3">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
        اضافة مكان التعتيق
    </button>
    <div class="card">
        <h5 class="card-header">جميع الاماكن</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>مكان التعتيق</th>
                        <th>تفاصيل المكان</th>
                        <th>تعديلات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($locatonTatek as $tatek)
                    <tr>
                        <td>


                            <strong>
                                {{$loop->iteration }}
                            </strong>
                        </td>
                        <td>


                            <strong>
                                {{$tatek->name }}
                            </strong>
                        </td>
                        <td>


                            <strong>
                                {{$tatek->address }}
                            </strong>
                        </td>


                        <td>

                            <a class="dropdown-item" data-bs-target="#basicModal{{ $tatek->id }}" data-bs-toggle="modal"
                                href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                Edit</a>
                            <a class="dropdown-item" href="{{ route('deleteLocation',['id'=>$tatek->id]) }}"><i
                                    class="bx bx-trash me-1"></i>Delete</a>
                        </td>
                    </tr>
                    {{-- Start Model With Eit Car --}}
                    <div class="modal fade" id="basicModal{{ $tatek->id }}" tabindex="-1" aria-hidden="true">




                        <div class="modal-dialog" role="document">


                            <div class="modal-content">

                                <div class="modal-header">

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <h5 class="card-header">تعديل المكان</h5>
                                        <div class="card-body">
                                            <form class="browser-default-validation"
                                                action="{{route('editTatekLocation')}}" method="POST"
                                                enctype="multipart/form-data" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="location_id" value="{{ $tatek->id }}">
                                                <div class="input-group input-group-lg mb-3">
                                                    <input type="text" class="form-control bg-white border-0"
                                                        placeholder="اكتب اسم المكان الجديد"
                                                        aria-describedby="subscribe" name="name" />
                                                    <button class="btn btn-primary" type="submit"
                                                        id="subscribe">تعديل</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Model With Eit Car --}}
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Bootstrap Table with Header Dark -->

    <div class="col-lg-4 col-md-6">


        {{-- Start modale With add New Tatek Location --}}
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">اضافة مكان التعتيق</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Start body Model With Inputs -->
                            <div class="col-md">
                                <form class="browser-default-validation" action="{{route('storeLocation')}}"
                                    method="POST" enctype="multipart/form-data" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" class="form-control bg-white border-0"
                                            placeholder="اكتب اسم المكان الجديد للتعتيق" aria-describedby="subscribe"
                                            name="name" />
                                    </div>
                                    <div class="input-group input-group-lg mb-3">
                                        <textarea type="text" class="form-control bg-white border-0"
                                            placeholder="اكتب تفاصيل المكان" aria-describedby="subscribe"
                                            name="address"></textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit" id="subscribe">اضافة</button>
                                </form>
                                <!-- /End body Model With Inputs -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- End modale With add New Tatek Location --}}
        </div>
    </div>
    @endsection