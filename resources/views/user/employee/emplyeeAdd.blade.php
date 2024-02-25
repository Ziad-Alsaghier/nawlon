@extends('layouts/layoutMaster')
@php
$user='Minue';
@endphp


@section('title', 'Customer')

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
    .span {
        color: red;
    }
</style>
<!-- Page CSS -->
@endsection

@section('page-style')

@endsection
@section('vendor-script')

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
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
<script src="../assets/vendor/libs/select2/select2.js"></script>
<script src="../assets/vendor/libs/tagify/tagify.js"></script>
<script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="../assets/vendor/libs/bloodhound/bloodhound.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/forms-selects.js"></script>
<script src="../assets/js/forms-tagify.js"></script>
<script src="../assets/js/forms-typeahead.js"></script>
<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/config.js"></script>
@endsection
@section('content')


@include('success')



<div class="row mb-4">

    <!-- Bootstrap Validation -->
    <div class="col-md">

        <div class="card">
            <h5 class="card-header">اضافة موظفين</h5>
            <div class="card-body">
                <form class="needs-validation" action="{{ route('addEmployee') }}" method="POST"
                    enctype="multipart/form-data" novalidate="">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="name">اسم الموظف</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="اكتب اسم الموظف " />
                        @error('name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="id_employee"> رقم بطاقة الموظف</label>
                        <input type="number" name="id_employee" id="id_employee" class="form-control"
                            placeholder="اكتب رقم البطاقة" />
                        @error('id_employee')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address"> عنوان الموظف </label>
                        <input type="text" name="address" id="address" class="form-control"
                            placeholder="عنوان الموظف" />
                        @error('address')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone"> رقم الموظف </label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="اكتب رقم السائق" />
                        @error('phone')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="brand">راتب الموظف</label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="basic-default-number" name="salary" class="form-control"
                                placeholder="اكت المرتب الخاص بالموظف" aria-describedby="salary" />


                        </div>
                        @error('salary')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-upload-file"> صورة الفيش </label>
                        <input type="file" name="image_procedures" class="form-control"
                            id="basic-default-upload-file" />
                        @error('image_procedures')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-upload-file"> صورة الرخص </label>
                        <input type="file" name="image" class="form-control" id="basic-default-upload-file" />
                        @error('image')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="bs-validation-password">القسم</label>
                        <div class="input-group input-group-merge">
                            {{-- Start Selector --}}
                            <div class="col-md-12 mb-4">
                                <div class="select2-success">
                                    <div class="position-relative">
                                        <select id="select2Success" name="divide_id"
                                            class="select2 form-select select2-hidden-accessible"
                                            data-select2-id="select2Success" tabindex="-1" aria-hidden="true">
                                            @foreach($divides as $divide)

                                            <option value="{{ $divide->id }}">{{
                                                $divide->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('divide_id')
                                        <span class="error"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- End Selector --}}


                            </div>

                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <!-- /Bootstrap Validation -->
</div>



@endsection