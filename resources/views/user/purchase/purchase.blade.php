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

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
        شراء
    </button>
</div>
<div class="card">
    <h5 class="card-header"> جميع المشتريات</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th> تصنيف</th>
                    <th> المنتج</th>
                    <th> الكمية</th>
                    <th> المورد</th>
                    <th> التاريخ</th>
                    <th> اجمالي القيمة</th>


                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($purchases as $purchase)


                <tr>
                    <td>


                        <strong>
                            {{ $purchase->product_category->name }}

                        </strong>
                    </td>


                    <td>
                        <strong>
                            {{ $purchase->carPart->name }}

                        </strong>

                    </td>

                    <td>
                        <strong>
                            {{ $purchase->quantity }}

                        </strong>
                    </td>
                    <td>
                        <strong>
                            {{ $purchase->supplier->name }}

                        </strong>
                    </td>
                    <td>
                        <strong>
                            {{ $purchase->date }}

                        </strong>
                    </td>
                    <td>
                        <strong>
                            EGP {{ $purchase->totalPrice }}

                        </strong>
                    </td>




                    <td>
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <a class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#animationModal{{ $purchase->id }}" href="javascript:void(0);"><i
                                class="bx bx-edit-alt me-1"></i>
                            Edit</a>

                        <a class="dropdown-item" href="{{ route('deletePrchase',['id'=>$purchase->id]) }}"><i
                                class="bx bx-trash me-1"></i>
                            Delete</a>
                    </td>
                </tr>
                {{-- Start Model With Eit purchase --}}
                <div class="modal fade animate__animated fadeIn" id="animationModal{{ $purchase->id }}" tabindex="-1"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" action="{{ route('editPurchase') }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf
                                    <input type="hidden" name="purchase_id" value="{{$purchase->id  }}">


                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country"> اختار الصنف</label>
                                        <select class="form-select" id="basic-default-country"
                                            value="{{ $purchase->product_category->id }}" name="product_category_id">
                                            <option value="{{ $purchase->product_category->id }}">
                                                {{ $purchase->product_category->name }}
                                            </option>
                                            @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"> {{
                                                $productCategory->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country"> اختر قطعة الغيار</label>
                                        <select class="form-select" id="basic-default-country"
                                            value="{{ $purchase->carPart->id }}" name="car_part_id">
                                            <option value="{{ $purchase->carPart->id }}"> {{ $purchase->carPart->name
                                                }}</option>
                                            @foreach ($car_parts as $car_part)
                                            <option value="{{ $car_part->id }}"> {{ $car_part->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country">اختر المورد</label>
                                        <select class="form-select" id="basic-default-country" {{
                                            $purchase->supplier->id }} name="supplier_id">
                                            <option value="{{ $purchase->supplier->id }}"> {{ $purchase->supplier->name
                                                }}</option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"> {{ $supplier->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 " id="inputMonthly">
                                        <label class="form-label" for="bs-validation-email"> الكمية</label>
                                        <input type="number" value="{{ $purchase->quantity}}" id="bs-validation-email"
                                            class="form-control" name="quantity" placeholder=" اكتب اجمالي القيمة ">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>


                                    <div class="mb-3 " id="inputMonthly">
                                        <label class="form-label" for="bs-validation-email">تاريخ</label>
                                        <input type="date" value="{{ $purchase->date }}" id="bs-validation-email"
                                            class="form-control" name="date" placeholder=" اكتب التاريخ ">

                                    </div>

                                    <div class="mb-3 " id="inputMonthly">
                                        <label class="form-label" for="bs-validation-email"> اجمالي القيمة</label>
                                        <input type="number" id="bs-validation-email" class="form-control"
                                            name="totalPrice" value="{{ $purchase->totalPrice}}"
                                            placeholder=" اكتب اجمالي القيمة ">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>

                                    <div class="row">

                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary">تعديل</button>
                                        </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- End Model With Eit purchase --}}

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
                <h5 class="modal-title" id="exampleModalLabel1"> شراء منتج </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Start body Model With Inputs -->
                    <div class="col-md">

                        <div class="card">
                            <h5 class="card-header">
                            </h5>
                            <div class="card-body">
                                <form class="needs-validation" action="{{ route('addPurchase') }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf



                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country"> اختار الصنف</label>
                                        <select class="form-select" id="basic-default-country"
                                            name="product_category_id">
                                            <option value="">اختار الصنف </option>
                                            @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"> {{
                                                $productCategory->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country"> اختر قطعة الغيار</label>
                                        <select class="form-select" id="basic-default-country" name="car_part_id">
                                            <option value="">اختار قطعة الغيار</option>
                                            @foreach ($car_parts as $car_part)
                                            <option value="{{ $car_part->id }}"> {{ $car_part->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country">اختر المورد</label>
                                        <select class="form-select" id="basic-default-country" name="supplier_id">
                                            <option value="">اختار المورد </option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"> {{ $supplier->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 " id="inputMonthly">
                                        <label class="form-label" for="bs-validation-email"> الكمية</label>
                                        <input type="number" id="bs-validation-email" class="form-control"
                                            name="quantity" placeholder=" اكتب اجمالي القيمة ">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>


                                    <div class="mb-3 " id="inputMonthly">
                                        <label class="form-label" for="bs-validation-email">تاريخ</label>
                                        <input type="date" id="bs-validation-email" class="form-control" name="date"
                                            placeholder=" اكتب التاريخ ">

                                    </div>

                                    <div class="mb-3 " id="inputMonthly">
                                        <label class="form-label" for="bs-validation-email"> اجمالي القيمة</label>
                                        <input type="number" id="bs-validation-email" class="form-control"
                                            name="totalPrice" placeholder=" اكتب اجمالي القيمة ">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>

                                    <div class="row">

                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary">اضف</button>
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
    @endsection