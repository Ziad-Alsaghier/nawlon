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
        اضافة ناولون</button>
</div>
<div class="card">
    <h5 class="card-header">جميع النوالون</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th> ID</th>
                    <th> السياره</th>
                    <th> السائق</th>
                    <th>مكان التحميل</th>
                    <th> مكان التعتيق</th>
                    <th> سعر النقلة</th>
                    <th>عهده </th>
                    <th>سولار</th>
                    <th>حالة الناولون </th>
                    <th>تفاصيل </th>


                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($nawlones as $nawlone)
                @if($nawlone->car->deleted_at == null)

                @endif
                <tr>
                    <td>


                        <strong>

                            {{ $loop->iteration }}

                        </strong>
                    </td>

                    <td>

                        <span class="badge bg-label-primary me-1">

                            {{ $nawlone->car->cars_name }}
                        </span>
                    </td>
                    <td>

                        <span class="badge bg-label-primary me-1">

                            {{ $nawlone->driver->driv_name }}
                        </span>
                    </td>
                    <td>

                        <strong>

                            {{ $nawlone->down_location->name }}
                        </strong>
                    </td>
                    <td>

                        <strong>

                            {{ $nawlone->tatek_location }}
                        </strong>
                    </td>

                    <td>

                        {{ $nawlone->nawlone_price }}
                    </td>



                    <td>

                        {{ $nawlone->custody }}
                    </td>
                    <td>

                        {{ $nawlone->solar }}
                    </td>
                    <td>

                        @if ($nawlone->status == '0')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalCenter{{ $nawlone->id }}">
                            السائق في الطريق
                        </button>
                        @else
                        <button type="button" class="btn btn-success">
                            تم الوصول
                        </button>
                        @endif
                    </td>
                    <td>
                        <a type="button" class="btn btn-info" href="{{ route('nawlonInfo',['id'=>$nawlone->id ]) }}">
                            تفاصيل
                        </a>
                    </td>

                    {{-- <td>

                        <a class="dropdown-item" data-bs-target="#basicModal{{ $nawlone->id}}" data-bs-toggle="modal"
                            href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                        <a class="dropdown-item" href="{{ route('deletenawlone',['id'=>$nawlone->id]) }}"><i
                                class="bx bx-trash me-1"></i>Delete</a>
                    </td> --}}
                    <td>
                        <div style="display: flex;align-items: center;justify-content: space-between;">
                            <i class="fa-solid fa-ellipsis-vertical btnCus" style="cursor: pointer"
                                id="btn{{ $nawlone->id }}"></i>

                            <div class="d-none menu-cus"
                                style="position: absolute;left: -2%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;margin-top: 48bpx;">
                                <a style="font-weight: 600;" class="dropdown-item"
                                    data-bs-target="#basicModal{{ $nawlone->id }}" data-bs-toggle="modal"
                                    href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a style="font-weight: 600;" class="dropdown-item"
                                    href="{{ route('deletenawlone', ['id' => $nawlone->id]) }}"><i
                                        class="bx bx-trash me-1"></i>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>


                {{-- حالة الناولون --}}
                <div class="modal fade" id="modalCenter{{ $nawlone->id }}" tabindex="-1" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">ما تبقي من السواق</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <form action="{{ route('editStatus') }} " method="POST" enctype="multipart/form-data">
                                    @csrf
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <input type="hidden" value="{{ $nawlone->id }}" name="nawlone_id">
                                        <input type="hidden" value="1" name="status">
                                        <input type="hidden" value="{{ $nawlone->car->id }}" name="car_id">
                                        <label for="nameWithTitle" class="form-label">عهدة</label>
                                        <input type="number" value="{{ $nawlone->custody }}" id="nameWithTitle"
                                            class="form-control" value="" name="custody">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">سولار</label>
                                        <input type="number" value="{{ $nawlone->solar }}" id="emailWithTitle"
                                            class="form-control" value='' name="solar">
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="sumit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- حالة الناولون --}}
                {{-- Start Model With Eit Car --}}
                <div class="modal fade" id="basicModal{{ $nawlone->id }}" tabindex="-1" aria-hidden="true">




                    <div class="modal-dialog" role="document">


                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <h5 class="card-header"> تعديل النولن : {{ $nawlone->car->cars_name }}</h5>
                                    <div class="card-body">
                                        <form class="browser-default-validation" action="{{ route('editnawlone') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="nawlone_id" value="{{ $nawlone->id }}">
                                            {{-- اختيار السيارة --}}
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-country">فئة
                                                    العربية</label>
                                                <select class="form-select" id="basic-default-country" name="car_id">
                                                    <option value="{{ $nawlone->car_id }}">اختار فئة العربية
                                                    </option>
                                                    @foreach ($cars as $car)
                                                    <option value="{{ $car->id }}">{{ $car->cars_name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                                @error('category')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- اختيار السيارة --}}
                                            {{-- اختيار مكان التحميل --}}
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-country">اختيار مكان
                                                    التحميل</label>
                                                <select class="form-select" id="basic-default-country"
                                                    name="down_location_id">
                                                    <option value="{{ $nawlone->down_location_id }}">اختيار مكان
                                                        التحميل
                                                    </option>
                                                    @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- اختيار مكان التحميل --}}


                                            <div class="mb-3">
                                                <label class="form-label" for="tatek_location">مكان
                                                    التعتيق</label>
                                                <input type="text" value="{{ $nawlone->tatek_location }}"
                                                    name="tatek_location" id="tatek_location" class="form-control"
                                                    placeholder="اكتب مكان التعتيق" />
                                                @error('tatek_location')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 form-password-toggle">
                                                <label class="form-label" for="nawlone_price">سعر النقله</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="number" value="{{ $nawlone->nawlone_price }}"
                                                        id="basic-default-name" name="nawlone_price"
                                                        class="form-control" placeholder="اكتب ماركة العربية"
                                                        aria-describedby="nawlone_price" />
                                                    <span class="input-group-text cursor-pointer"
                                                        id="basic-default-name"></span>

                                                </div>
                                                @error('nawlone_price')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-dob">كمسيون
                                                    سواق</label>
                                                <input type="number" value="{{ $nawlone->comsion_driver }}"
                                                    name="comsion_driver" class="form-control flatpickr-validation"
                                                    id="basic-default-dob" />
                                                @error('comsion_driver')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-dob">عهده</label>
                                                <input type="number" value="{{ $nawlone->custody }}" name="custody"
                                                    class="form-control flatpickr-validation" id="basic-default-dob" />
                                                @error('custody')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-dob">السولار</label>
                                                <input type="number" value="{{ $nawlone->solar }}" name="solar"
                                                    class="form-control flatpickr-validation" id="basic-default-dob" />
                                                @error('solar')
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
                            <h5 class="card-header">اضافة ناولون </h5>
                            <div class="card-body">
                                <form class="browser-default-validation" action="{{ route('addNawlone') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- اختيار الساائق --}}
                                    <div class="mb-3">

                                        <label class="form-label" for="basic-default-country"> اختيار الساائق </label>
                                        <select class="form-select" id="basic-default-country" name="driver_id">
                                            <option value="">اختار الساائق</option>
                                            @foreach($driveres as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->driv_name }}</option>

                                            @endforeach

                                        </select>
                                        @error('driver_id')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- اختيار الساائق --}}

                                    {{-- اختيار فئة السيارة --}}
                                    <div class="mb-3">

                                        <label class="form-label" for="basic-default-country"> فئة السيارة </label>
                                        <select class="form-select" id="basic-default-country" name="car_id">
                                            <option value="">اختار فئة السيارة</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>

                                            @endforeach

                                        </select>
                                        @error('category')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- اختيار فئة السيارة --}}
                                    {{-- اختيار السيارة --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country"> السيارة</label>
                                        <select class="form-select" id="basic-default-country" name="car_id">
                                            <option value="">اختار السيارة</option>
                                            @foreach($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->cars_name }}</option>

                                            @endforeach

                                        </select>
                                        @error('category')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- اختيار السيارة --}}
                                    {{-- اختيار مكان التحميل --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-country">اختيار مكان
                                            التحميل</label>
                                        <select class="form-select" id="basic-default-country" name="down_location_id">
                                            <option value="">اختيار مكان التحميل</option>
                                            @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>

                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- اختيار مكان التحميل --}}


                                    <div class="mb-3">
                                        <label class="form-label" for="tatek_location">مكان التعتيق</label>
                                        <input type="text" name="tatek_location" id="tatek_location"
                                            class="form-control" placeholder="اكتب مكان التعتيق" />
                                        @error('tatek_location')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="nawlone_price">سعر النقله</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="basic-default-name" name="nawlone_price"
                                                class="form-control" placeholder="اكتب سعر النقلة"
                                                aria-describedby="nawlone_price" />
                                            <span class="input-group-text cursor-pointer" id="basic-default-name"><i
                                                    class="bx bx-hide"></i></span>

                                        </div>
                                        @error('nawlone_price')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-dob">كمسيون سواق</label>
                                        <input type="number" name="comsion_driver"
                                            class="form-control flatpickr-validation" id="basic-default-dob" />
                                        @error('comsion_driver')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-dob">عهده</label>
                                        <input type="number" name="custody" class="form-control flatpickr-validation"
                                            id="basic-default-dob" />
                                        @error('custody')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-dob">السوالر</label>
                                        <input type="number" name="solar" class="form-control flatpickr-validation"
                                            id="basic-default-dob" />
                                        @error('solar')
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