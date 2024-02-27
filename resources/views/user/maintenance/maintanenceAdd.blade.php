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
<form class="form-repeater" action="{{ route('addMaintenance') }}" method="POST" enctype="multipart/form-data">

    <div data-repeater-item>

        <div class="col-md-12" style="display: flex;flex-wrap: wrap;align-items: center">
            <div class="mb-3 col-md-12 mb-0">

                <label class="form-label" for="form-repeater-1-1">تفاصيل
                    الصيانة </label>
                <textarea id="" cols="30" rows="10" type="text" name="description" id="form-repeater-1-1"
                    class="form-control" placeholder="اكتب تفاصيل الصيانة">
                                                            </textarea>
            </div>
            <div class="mb-3 col-md-12 mb-0">
                <label class="form-label" for="form-repeater-1-2">سعر
                    الصيانة</label>
                <input type="number" name="maintenances_price" id="form-repeater-1-2" class="form-control"
                    placeholder="سعر الصيانة" />
            </div>
            {{-- الفئة --}}
            <div class="col-md-12">
                <label class="form-label" for="category">اختيار فئة السيارة</label>
                <select class="form-select" id="category" name="category_id">
                    <option value="">اختيار فئة السيارة</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>

                    @endforeach

                </select>
                @error('category_id')
                <span class="error">{{ $message }}</span class="error">
                @enderror
            </div>
            {{-- الفئة --}}
            {{-- السيار --}}
            <div class="col-md-12">

                <label class="form-label" for="basic-default-country">اختيار السيارة</label>
                <select class="form-select name-car" id="basic-default-car car" name="car_id">
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
                <select id="form-repeater-1-4" name="car_part_id" class="form-select">
                    <option value="">اختر قطعة الغيار</option>
                    @foreach($CarParts as $CarPart)
                    <option value="{{ $CarPart->id }}">{{
                        $CarPart->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 col-xl-2 col-md-12 d-flex align-items-center mb-0" style="width: 100%">

            </div>
        </div>
        <hr />


        <input type="hidden" name="user_id">

        <button class="btn btn-primary mt-4" type="submit">اضافة صيانات
            جديدة</button>
</form>




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