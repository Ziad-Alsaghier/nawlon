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


<div class="card">
    <h5 class="card-header">جميع السيارات</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>صور السيارة </th>
                    <th>اسم السيارة</th>
                    <th>فئة السيارة</th>
                    <th>نوع السيارة</th>
                    <th>موديل السيارة</th>
                    <th>رقم السيارة</th>
                    <th>حالة السيارة</th>
                    <th>التفاصيل</th>
                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($cars as $car)
                <tr>
                    <td>
                        <img src="../public/images/cars/{{ $car->image }}" width="200px" alt="">
                        <br>
                        {{-- {{$car->image}} --}}
                    </td>
                    <td>


                        <strong>
                            {{ $car->cars_name }}

                        </strong>
                    </td>

                    <td>
                        <span class="badge bg-label-primary me-1">{{ $car->category->category }}</span>
                    </td>
                    <td>
                        <strong>
                            {{ $car->car_type }}

                        </strong>
                    </td>
                    <td>
                        {{ $car->brand }}
                    </td>
                    <td>
                        {{ $car->car_number }}

                    </td>



                    <td>

                        @if($car->deleted_at)
                        <a class="btn btn-danger text-black" data-bs-toggle="modal" href=""
                            data-bs-target="#modalTop{{ $car->id }}">
                            <strong>
                                السيارة خارج الخدمة
                            </strong>
                        </a>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info text-black" href="{{ route('carInfo', ['id' => $car->id]) }}">
                            <strong>
                                التفاصيل
                            </strong>
                        </a>

                    </td>

                    <td>
                        <div style="display: flex;align-items: center;justify-content: space-between;">
                            <i class="fa-solid fa-ellipsis-vertical btnCus" style="cursor: pointer"
                                id="btn{{ $car->id }}"></i>

                            <div class="d-none menu-cus"
                                style="position: absolute;left: -1%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;margin-top: 45px;">

                                <a style="font-weight: 600;" class="dropdown-item"
                                    href="{{ route('restoreCar', ['id' => $car->id]) }}"><i
                                        class="bx bx-trash me-1"></i>Restore</a>

                                <a style="font-weight: 600;" class="dropdown-item"
                                    href="{{ route('softDelete', ['id' => $car->id]) }}"><i
                                        class="bx bx-trash me-1"></i>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>







                @endforeach
            </tbody>
        </table>
    </div>
</div>





@section('script')
<script>
    $(document).ready(() => {
                $(".btnCus").each((ele, val) => {
                    var poi_id = `#${$(val).attr("id")}`
                    $(poi_id).mouseenter(() => {
                        $(".menu-cus").addClass("d-none");
                        $(poi_id).next().toggleClass("d-none");

                    });
                    $(".menu-cus").mouseleave(() => {
                        $(".menu-cus").addClass("d-none");
                    });


                });
            });

     

</script>

@endsection
@endsection