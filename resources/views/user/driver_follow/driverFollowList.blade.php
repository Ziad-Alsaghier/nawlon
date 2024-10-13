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
<div id="contain">
    <button class="btn btn-primary mb-2" data-bs-target="#basicModal" data-bs-toggle="modal"
        href="javascript:void(0);"><i class="bx bx-plus me-1"></i>
        اضافة تباعين</button>
</div>
<div class="card">
    <h5 class="card-header">جميع التباعين</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>اسم التباع</th>
                    <th>صورة التباع</th>
                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($driverFollows as $driverFollow)
                <tr>
                    <td>


                        <strong>
                            {{ $driverFollow->name}}
                        </strong>
                    </td>






                    <td>
                        <img src="../public/images/driverFollow/procedures/{{ $driverFollow->image_procedures}}"
                            width="50px" alt="">
                    </td>


                    <td>

                        <a class="dropdown-item" data-bs-target="#basicModal{{ $driverFollow->id}}"
                            data-bs-toggle="modal" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                        <a class="dropdown-item" href="{{ route('deletedriverFollow',['id'=>$driverFollow->id]) }}"><i
                                class="bx bx-trash me-1"></i>Delete</a>
                    </td>
                </tr>
                {{-- Start Model With Eit Car --}}
                <div class="modal fade" id="basicModal{{ $driverFollow->id}}" tabindex="-1" aria-hidden="true">




                    <div class="modal-dialog" role="document">


                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <h5 class="card-header"> تعديل التباع :{{ $driverFollow->name }}</h5>
                                <div class="card-body">
                                    <form class="browser-default-validation" action="{{ route('editDriverFollow') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="drivFollow_id" value="{{ $driverFollow->id }}">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">اسم التباع</label>
                                            <input type="text" name="name" value={{ $driverFollow->name }}
                                            class="form-control"
                                            id="name" />
                                            @error('name')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="id_follow"> رقم البطاقة</label>
                                            <input type="number" value={{ $driverFollow->id_follow }} name="id_follow"
                                            id="id_follow" class="form-control"
                                            />
                                            @error('id_follow')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="address"> عنوان التباع </label>
                                            <input type="text" name="address" value={{ $driverFollow->address }}
                                            id="address"
                                            class="form-control"
                                            />
                                            @error('address')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="phone"> رقم التباع </label>
                                            <input type="text" value={{ $driverFollow->phone }} name="phone" id="phone"
                                            class="form-control"
                                            />
                                            @error('phone')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="brand">راتب التباع</label>
                                            <div class="input-group input-group-merge">
                                                <input type="number" value="{{   $driverFollow->salary }}"
                                                    id=" basic-default-number" name="salary" class="form-control"
                                                    aria-describedby="salary" />
                                                <span class="input-group-text cursor-pointer"
                                                    id="basic-default-number"></span>

                                            </div>
                                            @error('salary')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-upload-file"> صورة التباع
                                            </label>
                                            <input type="file" value={{ $driverFollow->image_procedures }}
                                            name="image_procedures"
                                            class="form-control"
                                            id="basic-default-upload-file" />
                                            @error('image_procedures')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" value={{ $driverFollow->image }}
                                                for="basic-default-upload-file"> صورة الرخص
                                            </label>
                                            <input type="file" name="image" class="form-control"
                                                id="basic-default-upload-file" />
                                            @error('image')
                                            <span>{{ $message }}</span>
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
                            <h5 class="card-header">اضافة تباع </h5>
                            <div class="card-body">
                                <form class="browser-default-validation" action="{{ route('addDriverFollow') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="name">اسم التباع</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="اكتب اسم التباع " />
                                        @error('name')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="id_follow"> رقم البطاقة</label>
                                        <input type="number" name="id_follow" id="id_follow" class="form-control"
                                            placeholder="اكتب رقم البطاقة" />
                                        @error('id_follow')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address"> عنوان التباع </label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="عنوان التباع" />
                                        @error('address')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone"> رقم التباع </label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="اكتب رقم التباع" />
                                        @error('phone')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="brand">راتب التباع</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="basic-default-number" name="salary"
                                                class="form-control" placeholder="اكت المرتب الخاص بالتباع"
                                                aria-describedby="salary" />
                                            <span class="input-group-text cursor-pointer" id="basic-default-number"><i
                                                    class="bx bx-hide"></i></span>

                                        </div>
                                        @error('salary')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file"> صورة التباع </label>
                                        <input type="file" name="image_procedures" class="form-control"
                                            id="basic-default-upload-file" />
                                        @error('image_procedures')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file"> صورة الرخصة </label>
                                        <input type="file" name="image" class="form-control"
                                            id="basic-default-upload-file" />
                                        @error('image')
                                        <span>{{ $message }}</span>
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
    {{-- End Model With Eit Car --}}
    <!--/ Bootstrap Table with Header Dark -->
    @endsection