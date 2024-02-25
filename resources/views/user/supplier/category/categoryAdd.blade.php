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

@section('script_jq')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endsection


@section('vendor-style')
<style>
    span {
        color: red;
    }
</style>
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

@section('page-style')
<style>
    span {
        color: red;
    }

    .chosen-container-multi .chosen-choices {
        position: relative !important;
        overflow: hidden !important;
        display: block !important;
        padding: 0.469rem 0.135rem !important;
        font-size: 0.9375rem !important;
        font-weight: 400 !important;
        line-height: 1.4 !important;
        color: #677788 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #d4d8dd !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        appearance: none !important;
        border-radius: 0.25rem !important;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
        box-shadow: none !important;
        background-image: none !important;
    }

    .chosen-search-input {
        width: 100px !important;
        padding: 0 0.5rem !important;
    }

    .search-choice {}

    .search-choice span {
        color: #f55839 !important;
        font-family: sans-serif !important;
        font-size: medium !important;
    }

    .chosen-rtl .chosen-choices li.search-choice .search-choice-close {
        left: 6px !important;
    }

    .chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
        top: 9px !important;
    }

    .chosen-rtl .chosen-choices li.search-choice {
        padding: 4px 5px 5px 25px !important;
        border: none !important;
        outline: none !important;
    }

    .chosen-container-multi .chosen-choices li.search-choice {
        background-image: none !important;
        line-height: 20px !important;
        box-shadow: none !important;
        border-radius: 7px !important;

    }
</style>
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
@section('style-page')
<link href="https://harvesthq.github.io/chosen/chosen.css" rel="stylesheet" />
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
@endsection

@section('vendor-script')
<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
{{-- <script src="../assets/js/config.js"></script> --}}
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
<!-- Browser Default -->
<div class="col-md mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">اضافة صنف جديد</h5>
        <div class="card-body">
            <form class="browser-default-validation" action="{{ route('addSupplier') }}" method="POST"
                enctype="multipart/form-data">
                @csrf






                {{-- Select The Main or Sup CAtegory --}}
                <div class="mb-3">
                    <label class="form-label" for="basic-default-dob">اختر التصنيف </label>
                    <select class="form-control" name="select_category" id="basic-default-dob">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-dob">اختر التصنيف </label>
                    <div class="" style="width: 100% !important;">
                        <select data-placeholder="اختر المنتج" multiple class="chosen-select">
                            <option value=""></option>
                            <option>Dallas Cowboys</option>
                            <option>New York Giants</option>
                            <option>Philadelphia Eagles</option>
                            <option>Washington Redskins</option>
                            <option>Chicago Bears</option>
                            <option>Detroit Lions</option>
                            <option>Green Bay Packers</option>
                            <option>Minnesota Vikings</option>
                            <option>Atlanta Falcons</option>
                            <option>Carolina Panthers</option>
                            <option>New Orleans Saints</option>
                            <option>Tampa Bay Buccaneers</option>
                        </select>
                    </div>
                </div>

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
</div>
<!-- /Browser Default -->
<!--/ Bootstrap Table with Header Dark -->
<script>
    $(document).ready(function() {
$(".chosen-select").chosen({width: "100%",rtl: true}); 
// $(".chosen-select").chosen();
$(".chosen-select").chosen({disable_search_threshold: 10});
 $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 

});
</script>

@endsection