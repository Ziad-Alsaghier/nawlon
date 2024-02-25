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
        اضافة موظفين</button>
</div>
<div class="card">
    <h5 class="card-header">جميع الموظفين</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>اسم الموظف</th>
                    <th> رقم الموبايل الموظف</th>
                    <th>مرتب الموظف</th>
                    <th>عنوان الموظف</th>
                    <th>صورة الموظف</th>
                    <th>القسم</th>
                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($employees as $employee)
                <tr>
                    <td>


                        <strong>

                            {{ $employee->name}}
                        </strong>
                    </td>

                    <td>

                        <span class="badge bg-label-primary me-1">
                            {{ $employee->phone}}
                        </span>
                    </td>
                    <td>

                        <strong>

                            {{ $employee->salary}}
                        </strong>
                    </td>
                    <td>

                        <strong>

                            {{ $employee->address}}
                        </strong>
                    </td>






                    <td>
                        <img src="../public/images/employees/{{ $employee->image}}" width="50px" alt="">
                    </td>



                    <td>

                        {{ $employee->divide->name}}
                    </td>

                    <td>


                        <a class="dropdown-item" data-bs-target="#basicModal{{ $employee->id}}" data-bs-toggle="modal"
                            href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                        <a class="dropdown-item" href="{{ route('deleteEmployee',['id'=>$employee->id]) }}"><i
                                class="bx bx-trash me-1"></i>Delete</a>
                    </td>
                </tr>
                {{-- Start Model With Eit Car --}}
                <div class="modal fade" id="basicModal{{ $employee->id}}" tabindex="-1" aria-hidden="true">




                    <div class="modal-dialog" role="document">


                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <h5 class="card-header"> تعديل الموظف :{{ $employee->name }}</h5>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('empolyeeUpdate') }}" method="POST"
                                        enctype="multipart/form-data" novalidate="">
                                        @csrf
                                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">اسم الموظف</label>
                                            <input type="text" name="name" value="{{ $employee->name }}"
                                                class="form-control" id="name" />
                                            @error('name')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="id_employee"> رقم بطاقة الموظف</label>
                                            <input type="number" value="{{ $employee->id_employee }}" name="id_employee"
                                                id="id_employee" class="form-control" />
                                            @error('id_employee')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="address"> عنوان الموظف </label>
                                            <input type="text" value="{{ $employee->address }}" name="address"
                                                id="address" class="form-control" />
                                            @error('address')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="phone"> رقم الموظف </label>
                                            <input type="text" value="{{ $employee->phone }}" name="phone" id="phone"
                                                class="form-control" />
                                            @error('phone')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="brand">راتب الموظف</label>
                                            <div class="input-group input-group-merge">
                                                <input type="number" value="{{ $employee->salary }}"
                                                    id="basic-default-number" name="salary" class="form-control"
                                                    aria-describedby="salary" />


                                            </div>
                                            @error('salary')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-upload-file"> صورة الفيش
                                            </label>
                                            <input type="file" value="{{ $employee->image_procedures }}"
                                                name="image_procedures" class="form-control"
                                                id="basic-default-upload-file" />
                                            @error('image_procedures')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-upload-file"> صورة الموظف
                                            </label>
                                            <input type="file" value="{{ $employee->image }}" name="image"
                                                class="form-control" id="basic-default-upload-file" />
                                            @error('image')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <label class="switch switch-success">

                                            <input type="checkbox" id='editDivide' class="switch-input" checked="">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <i class="bx bx-check"></i>
                                                </span>
                                                <span class="switch-off">
                                                    <i class="bx bx-x"></i>
                                                </span>
                                            </span>
                                            <span class="switch-label">Success</span>
                                        </label>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="bs-validation-password">القسم</label>
                                            <div class="input-group input-group-merge">
                                                {{-- Start Selector --}}
                                                <div class="col-md-12 mb-4 ">
                                                    <div class="select2-success">
                                                        <div class="position-relative">
                                                            <select id="select2Success" name="divide_id"
                                                                class="select2 form-select select2-hidden-accessible"
                                                                data-select2-id="select2Success" tabindex="-1"
                                                                aria-hidden="true">
                                                                @foreach($divides as $divide)

                                                                <option value="{{ $employee->divide->id }}">{{
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
                            <h5 class="card-header">اضافة السيارة </h5>
                            <div class="card-body">
                                <form class="needs-validation" action="{{ route('addEmployee') }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="name">اسم الموظف</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="اكتب اسم الموظف " />
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
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="اكتب رقم السائق" />
                                        @error('phone')
                                        <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="brand">راتب الموظف</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="basic-default-number" name="salary"
                                                class="form-control" placeholder="اكت المرتب الخاص بالموظف"
                                                aria-describedby="salary" />


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
                                        <input type="file" name="image" class="form-control"
                                            id="basic-default-upload-file" />
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
                                                            data-select2-id="select2Success" tabindex="-1"
                                                            aria-hidden="true">
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
                        <!-- /End body Model With Inputs -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- End Model With Eit Car --}}
    <!--/ Bootstrap Table with Header Dark -->
    @endsection