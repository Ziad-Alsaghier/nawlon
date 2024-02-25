@extends('layouts/layoutMaster')
@php
$superAdmin='Minue';
@endphp


@section('title', 'Customer')

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
<link rel="stylesheet" href="../assets/css/demo.css" />
<style>
  span.span {
    color: red;
  }

  <style>.mystyle {
    display: none;
  }
</style>
@endsection
@section('vendor-script')

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
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
<script src="../assets/vendor/libs/select2/select2.js"></script>
<script src="../assets/vendor/libs/tagify/tagify.js"></script>
<script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="../assets/vendor/libs/bloodhound/bloodhound.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/forms-selects.js"></script>
<script src="../assets/js/forms-tagify.js"></script>
<script src="../assets/js/forms-typeahead.js"></script>
<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/config.js"></script>

@endsection
@section('content')


@include('success')


<div class="row mb-4">

  <!-- Bootstrap Validation -->
  <div class="col-md">

    <div class="card">
      <h5 class="card-header">Add New Package</h5>
      <div class="card-body">
        <form class="needs-validation" action="{{ route('packageInsert') }}" method="POST" enctype="multipart/form-data"
          novalidate="">
          @csrf

          <div class="mb-3">

            <label class="form-label" for="bs-validation-name">Name</label>
            <input type="text" class="form-control" name="name" id="bs-validation-name"
              placeholder="Enter Your Full name" required="The Name Can't Be Emty">
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter your name.</div>
            @error('name')
            <span class="span"> {{ $message }}</span>
            @enderror
          </div>


          <div class="mb-3 " id="inputMonthly">
            <label class="form-label" for="bs-validation-email">Price per Monthly</label>
            <input type="number" id="bs-validation-email" class="form-control" name="price_monthly"
              placeholder="Enter your Phone">
            <div class="valid-feedback">Looks good!</div>
            <div class="">
              @error('price')
              <span class="span"> {{ $message }}</span>
              @enderror
            </div>

          </div>
          <div class="mb-3 " id="car_limitation">
            <label class="form-label" for="bs-validation-email">Enter Car Limitation</label>
            <input type="number" id="bs-validation-email" class="form-control" name="car_limitation"
              placeholder="Enter Car Limitation For This Package">
            <div class="valid-feedback">Looks good!</div>
            <div class="">
              @error('car_limitation')
              <span class="span"> {{ $message }}</span>
              @enderror
            </div>

          </div>



          <div class="mb-3" id="inputyear">
            <label class="form-label" for="bs-validation-email">Price per year</label>
            <input type="number" id="bs-validation-email" class="form-control" name="price_year"
              placeholder="Enter your Phone">
            <div class="valid-feedback">Looks good!</div>
            <div class="">
              @error('price')
              <span class="span"> {{ $message }}</span>
              @enderror
            </div>

          </div>
          <br>
          <br>




          <label class="switch switch-info">
            <input type="checkbox" name="type" value="paid" class="switch-input" checked="">
            <span class="switch-toggle-slider">
              <span class="switch-on">
                Paid <i class="bx bx-check"></i>
              </span>
              <span class="switch-off">
                Free <i class="bx bx-x"></i>
              </span>
            </span>
            <span class="switch-label">Free & Paid</span>
          </label>

          <div class="mb-3">
            <input type="submit" value="Submit" class="btn btn-primary my-3">
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter a valid email</div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- /Bootstrap Validation -->
</div>


<script>
  let checkMonthly = document.querySelector('#customRadioPrimary');
            function Monthly(){
                let inputMonthly = document.querySelector('#inputMonthly');
                let inputyear = document.querySelector('#inputyear');
          
                inputMonthly.classList.remove('d-none');
                inputyear.classList.add('d-none');
            }
            function year(){
              let inputyear = document.querySelector('#inputyear');
              let inputMonthly = document.querySelector('#inputMonthly');
      inputMonthly.classList.add('d-none');
            inputyear.classList.remove('d-none');
         
              
              }
  
 
</script>

@endsection