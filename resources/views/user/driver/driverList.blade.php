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
<style>
    .myTable tr td {
        max-width: 100px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>



<!-- Bootstrap Table with Header - Dark -->
<div id="contain">
    <button class="btn btn-primary mb-2" data-bs-target="#basicModal" data-bs-toggle="modal"
        href="javascript:void(0);"><i class="bx bx-plus me-1"></i>
        اضافة سائق</button>
</div>
<div class="card">
    <h5 class="card-header">جميع السائقين</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>اسم السائق</th>
                    <th> رقم الموبايل</th>
                    <th> رقم البطاقة</th>
                    <th>تاريخ االنتهاء</th>
                    <th>صور السائق </th>
                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0 myTable">
                @foreach ($drivers as $driver)
                <tr>
                    <td>


                        <strong>

                            {{ $driver->driv_name }}
                        </strong>
                    </td>

                    <td>

                        <span class="badge bg-label-primary me-1">
                            {{ $driver->phone }}
                        </span>
                    </td>
                    <td>

                        <span class="badge bg-label-primary me-1">
                            {{ $driver->id_number }}
                        </span>
                    </td>


                    <td>
                        <strong>

                            {{ $driver->ex_date }}
                        </strong>
                    </td>



                    <td>

                        <img src="../public/images/driver/{{ $driver->image }}" width="50px" alt="">
                    </td>


                    {{-- <td>

                        <a class="dropdown-item" data-bs-target="#basicModal{{ $driver->id }}" data-bs-toggle="modal"
                            href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                        <a class="dropdown-item" href="{{ route('deleteDriver', ['id' => $driver->id]) }}"><i
                                class="bx bx-trash me-1"></i>Delete</a>
                    </td> --}}

                    <td>
                        <div style="display: flex;align-items: center;justify-content: space-between;">
                            <i class="fa-solid fa-ellipsis-vertical btnCus" style="cursor: pointer"
                                id="btn{{ $driver->id }}"></i>

                            <div class="d-none menu-cus"
                                style="position: absolute;left: -2%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;margin-top: 48bpx;">
                                <a style="font-weight: 600;" class="dropdown-item"
                                    data-bs-target="#basicModal{{ $driver->id }}" data-bs-toggle="modal"
                                    href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a style="font-weight: 600;" class="dropdown-item"
                                    href="{{ route('deleteDriver', ['id' => $driver->id]) }}"><i
                                        class="bx bx-trash me-1"></i>Delete</a>
                            </div>
                        </div>
                    </td>

                </tr>
                {{-- Start Model With Eit Car --}}
                <div class="modal fade" id="basicModal{{ $driver->id }}" tabindex="-1" aria-hidden="true">




                    <div class="modal-dialog" role="document">


                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <h5 class="card-header">اضافة سائقين جديدة</h5>
                                    <div class="card-body">
                                        <form class="browser-default-validation" action="{{ route('editDriver') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="driv_name">اسم السائق</label>
                                                <input type="text" value='{{ $driver->driv_name }}' name="driv_name"
                                                    class="form-control" id="driv_name" />
                                                @error('driv_name')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="id_number"> رقم
                                                    البطاقة</label>
                                                <input type="number" value='{{ $driver->id_number }}' name="id_number"
                                                    id="id_number" class="form-control" />
                                                @error('id_number')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="address"> عنوان السائق </label>
                                                <input type="text" name="address" value='{{ $driver->address }}'
                                                    id="address" class="form-control" />
                                                @error('address')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="phone"> رقم السائق </label>
                                                <input type="text" name="phone" id="id_phone"
                                                    value='{{ $driver->phone }}' class="form-control" />
                                                @error('phone')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="brand">راتب السائق</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="number" value={{ $driver->salary }}
                                                    id="basic-default-number" name="salary"
                                                    class="form-control" aria-describedby="salary" />
                                                    <span class="input-group-text cursor-pointer"
                                                        id="basic-default-number"></span>

                                                </div>
                                                @error('salary')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-dob">كومسيوم </label>
                                                <input type="number" name="comsium" class="form-control "
                                                    id="basic-default-dob" value='{{ $driver->comsium }}' />
                                                @error(' comsium')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-upload-file"> صورة
                                                    السائق
                                                </label>
                                                <input type="file" name="image" class="form-control"
                                                    id="basic-default-upload-file" value='{{ $driver->image }}' />
                                                @error('image')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-upload-file"> صورة
                                                    الفيش
                                                </label>
                                                <input type="file" name="image_procedures" class="form-control"
                                                    id="basic-default-upload-file"
                                                    value="{{ $driver->image_procedures }}" />
                                                @error('image_procedures')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-upload-file"> صورة
                                                    الرخصة
                                                </label>
                                                <input type="file" name="image_license" class="form-control"
                                                    id="basic-default-upload-file"
                                                    value='{{ $driver->image_license }}' />
                                                @error('image_license')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="license">رقم الرخصة</label>
                                                <input type="text" name="license" class="form-control" id="license"
                                                    value="{{ $driver->license }}" />
                                                @error('license')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-mb-3 mb-4">
                                                <label class="form-label" for="multicol-birthdate">تاريخ انتهاء
                                                    الرخصة</label>
                                                <input type="date" id="multicol-birthdate" name="ex_date"
                                                    value="{{ $driver->ex_date }}"
                                                    class="form-control dob-picker flatpickr-input">
                                            </div>
                                            <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">اضافة</button>
                                                </div>
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


{{-- Start Model With Eit Car --}}
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
                            <h5 class="card-header">اضافة سائق </h5>
                            <div class="card-body">
                                <form class="browser-default-validation" action="{{ route('addDriver') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="driv_name">اسم السائق</label>
                                        <input type="text" name="driv_name" class="form-control" id="driv_name"
                                            placeholder="اكتب اسم السائق " />
                                        @error('driv_name')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="id_number"> رقم البطاقة</label>
                                        <input type="number" name="id_number" id="id_number" class="form-control"
                                            placeholder="اكتب رقم البطاقة" />
                                        @error('id_number')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address"> عنوان السائق </label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="عنوان السائق" />
                                        @error('address')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone"> رقم السائق </label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="اكتب رقم السائق" />
                                        @error('phone')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="brand">راتب السائق</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="basic-default-number" name="salary"
                                                class="form-control" placeholder="اكت المرتب الخاص بك"
                                                aria-describedby="salary" />


                                        </div>
                                        @error('salary')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-dob">كموسيون </label>
                                        <input type="number" name="comsium" class="form-control flatpickr-validation"
                                            id="basic-default-dob" />
                                        @error('comsium')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file"> صورة السائق </label>
                                        <input type="file" name="image" class="form-control"
                                            id="basic-default-upload-file" />
                                        @error('image')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file"> صورة الفيش </label>
                                        <input type="file" name="image_procedures" class="form-control"
                                            id="basic-default-upload-file" />
                                        @error('image_procedures')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file"> صورة الرخصة </label>
                                        <input type="file" name="image_license" class="form-control"
                                            id="basic-default-upload-file" />
                                        @error('image_license')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="license">رقم الرخصة</label>
                                        <input type="text" name="license" class="form-control" id="license"
                                            placeholder="رقم الرخصة " />
                                        @error('license')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-mb-3 mb-4">
                                        <label class="form-label" for="multicol-birthdate">تاريخ انتهاء الرخصة</label>
                                        <input type="date" id="multicol-birthdate" name="ex_date"
                                            class="form-control dob-picker flatpickr-input" placeholder="YYYY-MM-DD">
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
    {{-- End Model With Eit Car --}}
    @section('script')
    <script>
        $(document).ready(() => {
            $(".btnCus").each((ele, val) => {
                var poi_id = `#${$(val).attr("id")}`
                console.log(poi_id);

                $(poi_id).mouseenter(() => {
                    $(poi_id).next().toggleClass("d-none")
                })

                $(".menu-cus").mouseleave(() => {
                    $(".menu-cus").addClass("d-none");
                })
            })
        })
    </script>
    @endsection
    @endsection