@extends('layouts/layoutMaster')

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
<link rel="stylesheet" href="../../ assets/vendor/libs/typeahead-js/typeahead.css" />
<style>
    span {
        color: red;
    }
</style>
<!-- Page CSS -->
@endsection

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
<link rel="stylesheet" href="../../assets/vendor/libs/plyr/plyr.css" />

<!-- Page CSS -->
@endsection
@section('vendor-script')
<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/config.js"></script>
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../../assets/vendor/libs/hammer/hammer.js"></script>
<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="../../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<!-- Flat Picker -->
<script src="../../assets/vendor/libs/moment/moment.js"></script>
<script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>

<!-- Main JS -->

<!-- Page JS -->
<script src="../../assets/js/tables-datatables-advanced.js"></script>
@endsection
@section('content')
@include('success')


{{-- Start Video Help --}}

<div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        @if($type == 'addCar')
        <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Add /</span> Car</h4>
        @endif

        <div class="row">
            <!-- Video Player -->
            <div class="col-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Video</h5>
                    <div class="card-body">
                        @if($type == 'addCategoryCar')
                        <video class="w-100" poster="{{ asset('assets/videos/addCategoryCar.mp4')}}"
                            id="plyr-video-player" playsinline controls>
                            <source src="{{ asset('assets/videos/addCategoryCar.mp4') }}" type="video/mp4" />
                        </video>
                        @elseif($type == 'addCar')
                        <video class="w-100" poster="{{ asset('assets/videos/addCar.mp4')}}" id="plyr-video-player"
                            playsinline controls>
                            <source src="{{ asset('assets/videos/addCar.mp4') }}" type="video/mp4" />
                        </video>
                        @elseif($type == 'addLicenseCar')
                        <video class="w-100" poster="{{ asset('assets/videos/addLicenseCar.mp4')}}"
                            id="plyr-video-player" playsinline controls>
                            <source src="{{ asset('assets/videos/addLicenseCar.mp4') }}" type="video/mp4" />
                        </video>
                        @elseif($type == 'addDriver')
                        <video class="w-100" poster="{{ asset('assets/videos/addDriver.mp4')}}" id="plyr-video-player"
                            playsinline controls>
                            <source src="{{ asset('assets/videos/addDriver.mp4') }}" type="video/mp4" />
                        </video>
                        @elseif($type == 'addFollows')
                        <video class="w-100" poster="{{ asset('assets/videos/addFollows.mp4')}}" id="plyr-video-player"
                            playsinline controls>
                            <source src="{{ asset('assets/videos/addFollows.mp4') }}" type="video/mp4" />
                        </video>
                        @endif

                    </div>
                </div>
            </div>
            <!-- /Video Player -->

            <!-- Audio Player -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Audio</h5>
                    <div class="card-body">
                        <audio class="w-100" id="plyr-audio-player" controls>
                            <source src="../../assets/audio/Water_Lily.mp3" type="audio/mp3" />
                        </audio>
                    </div>
                </div>
            </div>
            <!-- /Audio Player -->
        </div>
    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
</div>

{{-- End Video Help --}}


@section('script')
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/plyr/plyr.js"></script>

<!-- Main JS -->
<script src="../../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../../assets/js/extended-ui-media-player.js"></script>

@endsection
@endsection