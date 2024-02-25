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

<!-- Page CSS -->
@endsection

@section('page-style')
<!-- Favicon -->

<style>

</style>
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
        اضافة فئة سيارة</button>
</div>
<div class="card">
    <h5 class="card-header">جميع السيارات</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>اسم الفئة</th>

                    <th>صور الفئات </th>
                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $category)
                <tr>
                    <td>
                        {{ $category->category }}

                    </td>

                    <td>
                        <img src="../public/images/categories/{{ $category->image }}" width="40px"
                            alt="{{ $category->category }}" title="{{ $category->category }}">
                        {{-- {{$category->image}} --}}
                    </td>
                    <td>
                        <div style="display: flex;align-items: center;justify-content: space-between;">
                            <i class="fa-solid fa-ellipsis-vertical btnCus" style="cursor: pointer"
                                id="btn{{ $category->id }}"></i>

                            <div class="d-none menu-cus"
                                style="position: absolute;left: 18%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;margin-top: 40px;">
                                <a style="font-weight: 600;" class="dropdown-item"
                                    data-bs-target="#basicModal{{ $category->id }}" data-bs-toggle="modal"
                                    href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a style="font-weight: 600;" class="dropdown-item"
                                    href="{{ route('deleteCat', ['id'=>$category->id ]) }}"><i
                                        class="bx bx-trash me-1"></i>Delete</a>
                            </div>
                        </div>
                    </td>

                </tr>
                <div class="modal fade" id="basicModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1"> {{ $category->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Start body Model With Inputs -->
                                    <div class="col-md">
                                        <div class="card">
                                            <h5 class="card-header"> تعديل فئة السيارة </h5>
                                            <div class="card-body">
                                                <form class="browser-default-validation"
                                                    action="{{ route('processEditCategory') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="category">اسم الفئة</label>
                                                        <input type="text" value="{{ $category->category }}"
                                                            name="category" class="form-control" id="category"
                                                            placeholder="اكتب اسم الفئة " />
                                                        @error('category')
                                                        <span>{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-upload-file">اضافة
                                                            صورة
                                                            الفئة</label>
                                                        <input type="file" value="{{ $category->image }}" name="image"
                                                            class="form-control" id="basic-default-upload-file" />
                                                        <img src="../public/images/categories/{{ $category->image }}"
                                                            width="40px" alt="{{ $category->category }}"
                                                            title="{{ $category->category }}">
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
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
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Bootstrap Table with Header Dark -->
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
                            <h5 class="card-header">اضافة فئة سيارة </h5>
                            <div class="card-body">
                                <form class="browser-default-validation" action="{{ route('processAddCategory') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="category">اسم الفئة</label>
                                        <input type="text" name="category" class="form-control" id="category"
                                            placeholder="اكتب اسم الفئة " />
                                        @error('category')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file">اضافة صورة
                                            الفئة</label>
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