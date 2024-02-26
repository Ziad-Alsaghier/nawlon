@extends('layouts/layoutMaster')
@php
$user = 'Minue';
@endphp


@section('title', 'الرخص')

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

<!--/ Bootstrap Table with Header Dark -->

































<div class="demo-inline-spacing mt-3">
    <div class="list-group list-group-horizontal-md text-md-center" role="tablist">
        <a class="list-group-item list-group-item-action" id="home-list-item" data-bs-toggle="list"
            href="#horizontal-home" aria-selected="false" role="tab" tabindex="-1">مخالفات السيارات</a>


        <a class="list-group-item list-group-item-action active" id="profile-list-item" data-bs-toggle="list"
            href="#horizontal-profile" aria-selected="true" role="tab">مخالفات السائقين</a>

    </div>
    <div class="tab-content px-0 mt-0">
        <div class="tab-pane fade" id="horizontal-home" role="tabpanel" aria-labelledby="#home-list-item">
            <div class="card">
                <div
                    style="display: flex;justify-content: space-between; align-items: center;column-gap: 10px; padding: 0 10px;">
                    <h5 class="card-header">مخالفات السيارات</h5>
                    <div class=""
                        style="display: flex;direction: ltr;flex-direction: row-reverse;align-items: center;column-gap: 10px;">
                        <input type="search" class="form-control" style="width: 200px !important" placeholder=""
                            aria-controls="DataTables_Table_0" id="textbox_carVaiolation">
                        <label>Search:</label>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>اسم السيارة</th>

                                <th> المخالفة</th>
                                <th> نوع المخالفة</th>
                                <th>تاريخ المخالفة</th>
                                <th>المبلغ المدفوع</th>
                                <th>تعديلات</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="my_table_carVaiolation">

                            @foreach ($carVaiolations as $carVaiolation)
                            <tr>
                                <td>

                                    <strong>
                                        {{ $carVaiolation->car->cars_name }}
                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $carVaiolation->type }}
                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $carVaiolation->violation_number }}
                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $carVaiolation->violation_date }}
                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $carVaiolation->violation_price }}
                                    </strong>
                                </td>


                                <td>

                                <td>
                                    <div style="display: flex;align-items: center;justify-content: space-between;">
                                        <i class="fa-solid fa-ellipsis-vertical btncarVai" style="cursor: pointer"
                                            id="btns{{ $carVaiolation->id }}"></i>

                                        <div class="d-none menu-vai"
                                            style="position: absolute;left: 3%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;">
                                            <a style="font-weight: 600;" class="dropdown-item"
                                                data-bs-target="#basicModal{{ $carVaiolation->id }}"
                                                data-bs-toggle="modal" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a style="font-weight: 600;" class="dropdown-item"
                                                href="{{ route('deleteVaiolation', ['id' => $carVaiolation->id, 'type' => 'car']) }}"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- Start Model With Eit License --}}

                            <div class="modal fade" id="basicModal{{ $carVaiolation->id }}" tabindex="-1"
                                aria-hidden="true">




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
                                                        <h5 class="card-header">تعديل في مخالفة السيارة :
                                                            {{ $carVaiolation->car->cars_name }}
                                                        </h5>
                                                        <div class="card-body">
                                                            <form class="browser-default-validation"
                                                                action="{{ route('editViolationCar', ['type_edit' => 'car']) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" value="{{ $carVaiolation->id }} "
                                                                    name="violation_id">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="name">
                                                                        المخالفه</label>
                                                                    <input type="text" name="violations"
                                                                        class="form-control"
                                                                        value="{{ $carVaiolation->violations }}"
                                                                        id="violations" />
                                                                    @error('violations')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                {{-- Checked Car --}}

                                                                <div class="mb-3 mt-3">
                                                                    <label class="form-label" for="type"> نوع
                                                                        المخالفه
                                                                    </label>
                                                                    <input type="text"
                                                                        value="{{ $carVaiolation->type }}" name="type"
                                                                        id="type" class="form-control" />
                                                                    @error('type')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="violation_number">
                                                                        رقم الايصال </label>
                                                                    <input type="text"
                                                                        value="{{ $carVaiolation->violation_number }}"
                                                                        name="violation_number" id="violation_number"
                                                                        class="form-control" />
                                                                    @error('violation_number')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="violation_price">
                                                                        قيمه المخالفه </label>
                                                                    <input type="text" name="violation_price"
                                                                        id="violation_price"
                                                                        value="{{ $carVaiolation->violation_price }}"
                                                                        class="form-control" />
                                                                    @error('violation_price')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3 form-password-toggle">
                                                                    <label class="form-label" for="brand">تاريخ
                                                                        المخالفة</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="date" id="basic-default-number"
                                                                            name="violation_date"
                                                                            value="{{ $carVaiolation->violation_date }}"
                                                                            class="form-control"
                                                                            aria-describedby="violation_date" />
                                                                    </div>
                                                                    @error('violation_date')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">تأكيد</button>
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
                                {{-- End Model With Eit Packages --}}
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- This Vaiolation Driver --}}
        <div class="tab-pane fade active show" id="horizontal-profile" role="tabpanel"
            aria-labelledby="#profile-list-item">
            <div class="card">
                <div
                    style="display: flex;justify-content: space-between; align-items: center;column-gap: 10px; padding: 0 10px;">
                    <h5 class="card-header">مخالفات السائقين</h5>
                    <div class=""
                        style="display: flex;direction: ltr;flex-direction: row-reverse;align-items: center;column-gap: 10px;">
                        <input type="search" class="form-control" style="width: 200px !important" placeholder=""
                            aria-controls="DataTables_Table_0" id="textbox_driverVaiolation">
                        <label>Search:</label>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>اسم السواق</th>
                                <th> المخالفة</th>
                                <th> رقم الايصال </th>
                                <th>تاريخ المخالفة</th>
                                <th>المبلغ المدفوع</th>
                                <th>تعديلات</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="my_table_driverVaiolation">

                            @foreach ($driverVaiolations as $driverVaiolation)
                            <tr>
                                <td>

                                    <strong>
                                        {{ $driverVaiolation->driver->driv_name }}

                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $driverVaiolation->type }}
                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $driverVaiolation->violation_number }}
                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $driverVaiolation->violation_date }}
                                    </strong>
                                </td>
                                <td>

                                    <strong>
                                        {{ $driverVaiolation->violation_price }}
                                    </strong>
                                </td>


                                <td>
                                    <div style="display: flex;align-items: center;justify-content: space-between;">
                                        <i class="fa-solid fa-ellipsis-vertical btnCus" style="cursor: pointer"
                                            id="btn{{ $driverVaiolation->id }}"></i>

                                        <div class="d-none menu-cus"
                                            style="position: absolute;left: 3%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;">
                                            <a style="font-weight: 600;" class="dropdown-item"
                                                data-bs-target="#driver{{ $driverVaiolation->id }}"
                                                data-bs-toggle="modal" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a style="font-weight: 600;" class="dropdown-item"
                                                href="{{ route('deleteVaiolation', ['id' => $driverVaiolation->id, 'type' => 'data']) }}"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- Start Model With Eit License --}}
                            <!-- Modal -->
                            <div class="modal fade" id="driver{{ $driverVaiolation->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">تعديل في مخالفة رقم :
                                                {{ $driverVaiolation->violation_number }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="browser-default-validation"
                                                action="{{ route('editViolationCar') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="violationDrive_id"
                                                    value="{{ $driverVaiolation->id }}">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name"> المخالفه</label>
                                                    <input type="text" value="{{ $driverVaiolation->violations }}"
                                                        name="violations" class="form-control" id="violations"
                                                        placeholder="اكتب اسم العربية " />
                                                    @error('violations')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label class="form-label" for="type"> نوع المخالفه
                                                    </label>
                                                    <input type="text" name="type" value="{{ $driverVaiolation->type }}"
                                                        id="type" class="form-control" placeholder="نوع المخالفه" />
                                                    @error('type')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="violation_number"> رقم الايصال
                                                    </label>
                                                    <input type="text" value="{{ $driverVaiolation->violation_number }}"
                                                        name="violation_number" id="violation_number"
                                                        class="form-control" placeholder="رقم الايصال" />
                                                    @error('violation_number')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="violation_price"> قيمه المخالفه
                                                    </label>
                                                    <input type="text" value="{{ $driverVaiolation->violation_price }}"
                                                        name="violation_price" id="violation_price" class="form-control"
                                                        placeholder="قيمه المخالفه" />
                                                    @error('violation_price')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 form-password-toggle">
                                                    <label class="form-label" for="brand">تاريخ
                                                        المخالفة</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="date"
                                                            value="{{ $driverVaiolation->violation_date }}"
                                                            id="basic-default-number" name="violation_date"
                                                            class="form-control" placeholder="تاريخ المخالفة"
                                                            aria-describedby="violation_date" />
                                                    </div>
                                                    @error('violation_date')
                                                    <span>{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-label-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">تأكيد</button>
                                                </div>
                                            </form>
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
            });
            $(".btncarVai").each((ele, val) => {
                var poi_id = `#${$(val).attr("id")}`
                console.log(poi_id);

                $(poi_id).mouseenter(() => {
                    $(poi_id).next().toggleClass("d-none")
                })

                $(".menu-vai").mouseleave(() => {
                    $(".menu-vai").addClass("d-none");
                })
            });

            /* search about  Driver Vaiolation  */
            $("#textbox_driverVaiolation").on('keyup', function() {
                var f = $(this).val();
                $("#my_table_driverVaiolation tr").each(function() {
                    if ($(this).text().search(new RegExp(f, "i")) < 0) {
                        $(this).fadeOut();
                    } else {
                        $(this).show();
                    }
                });
            });
            /* search about  Car Vaiolation  */
            $("#textbox_carVaiolation").on('keyup', function() {
                var f = $(this).val();
                $("#my_table_carVaiolation tr").each(function() {
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