<link rel="stylesheet" href="../assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="../assets/vendor/libs/sweetalert2/sweetalert2.css" />
<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
@if (session()->has('success'))



<div class="alert alert-success text-center" role="alert">
    {{session()->get('success')}}
</div>
{{-- <div class="alert alert-solid-success text-center" role="alert">
    {{session()->get('success')}}
</div> --}}

@elseif (session()->has('faild'))
<div class="alert alert-danger text-center" role="alert">
    {{session()->get('faild')}}
</div>




@endif



<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<!-- Main JS -->

<!-- Page JS -->
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>