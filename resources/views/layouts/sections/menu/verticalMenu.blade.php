@php
$configData = Helper::appClasses();
@endphp

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    @if (!isset($navbarFull))

    <style>
        img.logo-light {
            height: 160px;
            padding-right: 2.25rem;
            padding-left: 0;
            position: relative;
            top: -10px;
        }



        .light-style .menu .app-brand.demo {
            height: 160px;
        }

        .dark-style .menu .app-brand.demo a img.logo-light {
            display: none;
        }


        .light-style .menu .app-brand.demo a img.logo-dark {
            display: none;

        }
    </style>
    <div class="app-brand demo mb-5">
        <a href="{{ url('/') }}" class="app-brand-link">
            @if (auth()->user()->position == 'customer')
            <form method="post" enctype="multipart/form-data" id="profile-setup">
                @csrf
                <div class='d-flex justify-content-center py-2' style="flex-direction: column;">
                    <label for="profile_image">
                        <img id="image-profile-prev" style="height: 130px; cursor: pointer; width: 200px;"
                            src="{{ asset('public/images/customer/' . auth()->user()->logoImage) }}" />
                    </label>
                    <input type="file" name="profile_image" class="form-control d-none" id="profile_image" />
                </div>

            </form>
            @endif
            <img class="logo-dark" src="{{ asset('assets/img/default.png') }}">

            <!--<span class="app-brand-logo demo">-->
            <!--  @include('_partials.macros')-->
            <!--</span>-->
            <!--<span class="app-brand-text demo menu-text fw-bold ms-2">{{ config('variables.templateName') }}</span>-->
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>
    @endif
    {{-- @php
    $agency = DB::table('travel_agency')->where('id',auth()->id())->first();
    @endphp --}}
    <!-- ! Hide menu divider if navbar-full -->
    @if (!isset($navbarFull))
    <div class="menu-divider mt-0 ">
    </div>
    @endif

    <div class="menu-inner-shadow"></div>
    @section('adminMinue')


    @isset($superAdmin)
    <ul class="menu-inner py-1">



        <li class="menu-item ">
            <a href="{{ route('dashboard-analytics') }}" class="menu-link">

                <i class=" menu-icon tf-icons bx bx-home-circle">

                </i>
                <div>Dashboards <span style="color: #21b93b;"></span></div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>Customers</div>
            </a>

            <ul class="menu-sub">
                <a href="{{ route('customer') }}" class="menu-link ">
                    <i class="fa-solid fa-plus m-md-1"></i>

                    <div>Add New Customer</div>
                </a>
                <a href="{{ route('customerList') }}" class="menu-link ">
                    <i class="fa-solid fa-users mx-1"></i>

                    <div>List Of Customer</div>
                </a>



            </ul>
        <li class="menu-item ">
            <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>Package</div>
            </a>

            <ul class="menu-sub">
                <a href="{{ route('package') }}" class="menu-link ">
                    <i class="fa-solid fa-plus m-md-1"></i>

                    <div>Add New Package</div>
                </a>
                <a href="{{ route('packageList') }}" class="menu-link ">
                    <i class="fa-solid fa-users mx-1"></i>

                    <div>List Of Package</div>
                </a>



            </ul>
            @endisset
            @isset($user)
            <ul class="menu-inner py-1">



                <li class="menu-item ">
                    <a href="{{ route('dashboard') }}" class="menu-link">

                        <i class=" menu-icon tf-icons bx bx-home-circle">

                        </i>
                        <div> الصفحة الرئيسية <span style="color: #21b93b;"></span></div>
                    </a>
                </li>


                {{-- Start cars --}}
                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                        <i class="fa-solid fa-truck-pickup mx-1"> </i>
                        <div> السيارات</div>
                    </a>

                    <ul class="menu-sub">
                        <a href="{{ route('category') }}" class="menu-link ">
                            <i class="fa-solid fa-truck-front mx-1"></i>

                            <div>فئات</div>
                        </a>
                        <a href="{{ route('carList') }}" class="menu-link ">
                            <i class="fa-solid fa-truck-pickup mx-1"> </i>

                            <div>جميع السيارات</div>
                        </a>
                        <a href="{{ route('storeCar') }}" class="menu-link ">
                            <i class="fa-solid fa-truck-pickup mx-1"> </i>

                            <div>السيارات الغير متوفرة</div>
                        </a>


                        {{-- <a href="{{ route('AddNewCar') }}" class="menu-link ">
                            <i class="fa-solid fa-truck-pickup mx-1"> </i>

                            <div>اضافه سيارات</div>
                        </a> --}}
                        {{-- <a href="{{ route('license') }}" class="menu-link ">
                            <i class="fa-solid fa-address-card mx-2"></i>

                            <div>اضافة رخصة</div>
                        </a> --}}
                        <a href="{{ route('listLicense') }}" class="menu-link ">
                            <i class="fa-solid fa-address-card mx-2"></i>

                            <div> قائمة الرخص</div>
                        </a>

                        {{-- <a href="{{ route('violation') }}" class="menu-link ">
                            <i class="fa-solid fa-rectangle-xmark mx-2"></i>

                            <div>اضافة مخالفات</div>
                        </a>
                        <a href="{{ route('violationList') }}" class="menu-link ">
                            <i class="fa-regular fa-credit-card mx-2"></i>

                            <div>المخالفات</div>
                        </a> --}}



                    </ul>
                    {{-- Start cars --}}


                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div>العاملين</div>
                    </a>

                    <ul class="menu-sub">
                        {{-- Driver --}}
                        {{-- <li class="menu-item ">
                            <a href="" class="menu-link menu-toggle ">
                                <i class="fa-solid fa-person mx-1"></i>
                                <div>سائقين</div>
                            </a>

                            <ul class="menu-sub">
                                <a href="{{ route('driverAdd') }}" class="menu-link ">
                                    <i class="fa-solid fa-plus m-md-1"></i>

                                    <div>اضافة سائقين </div>
                                </a>


                            </ul>
                        </li> --}}
                        <a href="{{ route('driverList') }}" class="menu-link ">
                            <i class="fa-solid fa-person m-md-1"></i>

                            <div>سائقين</div>
                        </a>
                        {{-- Driver --}}
                        {{-- Driver Follow --}}
                        {{-- <li class="menu-item ">
                            <a href="" class="menu-link menu-toggle ">
                                <i class="fa-solid fa-person mx-1"></i>
                                <div>تباعين</div>
                            </a>
                            <ul class="menu-sub">
                                <a href="{{ route('driverFollow')}}" class="menu-link ">
                                    <i class="fa-solid fa-users  mx-1"></i>

                                    <div>اضافة تباعين</div>
                                </a>
                            </ul>
                        </li> --}}
                        <a href="{{ route('editFollowDriver') }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div> تباعين</div>
                        </a>
                        {{-- Driver Follow --}}

                        {{-- Employee --}}
                        <li class="menu-item ">
                            <a href="" class="menu-link menu-toggle ">
                                <i class="fa-solid fa-person mx-1"></i>
                                <div>الموظفين</div>
                            </a>

                            <ul class="menu-sub">
                                {{-- <a href="{{ route('employee')}}" class="menu-link ">
                                    <i class="fa-solid fa-users mx-1"></i>

                                    <div>اضافة موظفين</div>
                                </a> --}}
                                <a href="{{ route('empolyeeList') }}" class="menu-link ">
                                    <i class="fa-solid fa-user-tie"></i>

                                    <div> موظفين</div>
                                </a>
                                <a href="{{ route('divide') }}" class="menu-link ">
                                    <i class="fa-solid fa-users mx-1"></i>

                                    <div> اقسام الموظفين</div>
                                </a>

                            </ul>
                        </li>

                        {{-- Employee --}}


                    </ul>



















                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                        <i class="fa-solid fa-truck-fast mx-1"></i>
                        <div>نوالين</div>
                    </a>

                    <ul class="menu-sub">
                        <a href="{{ route('nawlone') }}" class="menu-link ">
                            <i class="fa-solid fa-plus mx-1"></i>

                            <div>اضافة ناولون جديد</div>
                        </a>
                        <a href="{{ route('nawloneList', ['status']) }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div> نولون</div>
                        </a>



                    </ul>








                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle ">
                        <i class="fa-solid fa-wrench mx-1"></i>
                        <div>صيانات</div>
                    </a>

                    <ul class="menu-sub">
                        <a href="{{ route('maintenance') }}" class="menu-link ">
                            <i class="fa-solid fa-plus m-md-1"></i>

                            <div>جميع الصيانات</div>
                        </a>
                        <a href="{{ route('addMaintan') }}" class="menu-link ">
                            <i class="fa-solid fa-plus m-md-1"></i>

                            <div>اضافة صيانة</div>
                        </a>




                    </ul>



                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                        <i class="fa-solid fa-box mx-2"></i>
                        <div>قطع غيار</div>
                    </a>

                    <ul class="menu-sub">
                        <a href="{{ route('CarPart') }}" class="menu-link ">
                            <i class="fa-solid fa-plus m-md-1"></i>

                            <div>جميع قطع غيار </div>
                        </a>
                        {{-- <a href="{{ route('packageList')}}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div> اضافه قطع غيار </div>
                        </a> --}}
                        <a href="{{ route('productCategoryCar') }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div>تصنيفات </div>
                        </a>

                        <a href="{{ route('supplierList') }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div> موردين </div>
                        </a>
                        <a href="{{ route('purchase') }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div>شراء</div>
                        </a>
                        <a href="{{ route('store') }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div> مخزن</div>
                        </a>

                    </ul>


                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                        <i class="fa-solid fa-money-check-dollar mx-2"></i>
                        <div>المصروفات</div>
                    </a>

                    <ul class="menu-sub">
                        <a href="{{ route('licenseUpdate') }}" class="menu-link ">
                            <i class="fa-solid fa-address-card mx-2"></i>
                            <div> تجديد الرخص</div>
                        </a>
                        <a href="{{ route('categoryExpenses') }}" class="menu-link ">
                            <i class="fa-solid fa-plus m-md-1"></i>

                            <div> بنود مصروفات </div>
                        </a>
                        <a href="{{ route('expenses') }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div>جميع المصروفات </div>
                        </a>

                        <a href="{{ route('insurance') }}" class="menu-link ">
                            <i class="fa-solid fa-plus m-md-1"></i>

                            <div>التامينات </div>
                        </a>


                        <a href="{{ route('taxes') }}" class="menu-link ">
                            <i class="fa-solid fa-money-bill-transfer mx-2"></i>
                            <div>الضرائب</div>
                        </a>


                        <li class="menu-item ">
                            <a href="" class="menu-link menu-toggle">
                                <i class="fa-solid fa-triangle-exclamation mx-1"></i>
                                <div>مخالفات</div>
                            </a>

                            <ul class="menu-sub">
                                <a href="{{ route('violationList') }}" class="menu-link ">
                                    <i class="fa-solid fa-plus m-md-1"></i>

                                    <div>جميع المخالفات</div>
                                </a>
                                <a href="{{ route('violation') }}" class="menu-link ">
                                    <i class="fa-solid fa-users mx-1"></i>

                                    <div>اضافة مخالفات </div>
                                </a>


                            </ul>
                    </ul>



                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                        <i class="fa-solid fa-money-bills mx-2"></i>
                        <div>ايرادات</div>
                    </a>

                    <ul class="menu-sub">
                        <a href="{{ route('revenue') }}" class="menu-link ">
                            <i class="fa-solid fa-plus m-md-1"></i>

                            <div> جميع الأيرادات </div>
                        </a>
                        {{-- <a href="{{ route('packageList')}}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div>اضافه مصروف</div>
                        </a> --}}
                        <a href="{{ route('categoryRevenues') }}" class="menu-link ">
                            <i class="fa-solid fa-users mx-1"></i>

                            <div> تصنيفات </div>
                        </a>



                    </ul>

                    <a href="{{ route('report')}}" class="menu-link ">
                        <i class="fa-solid fa-receipt mx-2"></i>
                        <div> تقارير </div>
                    </a>

                    {{-- Start cars --}}
                <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                        <i class="fa-solid fa-truck-pickup mx-1"> </i>
                        <div> الأعدادات</div>
                    </a>

                    <ul class="menu-sub">





                        {{-- Location --}}
                        <li class="menu-item ">
                            <a href="" class="menu-link menu-toggle ">
                                <i class="fa-solid fa-person mx-1"></i>
                                <div>الاماكن</div>
                            </a>

                            <ul class="menu-sub">
                                <a href="{{ route('location') }}" class="menu-link ">
                                    <i class="fa-solid fa-users  mx-1"></i>

                                    <div>اماكن التحميل </div>
                                </a>
                                <a href="{{ route('tatek') }}" class="menu-link ">
                                    <i class="fa-solid fa-users mx-1"></i>

                                    <div> اماكن التعتيق</div>
                                </a>

                            </ul>
                        </li>
                        {{-- Location --}}




                    </ul>
                    {{-- Start cars --}}
                    @endisset
                    @isset($VideoEditor)
                    <ul class="menu-inner py-1">
                        <li class="menu-item ">
                            <a href="{{ route('videoEditor') }}" class="menu-link">

                                <i class=" menu-icon tf-icons bx bx-home-circle">

                                </i>

                                <div>Dashboards <span style="color: #21b93b;"></span></div>
                            </a>
                        </li>
                        @endisset
                        @isset($userAdmin)
                        <ul class="menu-inner py-1">
                            <li class="menu-item ">
                                <a href="{{ route('UserAdmin') }}" class="menu-link">

                                    <i class=" menu-icon tf-icons bx bx-home-circle">

                                    </i>

                                    <div>Dashboards <span style="color: #21b93b;"></span></div>
                                </a>
                            </li>






                            <li class="menu-item ">
                                <a href="" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div>Setting</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="{{ route('user_admin_profile') }}" class="menu-link">

                                            <div>Profile</div>
                                        </a>
                                    </li>
                                    <li class="menu-item ">
                                        {{-- <a href="{{route('categories')}}" class="menu-link">
                                            <div>Categories</div>
                                        </a> --}}



                                    <li class="menu-item ">
                                        {{-- <a href="" class="menu-link menu-toggle">
                                            <i class=" tf-icons bx bx-user"></i>
                                            <div>Bundle</div>
                                        </a> --}}

                                        <ul class="menu-sub">
                                            <a href="{{ route('bundle_show') }}" class="menu-link">
                                                <div>All Bundles</div>
                                            </a>
                                            <li class="menu-item ">
                                                {{-- <a href="{{route('bundle')}}" class="menu-link ">
                                                    <div>Add Bundle</div>
                                                </a> --}}
                                            </li>
                                        </ul>

                                    </li>


                                </ul>
                                <a href="{{ route('login.destroy') }}" class="menu-link">
                                    <div>Log Out &nbsp; <i class="fa-solid fa-right-from-bracket"></i></div>
                                </a>
                            </li>
                            @endisset
                            @show






</aside>
<script>
    $(document).ready(function() {
        $('#profile_image').on('change', function() {
            var reader = new FileReader();

            reader.onload = (e) => {
                $("#image-profile-prev").attr("src", e.target.ressult)
            }
            reader.readAsDataURL(this.files[0]);



            //     $.ajax({
            //       type:'GET',
            //       url:'{{ route('updateImage') }}',
            //       dataType:"json",
            //       data:{
            //         'logoImage':image,

            //       },
            //       success: function(respnse){
            //           console.log(respnse);
            //       },
            // });
            console.log("image");
        });
    });
</script>