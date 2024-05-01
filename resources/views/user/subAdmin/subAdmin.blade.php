@extends('layouts/layoutMaster')
@php
$user='';
$menuHorizontal ='';

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

<!-- Page CSS -->
@endsection

@section('style-page')
<style>
    .template-customizer-open-btn {
        display: none;
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
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

<!-- Page CSS -->
@endsection
@section('style-header')
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
<link rel="stylesheet" href="../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
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




{{-- Start Permession User --}}

{{-- <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h6 class="fw-normal">Total 4 users</h6>
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                        class="avatar avatar-sm pull-up" aria-label="Vinnie Mostowy"
                        data-bs-original-title="Vinnie Mostowy">
                        <img class="rounded-circle" src="../assets/img/avatars/5.png" alt="Avatar">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                        class="avatar avatar-sm pull-up" aria-label="Allen Rieske"
                        data-bs-original-title="Allen Rieske">
                        <img class="rounded-circle" src="../assets/img/avatars/12.png" alt="Avatar">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                        class="avatar avatar-sm pull-up" aria-label="Julee Rossignol"
                        data-bs-original-title="Julee Rossignol">
                        <img class="rounded-circle" src="../assets/img/avatars/6.png" alt="Avatar">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                        class="avatar avatar-sm pull-up" aria-label="Kaith D'souza"
                        data-bs-original-title="Kaith D'souza">
                        <img class="rounded-circle" src="../assets/img/avatars/15.png" alt="Avatar">
                    </li>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                        class="avatar avatar-sm pull-up" aria-label="John Doe" data-bs-original-title="John Doe">
                        <img class="rounded-circle" src="../assets/img/avatars/1.png" alt="Avatar">
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="role-heading">
                    <h4 class="mb-1">Administrator</h4>
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                        class="role-edit-modal"><small>Edit Role</small></a>
                </div>
                <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
            </div>
        </div>
    </div>
</div> --}}



<div class="col-xl-12 col-lg-6 col-md-6">
    <div class="card h-100">
        <div class="row h-100">
            <div class="col-sm-7 col-12">
                <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                    class="btn btn-primary mb-3 text-nowrap add-new-role">
                    اضافة مسؤول جديد
                </button>
                <div class="card-body text-sm-end text-center ps-sm-0">

                    <p class="mb-0">اضافة عامل جديد وتحديد العمليات المسؤول بها</p>
                </div>
            </div>
            <div class="col-sm-5">

                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-1 mt-3">
                    <img src="../assets/img/illustrations/lady-with-laptop-light.png" class="img-fluid" alt="Image"
                        width="100" data-app-light-img="illustrations/lady-with-laptop-light.png"
                        data-app-dark-img="illustrations/lady-with-laptop-dark.png">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-12 mt-5">

    <div class="card">
        <h5 class="card-header">جميع الايرادات</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>اسم العامل</th>
                        <th>ايميل العامل</th>
                        <th>المسؤوليات</th>

                        <th>تعديلات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($subAdmins as $subAdmin)
                    <tr>
                        <td>{{ $subAdmin->name }}</td>
                        <td>{{ $subAdmin->email }}</td>
                        <td>
                            @foreach ($subAdmin->roles as $roles )
                            - {{ $roles->role_name ?? 'ليس لديه مسؤليات' }}
                            <a href="{{ route('deleteRole',['id'=>$roles->id]) }}">
                                <i class="bx bx-trash me-1"></i>
                            </a>
                            <br>
                            <br>
                            @endforeach

                            @if(count($subAdmin->roles) == 0 ) <span>ليس لديه مسؤليات</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex;align-items: center;justify-content: space-between;">
                                <i class="fa-solid fa-ellipsis-vertical btnCus" style="cursor: pointer"
                                    id="btn{{ $subAdmin->id }}"></i>

                                <div class="d-none menu-cus"
                                    style="position: absolute;left: -1%;background: #aaa;color: #e9ecee;padding: 10px;border-radius: 8px;margin-top: 45px;">
                                    <a style="font-weight: 600;" class="dropdown-item"
                                        data-bs-target="#basicModal{{ $subAdmin->id }}" data-bs-toggle="modal"
                                        href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a style="font-weight: 600;" class="dropdown-item"
                                        href="{{ route('deleteUserAdmin',['id'=>$subAdmin->id]) }}"><i
                                            class="bx bx-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- Start Model With Eit Car --}}
                    <div class="modal fade" id="basicModal{{ $subAdmin->id }}" tabindex="-1" aria-hidden="true">
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
                                                <h5 class="card-header">: {{ $subAdmin->name }}
                                                </h5>
                                                <div class="card-body">
                                                    <form class="needs-validation"
                                                        action="{{ route('store_role_user') }}" method="POST"
                                                        enctype="multipart/form-data" novalidate="">
                                                        <input type="hidden" name="_token"
                                                            value="XoMVM9zDPv5dl5oMZVW9Stwod1CoXUOpBJ5PZPHd">
                                                        <div class="mb-3">

                                                            <label class="form-label"
                                                                for="bs-validation-name">Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="bs-validation-name"
                                                                placeholder="Enter Your Full name"
                                                                required="The Name Can't Be Emty">
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">Please enter your name.</div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="bs-validation-email">Email</label>
                                                            <input type="email" id="bs-validation-email"
                                                                class="form-control" name="email"
                                                                placeholder="Enter Your Email"
                                                                required="The Email Can't Be Empty">
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">Please enter a valid email
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="bs-validation-email">Phone</label>
                                                            <input type="number" id="bs-validation-email"
                                                                class="form-control" name="phone"
                                                                placeholder="Enter your Phone"
                                                                required="The Phone Can't Be Empty">
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">Please enter a valid email
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="bs-validation-email">Parent
                                                                Phone</label>
                                                            <input type="number" id="bs-validation-email"
                                                                class="form-control" name="parent_phone"
                                                                placeholder="Enter your Parent Phone"
                                                                required="The  Parent Phone Can't Be Empty">
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">Please enter a valid email
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="bs-validation-email">password</label>
                                                            <input type="password" id="bs-validation-email"
                                                                class="form-control" name="password"
                                                                placeholder="Enter your Password"
                                                                required="The password Can't Be Empty">
                                                            <div class="valid-feedback">Looks good!</div>
                                                            <div class="invalid-feedback">Please enter a valid email
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basic-default-upload-file">صورة العامل</label>
                                                            <input type="file" name="image" class="form-control"
                                                                id="basic-default-upload-file">
                                                        </div>
                                                        {{-- Cars --}}
                                                        <label class="switch switch-success">
                                                            <input type="checkbox" value="cars" name="role_car"
                                                                class="switch-input" checked="">
                                                            <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                    <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                    <i class="bx bx-x"></i>
                                                                </span>
                                                            </span>
                                                            <span class="switch-label">سيارات</span>
                                                        </label>
                                                        {{-- Cars --}}
                                                        {{-- Nawlon --}}
                                                        <label class="switch switch-success">

                                                            <input type="checkbox" value="nawlon" name="role_nawlon"
                                                                class="switch-input" checked="">
                                                            <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                    <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                    <i class="bx bx-x"></i>
                                                                </span>
                                                            </span>
                                                            <span class="switch-label">ناولون</span>
                                                        </label>
                                                        {{-- Nawlon --}}
                                                        {{-- Empoloyee --}}
                                                        <label class="switch switch-success">
                                                            <input type="checkbox" value="employee"
                                                                name="role_empoloyee" class="switch-input" checked="">
                                                            <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                    <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                    <i class="bx bx-x"></i>
                                                                </span>
                                                            </span>
                                                            <span class="switch-label">عاملين</span>
                                                        </label>
                                                        {{-- Employee --}}

                                                        <div class="mb-3 form-password-toggle mt-3">
                                                            <div class="input-group input-group-merge">


                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback">Please enter your
                                                                    password.</div>
                                                            </div>

                                                            <input type="submit" value="Submit" class="btn btn-primary">

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
</div>

</div>

<div class="modal fade" id="addRoleModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="role-title">Add New Role</h3>
                    <p>Set role permissions</p>
                </div>
                <form class="needs-validation" action="{{ route('store_role_user') }}" method="POST"
                    enctype="multipart/form-data" novalidate="">
                    <input type="hidden" name="_token" value="XoMVM9zDPv5dl5oMZVW9Stwod1CoXUOpBJ5PZPHd">
                    <div class="mb-3">

                        <label class="form-label" for="bs-validation-name">Name</label>
                        <input type="text" class="form-control" name="name" id="bs-validation-name"
                            placeholder="Enter Your Full name" required="The Name Can't Be Emty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Email</label>
                        <input type="email" id="bs-validation-email" class="form-control" name="email"
                            placeholder="Enter Your Email" required="The Email Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Phone</label>
                        <input type="number" id="bs-validation-email" class="form-control" name="phone"
                            placeholder="Enter your Phone" required="The Phone Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Parent Phone</label>
                        <input type="number" id="bs-validation-email" class="form-control" name="parent_phone"
                            placeholder="Enter your Parent Phone" required="The  Parent Phone Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">password</label>
                        <input type="password" id="bs-validation-email" class="form-control" name="password"
                            placeholder="Enter your Password" required="The password Can't Be Empty">
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-upload-file">صورة العامل</label>
                        <input type="file" name="image" class="form-control" id="basic-default-upload-file">
                    </div>
                    {{-- Cars --}}
                    <label class="switch switch-success">
                        <input type="checkbox" value="cars" name="role_car" class="switch-input" checked="">
                        <span class="switch-toggle-slider">
                            <span class="switch-on">
                                <i class="bx bx-check"></i>
                            </span>
                            <span class="switch-off">
                                <i class="bx bx-x"></i>
                            </span>
                        </span>
                        <span class="switch-label">سيارات</span>
                    </label>
                    {{-- Cars --}}
                    {{-- Nawlon --}}
                    <label class="switch switch-success">

                        <input type="checkbox" value="nawlon" name="role_nawlon" class="switch-input" checked="">
                        <span class="switch-toggle-slider">
                            <span class="switch-on">
                                <i class="bx bx-check"></i>
                            </span>
                            <span class="switch-off">
                                <i class="bx bx-x"></i>
                            </span>
                        </span>
                        <span class="switch-label">ناولون</span>
                    </label>
                    {{-- Nawlon --}}
                    {{-- Empoloyee --}}
                    <label class="switch switch-success">
                        <input type="checkbox" value="employee" name="role_empoloyee" class="switch-input" checked="">
                        <span class="switch-toggle-slider">
                            <span class="switch-on">
                                <i class="bx bx-check"></i>
                            </span>
                            <span class="switch-off">
                                <i class="bx bx-x"></i>
                            </span>
                        </span>
                        <span class="switch-label">عاملين</span>
                    </label>
                    {{-- Employee --}}

                    <div class="mb-3 form-password-toggle mt-3">
                        <div class="input-group input-group-merge">


                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">

                    </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
<!--/ Add Role Modal -->

<!-- / Add Role Modal -->
</div>
{{-- End Permession User --}}

@section('script')
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
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

<script src="../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/app-access-roles.js"></script>
<script src="../assets/js/modal-add-role.js"></script>
<script>
    $(document).ready(function() {
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

</script>
@endsection
@endsection