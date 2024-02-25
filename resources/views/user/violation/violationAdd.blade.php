@extends('layouts/layoutMaster')
@php
$user='Minue';
@endphp


@section('title', 'السائقين')

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
<link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

@section('page-style')
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="../../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />

<!-- Page CSS -->

@endsection
@section('vendor-script')

@endsection
@section('content')
@include('success')


<!-- Bootstrap Table with Header - Dark -->
<!-- Browser Default -->
<div class="col-md mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">اضافة مخالفات </h5>
        <div class="card-body">
            <form class="browser-default-validation" action="{{ route('proccessViolationAdd') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name"> المخالفه</label>
                    <input type="text" name="violations" class="form-control" id="violations"
                        placeholder="اكتب اسم العربية " />
                    @error('violations')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                {{-- Checked Car --}}
                <label class="switch switch-info mt-3 mb-3">
                    <input type="checkbox" name="car" id="violationCar" class="switch-input">
                    <span class="switch-toggle-slider">
                        <span class="switch-on">
                            <i class="bx bx-check"></i>
                        </span>
                        <span class="switch-off">
                            <i class="bx bx-x"></i>
                        </span>
                    </span>
                    <span class="switch-label">اختيار سيارة</span>
                </label>

                {{-- Start Selector --}}
                <div class="mb-3 d-none" id="violationeditCar">
                    <label class="form-label" for="violationCar">
                        السيارة</label>
                    <select class="form-select" id="checkedCar" name="car_id" id="inputCar" id="basic-default-country">
                        @foreach($cars as $car)

                        <option value="{{ $car->id }}">{{ $car->cars_name }}</option>
                        @endforeach


                    </select>
                </div>
                {{-- end Selector --}}
                <label class="switch switch-info mt-3 mb-3">
                    <input type="checkbox" name="driver" id="violationDriver" class="switch-input">
                    <span class="switch-toggle-slider">
                        <span class="switch-on">
                            <i class="bx bx-check"></i>
                        </span>
                        <span class="switch-off">

                            <i class="bx bx-x"></i>
                        </span>
                    </span>
                    <span class="switch-label">اختيار سائق</span>
                </label>
                {{-- Checked driver --}}
                {{-- Start Selector --}}
                <div class="mb-3 d-none" id="checkedDivide">
                    <label class="form-label" for="checkedDivide"> السائق</label>
                    <select class="form-select" name="driver_id" id="basic-default-country" name="category_id">
                        @foreach($drivers as $driver)

                        <option value="{{ $driver->id }}">{{ $driver->driv_name }} </option>
                        @endforeach


                    </select>
                </div>
                {{-- end Selector --}}













                <div class="mb-3 mt-3">
                    <label class="form-label" for="type"> نوع المخالفه </label>
                    <input type="text" name="type" id="type" class="form-control" placeholder="نوع المخالفه" />
                    @error('type')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="violation_number"> رقم الايصال </label>
                    <input type="text" name="violation_number" id="violation_number" class="form-control"
                        placeholder="رقم الايصال" />
                    @error('violation_number')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="violation_price"> قيمه المخالفه </label>
                    <input type="text" name="violation_price" id="violation_price" class="form-control"
                        placeholder="قيمه المخالفه" />
                    @error('violation_price')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="brand">تاريخ المخالفة</label>
                    <div class="input-group input-group-merge">
                        <input type="date" id="basic-default-number" name="violation_date" class="form-control"
                            placeholder="تاريخ المخالفة" aria-describedby="violation_date" />
                    </div>
                    @error('violation_date')
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
<!-- /Browser Default -->
<!--/ Bootstrap Table with Header Dark -->
<script>
    // function violationCar(){
    //     let violationCar = document.querySelector('#checkedCar');
    //     let inputCar = document.querySelector('#inputCar');
    //   let violationDriver = document.querySelector('#basic-default-country');
    //             violationCar.classList.toggle('d-none');
           
    //     }
    // function violationDriver(){
    //         let checkedCar = document.querySelector('#violationeditCar');
    //         let violationDriver = document.querySelector('#checkedDivide');
    //                 let inputCar = document.querySelector('#inputCar');
    //             violationDriver.classList.toggle('d-none');
    //           inputCar.name.remove='car_id';
    //             console.log(inputCar);
            
    //     }
      

</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>




@section('script')
<script>
    $(document).ready(()=>{
        $("#violationCar").click(()=>{
            if($("#violationCar").is(':checked')){
                $("#violationeditCar").removeClass("d-none");
                $("#violationDriver").removeAttr(":checked");
                $("#checkedDivide").addClass("d-none");
            }else{
                $("#violationeditCar").addClass("d-none");
            }
        })
        $("#violationDriver").click(()=>{
            if($("#violationDriver").is(':checked')){
                $("#checkedDivide").removeClass("d-none");
                $("#violationeditCar").addClass("d-none");
            }else{
                $("#checkedDivide").addClass("d-none");
            }
        })
    })
</script>
@endsection


@endsection