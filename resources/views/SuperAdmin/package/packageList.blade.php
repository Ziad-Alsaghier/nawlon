@extends('layouts/layoutMaster')
@php
$superAdmin='Minue';
@endphp


@section('title', 'Customer')

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
<link rel="stylesheet" href="../assets/css/demo.css" />
<!-- Page CSS -->
<link rel="stylesheet" href="../assets/vendor/css/pages/page-pricing.css" />
<!-- Helpers -->
@endsection

@section('page-style')
<style>
  span.span {
    color: red;
  }
</style>
@endsection
@section('vendor-script')

<script src="../assets//js/pages-pricing.js"></script>

<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="{{ asset('vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->


<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../../assets/js/config.js"></script>
@endsection
@section('content')


@include('success')
@if(count($packages) > 0)
<div class=" py-5">
  <h2 class="text-center mb-3 mt-0 mt-md-4">Find the right plan for your site</h2>
  <p class="text-center">
    Get started with us - it's perfect for individuals and teams. Choose a subscription plan that
    meets your needs.
  </p>


  <div class="row mx-4 gy-3">
    <!-- Starter -->
    @foreach($packages as $package)
    <div class="col-xl-4 mb-lg-0 lg-4">
      <div class="card border shadow-none">
        <div class="card-body">
          <h5 class="text-start text-uppercase">Users subscription : <a href="">{{ count($package->users) }}</a></h5>

          <div class="text-center position-relative mb-4 pb-1">
            <div class="mb-2 d-flex">

              <h1 class="price-toggle text-pr imary price-yearly mb-0">{{ $package->price_monthly }}EGP</h1>

              <sub class="h5 text-muted pricing-duration mt-auto mb-2">/mo</sub>
              <h1 class="price-toggle text-primary price-monthly mb-0 ">{{ $package->price_year }}EGP</h1>

              <sub class="h5 text-muted pricing-duration mt-auto mb-2">/year</sub>


            </div>

          </div>

          <p>All the basics for business that are just getting started</p>

          <hr>

          <ul class="list-unstyled pt-2 pb-1">
            <li class="mb-2">
              <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                <i class="bx bx-check bx-xs"></i>
              </span>
              Up to 10 users
            </li>
            <li class="mb-2">
              <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                <i class="bx bx-check bx-xs"></i>
              </span>
              150+ components
            </li>
            <li class="mb-2">
              <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                <i class="bx bx-check bx-xs"></i>
              </span>
              Basic support on Github
            </li>
            <li class="mb-2">
              <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                <i class="bx bx-x fs-5 lh-1"></i>
              </span>
              Monthly updates
            </li>
            <li class="mb-2">
              <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                <i class="bx bx-x fs-5 lh-1"></i>
              </span>
              Integrations
            </li>
            <li class="mb-2">
              <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-secondary me-2">
                <i class="bx bx-x fs-5 lh-1"></i>
              </span>
              Full Support
            </li>
          </ul>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#basicModal{{ $package->id }}">
            Edit
          </button>



          {{-- Start Model With Eit Packages --}}
          <div class="modal fade" id="basicModal{{ $package->id }}" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">{{ $package->id }} title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <!-- Start body Model With Inputs -->
                    <div class="col-md">

                      <div class="card">
                        <h5 class="card-header">Edit Package : {{ $package->name }}</h5>
                        <div class="card-body">
                          <form class="needs-validation" action="{{ route('editPackage') }}" method="POST"
                            enctype="multipart/form-data" novalidate="">
                            @csrf
                            <input type="hidden" value="{{ $package->id }}" name="package_id">
                            <div class="mb-3">

                              <label class="form-label" for="bs-validation-name">Name</label>
                              {{-- Start Input --}}
                              <input type="text" class="form-control" value="{{ $package->name }}" name="name"
                                id="bs-validation-name">
                              {{-- End Input --}}
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please enter your name.</div>
                              @error('name')
                              <span class="span"> {{ $message }}</span>
                              @enderror
                            </div>


                            <div class="mb-3 " id="inputMonthly">
                              <label class="form-label" for="bs-validation-email">Price per Monthly</label>
                              <input type="number" value="{{ $package->price_monthly }}" id="bs-validation-email"
                                class="form-control" name="price_monthly" placeholder="Enter your Phone">
                              <div class="valid-feedback">Looks good!</div>
                              <div class="">
                                @error('price')
                                <span class="span"> {{ $message }}</span>
                                @enderror
                              </div>

                            </div>



                            <div class="mb-3" id="inputyear">
                              <label class="form-label" for="bs-validation-email">Price per year</label>
                              <input type="number" value="{{ $package->price_year }}" id="bs-validation-email"
                                class="form-control" name="price_year" placeholder="Enter your Phone">
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
                              <input type="checkbox" @checked($package->type =='paid') name="type"
                              value='paid'
                              class="switch-input">
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
                    <!-- /End body Model With Inputs -->
                  </div>

                </div>

              </div>
            </div>
          </div>
          {{-- End Model With Eit Packages --}}
        </div>
      </div>
    </div>
    @endforeach
    @elseif(count($packages) === 0 )
    <h1 class='text-center'>
      We Don't Have Any <span style="color:#f55839">Packages</span>
      <i class="fa-solid fa-face-frown-open"></i>
    </h1>
    @endif



  </div>
</div>

@endsection