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
@section('script-header')

<script src="../../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/config.js"></script>


@endsection
@section('content')
@include('success')


<!-- Bootstrap Table with Header - Dark -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
    اضافة صيانة
</button>


{{--
<div class="col-12">
    <div class="card">
        <h5 class="card-header">Form Repeater</h5>
        <div class="card-body">
            <form class="form-repeater" action="{{ route('addMaintenance') }}" method="POST"
                enctype="multipart/form-data">
                <div data-repeater-list="group_a">
                    <div data-repeater-item>

                        <div class="col-md-12" style="display: flex;flex-wrap: wrap;align-items: center">
                            <div class="mb-3 col-md-3 mb-0">
                                <label class="form-label" for="form-repeater-1-1">تفاصيل
                                    الصيانة </label>
                                <input type="text" name="description" id="form-repeater-1-1" class="form-control"
                                    placeholder="اكتب تفاصيل الصيانة" />
                            </div>
                            <div class="mb-3 col-md-3 mb-0">
                                <label class="form-label" for="form-repeater-1-2">سعر
                                    الصيانة</label>
                                <input type="number" name="maintenances_price" id="form-repeater-1-2"
                                    class="form-control" placeholder="سعر الصيانة" />
                            </div>
                            <div class="mb-3 col-md-3 mb-0">
                                <label class="form-label" for="form-repeater-1-3">السيارة</label>
                                <select id="form-repeater-1-3" name="car_id" class="form-select">
                                    <option value="">اختر سيارة</option>
                                    @foreach($cars as $car)

                                    <option value="{{ $car->id }}">{{
                                        $car->cars_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-3 mb-0">
                                <label class="form-label" for="form-repeater-1-4">قطعة
                                    الغيار</label>
                                <select id="form-repeater-1-4" name="car_part_id" class="form-select">
                                    <option value="">اختر قطعة الغيار</option>
                                    @foreach($CarParts as $CarPart)
                                    <option value="{{ $CarPart->id }}">{{
                                        $CarPart->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 col-xl-2 col-md-12 d-flex align-items-center mb-0"
                                style="width: 100%">
                                <button class="btn btn-label-danger" id="add" style="width: 100%" data-repeater-delete>
                                    <i class="bx bx-x me-1"></i>
                                    <span class="align-middle">Delete</span>
                                </button>
                            </div>
                        </div>
                        <hr />
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="mb-0">
                        <div class="btn btn-primary" id="add" data-repeater-create>
                            <i class="bx bx-plus me-1"></i>
                            <span class="align-middle">Add</span>
                        </div>

                    </div>
                    <button class="btn btn-primary mt-4" type="submit">اضافة صيانات
                        جديدة</button>
            </form>

        </div>
    </div>
</div> --}}
<div class="card">
    <h5 class="card-header">جميع الصيانات</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>اسم السيارة</th>
                    <th> تاريخ الصيانة</th>
                    <th>مصاريف الصيانة</th>
                    <th>تفاصيل</th>
                    <th>تعديلات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($maintenances as $maintenance)
                <tr>
                    <td>


                        <strong>

                            {{ $maintenance->car->cars_name}}
                        </strong>
                    </td>

                    <td>

                        <span class="badge bg-label-primary me-1">
                            {{ $maintenance->created_at->format('Y-M-d') }}
                        </span>
                    </td>
                    <td>

                        <strong>

                            {{ $maintenance->maintenances_price}}
                        </strong>
                    </td>
                    {{-- <td>

                        <strong>

                            {{ $maintenance->description}}
                        </strong>
                    </td> --}}

                    <td>
                        <a href="{{ route('maintanenceInfo',['id'=>$maintenance->id]) }}" class="btn btn-primary">
                            تفاصيل الصيانة
                        </a>
                    </td>





                    <td>


                        <a class="dropdown-item" data-bs-target="#basicModal{{ $maintenance->id}}"
                            data-bs-toggle="modal" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                        <a class="dropdown-item" href="{{ route('deleteMaintenance',['id'=>$maintenance->id]) }}"><i
                                class="bx bx-trash me-1"></i>Delete</a>
                    </td>
                </tr>
                {{-- Start Model With Eit Car --}}
                <div class="modal fade" id="basicModal{{ $maintenance->id}}" tabindex="-1" aria-hidden="true">




                    <div class="modal-dialog" role="document">


                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1"> تعديل مورد</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <h5 class="card-header"> تعديل المورد :{{ $maintenance->name }}</h5>
                                <div class="card-body">
                                    <form class="browser-default-validation" action="{{ route('EditMaintenance') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="maintenance_id" value="{{ $maintenance->id }}">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">الاسم </label>
                                            <input type="text" value="{{ $maintenance->name}}" name="name" id="name"
                                                class="form-control" placeholder="اكتب اسم  المورد" />
                                            @error('name')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <label class="form-label" for="phone">رقم الموبيل </label>
                                            <div class="input-group input-group-merge">
                                                <input type="number" value="{{ $maintenance->phone}}"
                                                    id="basic-default-name" name="phone" class="form-control"
                                                    placeholder="اكتب  رقم المورد" aria-describedby="phone" />


                                            </div>
                                            @error('phone')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-dob">العنوان </label>
                                            <input type="text" value="{{ $maintenance->address}}" name="address"
                                                placeholder="اكتب عنوان المورد"
                                                class="form-control flatpickr-validation" id="basic-default-dob" />
                                            @error('address')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>


                                        {{-- Select The Main or Sup CAtegory --}}

                                        {{-- ???????????????????????? --}}

                                        {{-- Select The Main or Sup CAtegory --}}



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
{{-- Start Modal Add New maintenance --}}
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">




    <div class="modal-dialog" role="document">


        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">اضافة صيانات جديدة</h5>
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

                                <div class="col-12">

                                    <div class="card">
                                        <h5 class="card-header">Form Repeater</h5>
                                        <div class="card-body">
                                            <form class="form-repeater" action="{{ route('addMaintenance') }}"
                                                method="POST" enctype="multipart/form-data">

                                                <div data-repeater-item>

                                                    <div class="col-md-12"
                                                        style="display: flex;flex-wrap: wrap;align-items: center">
                                                        <div class="mb-3 col-md-12 mb-0">

                                                            <label class="form-label" for="form-repeater-1-1">تفاصيل
                                                                الصيانة </label>
                                                            <textarea id="" cols="30" rows="10" type="text"
                                                                name="description" id="form-repeater-1-1"
                                                                class="form-control" placeholder="اكتب تفاصيل الصيانة">
                                                            </textarea>
                                                        </div>
                                                        <div class="mb-3 col-md-12 mb-0">
                                                            <label class="form-label" for="form-repeater-1-2">سعر
                                                                الصيانة</label>
                                                            <input type="number" name="maintenances_price"
                                                                id="form-repeater-1-2" class="form-control"
                                                                placeholder="سعر الصيانة" />
                                                        </div>
                                                        {{-- الفئة --}}
                                                        <div class="col-md-12">
                                                            <label class="form-label" for="category">اختيار فئة
                                                                السيارة</label>
                                                            <select class="form-select" id="category"
                                                                name="category_id">
                                                                <option value="">اختيار فئة السيارة</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{
                                                                    $category->category }}</option>

                                                                @endforeach

                                                            </select>
                                                            @error('category_id')
                                                            <span class="error">{{ $message }}</span class="error">
                                                            @enderror
                                                        </div>
                                                        {{-- الفئة --}}
                                                        {{-- السيار --}}
                                                        <div class="col-md-12">

                                                            <label class="form-label" for="basic-default-country">اختيار
                                                                السيارة</label>
                                                            <select class="form-select name-car"
                                                                id="basic-default-car car" name="car_id">
                                                                <option value="">اختيار السيارة</option>


                                                            </select>
                                                            @error('car_id')
                                                            <span class="error">{{ $message }}</span class="error">
                                                            @enderror
                                                        </div>
                                                        {{-- السيار --}}
                                                        <div class="mb-3 col-md-12 mb-12">
                                                            <label class="form-label" for="form-repeater-1-4">قطعة
                                                                الغيار</label>
                                                            <select id="form-repeater-1-4" name="car_part_id"
                                                                class="form-select">
                                                                <option value="">اختر قطعة الغيار</option>
                                                                @foreach($CarParts as $CarPart)
                                                                <option value="{{ $CarPart->id }}">{{
                                                                    $CarPart->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12 col-xl-2 col-md-12 d-flex align-items-center mb-0"
                                                            style="width: 100%">

                                                        </div>
                                                    </div>
                                                    <hr />


                                                    <input type="hidden" name="user_id"
                                                        value="{{ auth()->user()->id }}">

                                                    <button class="btn btn-primary mt-4" type="submit">اضافة صيانات
                                                        جديدة</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /End body Model With Inputs -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Add New maintenance --}}





    @endsection

    @section('script')
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
    <script src="../assets/vendor/libs/autosize/autosize.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js"></script>
    <script src="../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

    <!-- Main JS -->

    <!-- Page JS -->
    <script src="../../assets/js/forms-extras.js"></script>
    @section('script')
    <script>
        $(document).ready(function(){
           $('#category').change(function(){
                category = $('#category').val();
                car = $('#car').val();
                console.log(category);
            $.ajax({
            type: 'GET',
            url: '{{ route('filterCar') }}',
            dataType: "json",
            data: {
            'category_id': category,
         
            },
            success: function(response) {
            console.log(response);
                    car = response.car_data;
                    
                    var carDataDf = "<option value=''>اختيار السيارة</option>";
                    $(".name-car option").hide();
                    $(".name-car").val("اختيار السيارة");
                    $(car).each((value, ele) => {
                        var carData = `<option value="${ele.id}">${ele.cars_name}</option>`;
                        
                        $(".name-car").append(carData);
                    });
            
          
            },
            error: function(xhr) {
            console.log("noooo");
            }
            
        });
                
                
            });
        });
    </script>
    @endsection
    @endsection