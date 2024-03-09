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
<div class="mb-3">
    <label class="form-label" for="basic-default-car"> فلتر السيارات</label>
    <select class="form-select sel-CarState" id="basic-default-car" name="">
        <option value="">اختار حالة السيارة</option>
        <option value="1">السيارات المتاحة</option>
        <option value="2">السيارات في الطريق</option>
        <option value="0">السياراتمعطلة</option>

    </select>
</div>
<div id="contain">
    <button class="btn btn-primary mb-2" data-bs-target="#basicModal" data-bs-toggle="modal"
        href="javascript:void(0);"><i class="bx bx-plus me-1"></i>
        اضافة سيارة</button>
</div>
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
            <tbody class="table-border-bottom-0" id="myTable">
                @foreach ($cars as $car)
                <tr class="car_row">

                    <td>
                        <img src="../public/images/cars/{{ $car->image }}" width="90%" alt="">
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

                        @if ($car->status == 0)
                        <a class="btn btn-danger text-black" style="margin-top: 20px;width: 100%;"
                            data-bs-toggle="modal" data-bs-target="#modalTop{{ $car->id }}">
                            <strong>
                                السيارة معطلة
                            </strong>
                        </a>
                        {{-- Modale Update Status --}}
                        <div class="col-lg-4 col-md-6">

                            <div class="mt-3">
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal modal-top fade" id="modalTop{{ $car->id }}" tabindex="-1">

                                    <div class="modal-dialog">
                                        <form class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من
                                                    تغيير
                                                    حالة
                                                    السيارة </h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <input type="hidden" name="status" value="0">
                                                <a href="{{ route('updateStatus', ['id' => $car->id, 'status' => '1']) }}"
                                                    class="btn btn-primary">Save</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modale Update Status --}}
                        @elseif($car->status == 1)
                        <a class="btn btn-success" style="margin-top: 20px;width: 100%;" data-bs-toggle="modal"
                            data-bs-target="#modalTop{{ $car->id }}" href="">
                            <strong>
                                السيارة متوفرة
                            </strong>
                        </a>

                        {{-- Modale Update Status --}}
                        <div class="col-lg-4 col-md-6">

                            <div class="mt-3">
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal modal-top fade" id="modalTop{{ $car->id }}" tabindex="-1">

                                    <div class="modal-dialog">
                                        <form class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من
                                                    تغيير حالة
                                                    السيارة </h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <input type="hidden" name="status" value="0">
                                                <a href="{{ route('updateStatus', ['id' => $car->id, 'status' => '0']) }}"
                                                    class="btn btn-primary">Save</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modale Update Status --}}
                        @elseif($car->status == 2)
                        <a class="btn btn-warning text-black" style="margin-top: 20px;" data-bs-toggle="modal"
                            data-bs-target="#modalTop{{ $car->id }}">
                            <strong>
                                السيارة في الطريق
                            </strong>


                        </a>
                        {{-- Modale Update Status --}}
                        <div class="col-lg-4 col-md-6">

                            <div class="mt-3">
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal modal-top fade" id="modalTop{{ $car->id }}" tabindex="-1">

                                    <div class="modal-dialog">
                                        <form class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من
                                                    تغيير
                                                    حالة
                                                    السيارة </h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <input type="hidden" name="status" value="0">
                                                <a href="{{ route('updateStatus', ['id' => $car->id, 'status' => '1']) }}"
                                                    class="btn btn-primary">Save</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modale Update Status --}}
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
                                    data-bs-target="#basicModal{{ $car->id }}" data-bs-toggle="modal"
                                    href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a style="font-weight: 600;" class="dropdown-item"
                                    href="{{ route('deleteCar', ['id' => $car->id]) }}"><i
                                        class="bx bx-trash me-1"></i>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                {{-- Start Model With Eit Car --}}
                <div class="modal fade" id="basicModal{{ $car->id }}" tabindex="-1" aria-hidden="true">




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
                                            <h5 class="card-header">التعديل في السيارة : {{ $car->cars_name }}
                                            </h5>
                                            <div class="card-body">
                                                <form class="needs-validation" action="{{ route('updateCar') }}"
                                                    method="POST" enctype="multipart/form-data" novalidate="">
                                                    @csrf
                                                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                                                    <input type="hidden" name="category_id"
                                                        value="{{ $car->category->id }}">
                                                    <div class="mb-3 " id="inputMonthly">
                                                        <label class="form-label" for="bs-validation-email">اسم
                                                            السيارة</label>
                                                        <input type="text" value="{{ $car->cars_name }}"
                                                            id="bs-validation-email" class="form-control"
                                                            name="cars_name" placeholder="تعديل اسم السيارة">
                                                        <div class="valid-feedback">Looks good!</div>

                                                        <div class="mb-3 " id="inputMonthly">
                                                            <label class="form-label" for="bs-validation-email">
                                                                فئة
                                                                السيارة</label>
                                                            <input type="text" value="{{ $car->category->category }}"
                                                                id="bs-validation-email" class="form-control"
                                                                name="category" placeholder="تعديل فئة السيارة">
                                                            <div class="valid-feedback">Looks good!</div>

                                                        </div>
                                                        <div class="mb-3 " id="inputMonthly">
                                                            <label class="form-label" for="bs-validation-email">نوع
                                                                السيارة</label>
                                                            <input type="text" value="{{ $car->car_type }}"
                                                                id="bs-validation-email" class="form-control"
                                                                name="car_type" placeholder="تعديل  نوع السيارة">

                                                        </div>
                                                        <div class="mb-3 " id="inputMonthly">
                                                            <label class="form-label" for="bs-validation-email">
                                                                موديل السيارة
                                                            </label>
                                                            <input type="text" value="{{ $car->brand }}"
                                                                id="bs-validation-email" class="form-control"
                                                                name="brand" placeholder="تعديل  موديل السيارة">

                                                        </div>
                                                        <div class="mb-3 " id="inputMonthly">
                                                            <label class="form-label" for="bs-validation-email">
                                                                موديل السيارة
                                                            </label>
                                                            <input type="text" value="{{ $car->car_number }}"
                                                                id="bs-validation-email" class="form-control"
                                                                name="car_number" placeholder="تعديل رقم السيارة">

                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label" for="basic-default-upload-file">
                                                                تعديل صورة السيارة
                                                            </label>
                                                            <input type="file" name="image" value="{{ $car->image }}"
                                                                class="form-control" id="basic-default-upload-file">
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-12 mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary">تعديل</button>
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
                            <h5 class="card-header">اضافة السيارة </h5>
                            <div class="card-body">
                                <form class="browser-default-validation" action="{{ route('processAddCar') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="cars_name">اسم السيارة</label>
                                        <input type="text" name="cars_name" class="form-control" id="cars_name"
                                            placeholder="اكتب اسم العربية " />
                                        @error('car_name')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="car_type">نوع السيارة</label>
                                        <input type="text" name="car_type" id="car_type" class="form-control"
                                            placeholder="اكتب نوع السيارة" />
                                        @error('car_type')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="brand">ماركة السيارة</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-name" name="brand" class="form-control"
                                                placeholder="اكتب ماركة العربية" aria-describedby="brand" />
                                            <span class="input-group-text cursor-pointer" id="basic-default-name">
                                            </span>

                                        </div>
                                        @error('brand')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country">فئة العربية</label>
                                        <select class="form-select" id="basic-default-country" name="category_id">
                                            <option value="">اختار فئة العربية</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}
                                            </option>
                                            @endforeach

                                        </select>
                                        @error('category')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-dob">رقم السيارة </label>
                                        <input type="number" name="car_number" class="form-control flatpickr-validation"
                                            id="basic-default-dob" />
                                        @error('car_number')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-upload-file">اضافة صورة
                                            للسيار</label>
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

            // Start Filter With Car By Status 

            $(document).ready(function() {
                $(".sel-CarState").change(() => {
                    console.log("object");
                    var Car_State = $(".sel-CarState").val();
                    console.log(Car_State);
                    if (Car_State == "") {
                        $(".carr_row").addClass("d-none");
                        $(".car_row").removeClass("d-none");
                    } else {
                        $(".carr_row").empty();
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('filterCar') }}',
                            data: {
                                'car_state': Car_State,
                                'user_id': {{ auth()->user()->id }},
                            },
                            success: function(response) {
                                var car_Data = response.car_data;
                                $(car_Data).each((index, object) => {
                                    console.log("index", index)
                                    console.log("object", object)

                                    var states;

                                    if (response.car_data[index].status == 0) {
                                        states = ` <a class="btn btn-danger text-black" style="margin-top: 20px;width: 100%;" data-bs-toggle="modal" data-bs-target='#modalTopp${response.car_data[index].id}' >
                                            <strong>
                                                السيارة معطلة
                                            </strong>
                                        </a>
                                            {{-- Modale Update Status --}}
                                            <div class="col-lg-4 col-md-6">

                                                <div class="mt-3">
                                                    <!-- Button trigger modal -->
                                                    <!-- Modal -->
                                        <div class="modal modal-top fade" id='modalTopp${response.car_data[index].id}' tabindex="-1">

                                            <div class="modal-dialog">
                                                <form class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من تغيير حالة
                                                            السيارة </h2>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <input type="hidden" name="status" value="0">
                                                        <a href='updateStatus/${response.car_data[index].id}?status=1'
                                                            class="btn btn-primary">Save</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                    } else if (response.car_data[index].status == 1) {
                                        states = ` <a class="btn btn-success" style="margin-top: 20px;width: 100%;" data-bs-toggle="modal" data-bs-target='#modalTopVil${response.car_data[index].id}' href="">
                                            <strong>
                                                السيارة متوفرة
                                            </strong>
                                        </a>
                                {{-- Modale Update Status --}}
                                <div class="col-lg-4 col-md-6">

                                    <div class="mt-3">
                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal modal-top fade" id='modalTopVil${response.car_data[index].id}' tabindex="-1">

                                            <div class="modal-dialog">
                                                <form class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من تغيير حالة
                                                            السيارة </h2>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <input type="hidden" name="status" value="0">
                                                        <a href="updateStatus/${response.car_data[index].id}?status=0"
                                                            class="btn btn-primary">Save</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                    } else if (response.car_data[index].status == 2) {
                                        states = ` <a class="btn btn-warning text-black" style="margin-top: 20px;" data-bs-toggle="modal" data-bs-target='#modalTopWay${response.car_data[index].id}'>
                                            <strong>
                                                السيارة في الطريق
                                            </strong>
                                        </a>
                                {{-- Modale Update Status --}}
                                <div class="col-lg-4 col-md-6">

                                    <div class="mt-3">
                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal modal-top fade" id='modalTopWay${response.car_data[index].id}' tabindex="-1">
                                            <div class="modal-dialog">
                                                <form class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modalTopTitle">هل انت متأكد من تغيير
                                                            حالة
                                                            السيارة </h2>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <input type="hidden" name="status" value="0">
                                                        <a href='updateStatus/${response.car_data[index].id}?status=1'
                                                            class="btn btn-primary">Save</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                    }
                                    var car_list = `<tr class="carr_row row_car_fil${response.car_data[index].status}">
                        
                                            <td>
                                                <img src= '../public/images/cars/${response.car_data[index].image}' width="90%" alt="">
                                                <br>
                                            </td>
                                            <td>
                                                <strong>
                                                    ${response.car_data[index].cars_name}
                                                </strong>
                                            </td>
                                        
                                            <td>
                                                <span class="badge bg-label-primary me-1">GRAR</span>
                                            </td>
                                            <td>
                                                <strong>
                                                    ${response.car_data[index].car_type}
                                        
                                                </strong>
                                            </td>
                                            <td>
                                                ${response.car_data[index].brand}
                                            </td>
                                            <td>
                                                ${response.car_data[index].car_number}
                                            </td>
                                            <td>
                                                ${states}
                                            </td>
                                            <td>
                                                <a class="btn btn-info text-black" href='carInfo/${response.car_data[index].id}'>
                                                    <strong>
                                                        التفاصيل
                                                    </strong>
                                                </a>
                                        
                                            </td>
                                        
                                            <td>
                                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                                    <i class="fa-solid fa-ellipsis-vertical btnCus btnCusFil" style="cursor: pointer" id='btnn${response.car_data[index].id}'></i>
                                        
                                                    <div class="d-none menu-cus menu-cusFil"
                                                        style="position: absolute;left: -1%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;margin-top: 45px;">
                                                        <a style="font-weight: 600;" class="dropdown-item" data-bs-target='#basicModal${response.car_data[index].id}'
                                                            data-bs-toggle="modal" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                                            Edit</a>
                                                        <a style="font-weight: 600;" class="dropdown-item"
                                                            href='${response.car_data[index].id}'><i class="bx bx-trash me-1"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                               </tr>`;

                                    /* hide defilt row cars   */
                                    $(".car_row").addClass("d-none");

                                    /* show only what i chose filter row cars   */
                                    $(`.row_car_fil${response.car_data[index].status}`)
                                        .show();
                                    /* append filte car to table */
                                    $("#myTable").append(car_list);

                                    /* Set Function to show datails side   */
                                    $(".btnCusFil").each((ele, val) => {

                                        var poi_id_Fil = `#${$(val).attr("id")}`

                                        $(poi_id_Fil).mouseenter(() => {

                                            $(".menu-cusFil").addClass(
                                                "d-none");
                                            $(poi_id_Fil).next()
                                                .toggleClass("d-none");
                                        });
                                        $(".menu-cusFil").mouseleave(() => {
                                            $(".menu-cusFil").addClass(
                                                "d-none");
                                        });
                                    });
                                })
                            },
                            error: function(xhr) {
                                console.log('Error');
                            },
                        })
                    }
                })
            });


            //  End Filter With Car By Status 
    </script>

    @endsection

    @endsection