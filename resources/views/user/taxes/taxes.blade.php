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
@section('style')
<style>
    span {
        color: red;
    }
</style>
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
        اضافة ضريبة</button>
</div>
<div class="card">
    <div style="display: flex;justify-content: space-between; align-items: center;column-gap: 10px; padding: 0 10px;">
        <h5 class="card-header">جميع الضرائب</h5>
        <div class=""
            style="display: flex;direction: ltr;flex-direction: row-reverse;align-items: center;column-gap: 10px;">
            <input type="search" class="form-control" style="width: 200px !important" placeholder=""
                aria-controls="DataTables_Table_0" id="textbox_taxes">
            <label>Search:</label>
        </div>
    </div>


    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>

                    <th>السيارة </th>
                    <th>السعر المدفوع</th>
                    <th>تاريخ الدفع</th>

                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="my_table_taxes">
                @foreach ($taxes as $tax)
                <tr>
                    <td>
                        <strong>
                            {{ $tax->car->cars_name }}
                        </strong>
                    </td>


                    <td>
                        <strong>
                            {{ $tax->total_tex }}
                        </strong>
                    </td>
                    <td>
                        {{ $tax->date }}
                    </td>
                    <td>
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <a class="dropdown-item" data-bs-target="#basicModal{{ $tax->id }}" data-bs-toggle="modal"
                            href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                        <a class="dropdown-item" href="{{ route('deleteTaxes', ['id' => $tax->id]) }}"><i
                                class="bx bx-trash me-1"></i>
                            Delete</a>
                    </td>
                </tr>
                {{-- Start Model With Eit Car --}}
                <div class="modal fade" id="basicModal{{ $tax->id }}" tabindex="-1" aria-hidden="true">




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
                                            <h5 class="card-header">التعديل في الضريبة : {{ $tax->name }}</h5>
                                            <div class="card-body">
                                                <form class="browser-default-validation"
                                                    action="{{ route('updateTaxe') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="taxes_id" value="{{ $tax->id }}">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-country">اختر
                                                            سيارة
                                                        </label>
                                                        <select class="form-select" id="basic-default-country"
                                                            name="car_id">
                                                            <option value="{{ $tax->car->id }}">اختار السيارة
                                                            </option>
                                                            @foreach ($cars as $car)
                                                            <option value="{{ $car->id }}">
                                                                {{ $car->cars_name }}
                                                            </option>
                                                            @endforeach



                                                        </select>
                                                        @error('category')
                                                        <span>{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="total_tex"> المبلغ
                                                        </label>
                                                        <input type="number" name="total_tex" class="form-control"
                                                            value="{{ $tax->total_tex }}" id="total_tex"
                                                            placeholder=" ثمن الضريبة " />
                                                        @error('total_tex')
                                                        <span>{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="date">تاريخ
                                                            الدفع</label>
                                                        <input type="date" value="{{ $tax->date }}" name="date"
                                                            class="form-control" id="date"
                                                            placeholder="اكتب تاريخ دفع المصروف " />
                                                        @error('date')
                                                        <span>{{ $message }}</span>
                                                        @enderror
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
                    {{-- End Model With Eit Car --}}
                    @endforeach
            </tbody>
        </table>
    </div>
</div>




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
                            <h5 class="card-header">اضافة الضرائب </h5>
                            <div class="card-body">
                                <form class="browser-default-validation" action="{{ route('addTaxes') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf



                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country">اختر سيارة </label>
                                        <select class="form-select" id="basic-default-country" name="car_id">
                                            <option value="">اختار السيارة </option>
                                            @foreach ($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->cars_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('car_id')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="total_tex"> المبلغ </label>
                                        <input type="number" name="total_tex" class="form-control" id="total_tex"
                                            placeholder=" الأيراد " />
                                        @error('total_tex')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="date">تاريخ الدفع</label>
                                        <input type="date" name="date" class="form-control" id="date"
                                            placeholder="اكتب تاريخ دفع المصروف " />
                                        @error('date')
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
    @section('script')
    <script>
        $(document).ready(() => {

                $("#textbox_taxes").on('keyup', function() {
                    var f = $(this).val();
                    $("#my_table_taxes tr").each(function() {
                        if ($(this).text().search(new RegExp(f, "i")) < 0) {
                            $(this).fadeOut();
                        } else {
                            $(this).show();
                        }
                    });
                });
            })
    </script>
    @endsection

    @endsection