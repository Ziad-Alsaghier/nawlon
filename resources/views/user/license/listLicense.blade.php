@extends('layouts/layoutMaster')
@php
$user='Minue';
@endphp


@section('title', 'الرخص')

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

<div id="contain">
    <button class="btn btn-primary mb-2" data-bs-target="#basicModal" data-bs-toggle="modal"
        href="javascript:void(0);"><i class="bx bx-plus me-1"></i>
        اضافة رخصة</button>
</div>
<!-- Bootstrap Table with Header - Dark -->
<div class="card">
    <h5 class="card-header">جميع الرخص</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>اسم السيارة</th>

                    <th> الرخصة</th>
                    <th> صورة الرخصة</th>
                    <th> تاريخ الأنتهاء</th>
                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @foreach($licenses as $license)
                <tr>
                    <td>

                        <strong>
                            {{ $license->car->cars_name}}
                        </strong>
                    </td>
                    <td>

                        <strong>
                            {{ $license->license_number}}
                        </strong>
                    </td>
                    <td>

                        <strong>

                            <img src="../../public/images/license/{{ $license->image }}" alt="" width="200px">
                        </strong>
                    </td>
                    <td>

                        <strong>
                            {{ $license->ex_date}}
                        </strong>
                    </td>


                    <td>
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" data-bs-target="#basicModal{{ $license->id}}"
                                data-bs-toggle="modal" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                Edit</a>
                            <a class="dropdown-item" href="{{ route('deleteLicense',['id'=> $license->id ]) }}"><i
                                    class="bx bx-trash me-1"></i>
                                Delete</a>



                        </div>
                    </td>
                </tr>
                {{-- Start Model With Eit License --}}
                <div class="modal fade" id="basicModal{{ $license->id}}" tabindex="-1" aria-hidden="true">




                    <div class="modal-dialog" role="document">


                        <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Start body Model With Inputs -->
                                    <div class="col-md">

                                        <div class="card">
                                            <h5 class="card-header"> تعديل الرخصة : {{ $license->car->cars_name }}</h5>
                                            <div class="card-body">
                                                <form class="needs-validation" action="{{ route('updateLicense') }}"
                                                    method="POST" enctype="multipart/form-data" novalidate="">
                                                    @csrf

                                                    <input type="hidden" name="car_id" value="{{ $license->car->id}}">
                                                    <input type="hidden" name="license_id" value="{{ $license->id}}">


                                                    <div class="mb-3 " id="inputMonthly">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basic-default-country">اختيار
                                                                السيارة</label>
                                                            <select class="form-select" id="basic-default-country"
                                                                name="car_id">
                                                                <option value="">اختيار السيارة</option>
                                                                @foreach($cars as $car)
                                                                <option value="{{ $car->id }}">{{ $car->cars_name }}
                                                                </option>
                                                                @endforeach

                                                            </select>
                                                            @error('date')
                                                            <span class="error">{{ $message }}</span class="error">
                                                            @enderror
                                                        </div>

                                                        <div class="valid-feedback">Looks good!</div>
                                                        <div class="">
                                                            @error('price')
                                                            <span class="span"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 " id="inputMonthly">
                                                            <label class="form-label" for="bs-validation-email">رقم
                                                                الرخصة</label>
                                                            <input type="number" value="{{ $license->license_number }}"
                                                                id="bs-validation-email" class="form-control"
                                                                name="license_number" placeholder="تعديل رقم الرخصة">

                                                            <div class="">

                                                            </div>
                                                            <div class="col-mb-3">
                                                                <label class="form-label" for="multicol-birthdate">تاريخ
                                                                    الأنتهاء</label>
                                                                <input type="date" id="multicol-birthdate"
                                                                    value="{{ $license->ex_date }}" name="ex_date"
                                                                    class="form-control dob-picker flatpickr-input"
                                                                    placeholder="YYYY-MM-DD">

                                                            </div>

                                                        </div>




                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary">تاكيد</button>
                                                            </div>

                                                </form>
                                            </div>
                                        </div>
                                        <!-- /End body Model With Inputs -->
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- End Model With Eit Packages --}}
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Bootstrap Table with Header Dark -->






{{-- Start Model Add License --}}

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Start body Model With Inputs -->
                    <div class="col-md">
                        <div class="card">
                            <h5 class="card-header">اضافة رخصة سيارة </h5>
                            <div class="card-body">
                                <form class="browser-default-validation" action="{{ route('processAddLicense') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="cars_name"> رقم الرخصة </label>
                                        <input type="text" name="license_number" class="form-control" id="cars_name"
                                            placeholder=" اكتب رقم الرخصة " />
                                        @error('license_number')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-mb-3">
                                        <label class="form-label" for="multicol-birthdate">تاريخ انتهاء الرخصة</label>
                                        <input type="date" id="multicol-birthdate" name="ex_date"
                                            class="form-control dob-picker flatpickr-input" placeholder="YYYY-MM-DD">
                                        @error('ex_date')
                                        <span class="error">{{ $message }}</span class="error">
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file">صورة الرخصة</label>
                                        <input type="file" name="image" class="form-control"
                                            id="basic-default-upload-file">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country">اختيار السيارة</label>
                                        <select class="form-select" id="basic-default-country" name="car_id">
                                            <option value="">اختيار السيارة</option>
                                            @foreach($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->cars_name }}</option>

                                            @endforeach

                                        </select>
                                        @error('date')
                                        <span class="error">{{ $message }}</span class="error">
                                        @enderror
                                    </div>



                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">اضافة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /End body Model With Inputs -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Model Add License --}}
    @endsection