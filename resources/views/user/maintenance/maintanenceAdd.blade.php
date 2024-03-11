@extends('layouts/layoutMaster')
@php
$user = 'Minue';
@endphp


@section('title', 'Customer List')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('style-header')
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
<link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
<link rel="stylesheet" href="../assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="../assets/vendor/libs/sweetalert2/sweetalert2.css" />
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

<style>
    .btns_add {
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: space-around;
        column-gap: 100px;
    }

    .btns_add::after {
        content: "";
        position: absolute;
        top: 0;
        width: 3px;
        height: 100%;
        background: #e5e5e5;
    }

    .btns_add .btn_spare_Part,
    .btns_add .btn_services {
        width: 100%;
        border: none !important;
        background: #1bb82c !important;
        color: #fff !important;
        font-size: 1.1rem !important;
        padding: 10px !important;
        text-align: center !important;
        border-radius: 10px !important;
        font-weight: 500 !important;
    }

    .btns_add .btn_spare_Part:hover,
    .btns_add .btn_services:hover {
        box-shadow: 0px 6px 38px -21px rgba(0, 0, 0, 1);
    }

    .btns_add>button:hover {
        box-shadow: 0px 8px 19px 8px rgba(217, 217, 217, 0.59);
    }

    .lists_spare_part,
    .lists_services {
        width: calc(75% / 2);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        row-gap: 6px;
    }

    .item_spare_part,
    .item_services {
        margin-top: 8px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        column-gap: 20px;
    }

    .item_spare_part .spare_part {
        width: 100%;
        outline: none;
        padding: 6px 0;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        color: gray;
        border: 2px solid #e5e5e5;
        background: #fff;
    }

    .item_services .item_services_title {
        width: 40%;
        outline: none;
        padding: 6px 0;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        color: gray;
        border: 2px solid #e5e5e5;
        background: #fff;
    }

    .tex-price {
        font-size: 1.5rem;
        text-align: center;
        font-weight: 500;
    }

    .item_spare_part .spare_part_price {
        outline: none;
        padding: 6px 0;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        color: gray;
        border: 2px solid #e5e5e5;
        background: #fff;
    }

    .item_spare_part .spare_part_count {
        outline: none;
        padding: 6px 0;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        color: gray;
        border: 2px solid #e5e5e5;
        background: #fff;
    }

    .item_services .services_price {
        width: 40%;
        outline: none;
        padding: 6px 0;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        color: gray;
        border: 2px solid #e5e5e5;
        background: #fff;
    }

    .item_spare_part .remove_item {
        color: #fff;
        font-size: 1.6rem;
        cursor: pointer;
        border-radius: 8px;
        background: red;
        width: 100%;
        text-align: center;
        margin-top: 8px !important;
        padding: 5px 0 !important;
    }

    .item_services .remove_item {
        cursor: pointer;
        border-radius: 50%;
        font-size: 2.3rem;
        color: red;
    }


    .item_spare_part .remove_item:hover,
    .item_services .remove_item:hover {
        box-shadow: 0px 2px 12px 2px rgba(255, 28, 28, 0.59);
    }

    .maintenances_price {
        display: flex;
        align-items: baseline;
        justify-content: flex-start;
        column-gap: 20px;
        margin-top: 20px;
    }

    .maintenances_price label {
        font-size: 1.3rem;
        font-weight: 500;
        color: gray;
    }

    .maintenances_price {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;
    }

    .maintenances_price .servicess_price,
    .maintenances_price .total_pricee {
        position: relative;
    }

    .maintenances_price .servicess_price::after,
    .maintenances_price .total_pricee::after {
        content: "";
        position: absolute;
        top: 0;
        right: -19%;
        width: 3px;
        height: 100%;
        background: #e5e5e5;
    }

    .maintenances_price .sparee_price>input,
    .maintenances_price .servicess_price>input,
    .maintenances_price .total_pricee>input {
        width: 200px;
        outline: none;
        padding: 8px 0;
        text-align: center;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        color: rgb(92, 92, 92);
        border: 2px solid #e5e5e5;
        background: #fff;
    }

    .btn_cost {
        text-align: center !important;
        border: none !important;
        color: #fff !important;
        background: #1bb82c !important;
        padding: 10px !important;
        font-size: 1.1rem !important;
        font-weight: 500 !important;
        border-radius: 10px !important;
    }

    .btn_cost:hover {
        box-shadow: 0px 6px 38px -21px rgba(0, 0, 0, 1);
    }
</style>
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
<script src="../assets/vendor/libs/select2/select2.js"></script>
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
<form class="form-repeater" id="form_maintenece" enctype="multipart/form-data">

    <div data-repeater-item>

        <div class="col-md-12" style="display: flex;flex-wrap: wrap;align-items: center">

            {{-- الفئة --}}
            <div class="col-md-12">
                <label class="form-label" for="category">اختيار فئة السيارة</label>
                <select class="form-select" id="category" name="category_id">
                    <option value="" selected disabled>اختيار فئة السيارة</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}{{ $category->category }}">{{ $category->category }}</option>
                    @endforeach

                </select>
            </div>

            {{-- الفئة --}}
            {{-- السيار --}}
            <div class="col-md-12">

                <label class="form-label" for="selc_car">اختيار السيارة</label>
                <select class="form-select" id="selc_car" name="car_id">
                    <option value="">اختيار السيارة</option>
                </select>
            </div>
            {{-- السيار --}}

            <div class="mb-3 col-md-12">

                <label class="form-label" for="desc_maintenances">تفاصيل
                    الصيانة </label>
                <textarea id="desc_maintenances" rows="7" type="text" name="description" class="form-control"
                    placeholder="اكتب تفاصيل الصيانة">
                    </textarea>
            </div>


            <div class="btns_add mt-4">
                {{-- Add spare part of cars --}}
                <div class="lists_spare_part">
                    <button type="button" class="btn_spare_Part" id="add_sparePart" href="javascript:void(0);">
                        اضافة قطعة غيار للسيارة <i class="bx bx-plus me-1"></i>
                    </button>
                    {{-- List's From spare part of cars --}}
                    <div id="itemes_spare_part" class="col-md-12">
                        {{-- List From spare part of cars --}}
                        <div class="d-none" id="valid_spare_part" style="text-align: center">
                            <span class="mt-2" style="font-size: 1.2rem;font-weight: 500">لا يوجد قطعة غيار لهذه
                                السيارة</span>
                        </div>
                        <div class="item_spare_part">
                            {{-- <select name="spare_part[]" class="spare_part" id="sel_spare_part">
                                <option value="">اختيار قطعة الغيار</option>
                                <option value="رفرف1">رفرف1</option>
                                <option value="رفرف2">رفرف2</option>
                                <option value="رفرف3">رفرف3</option>

                            </select>
                            <input type="text" name="spare_part_price" class="spare_part_price"
                                id="val_spare_part_price" value="100" readonly>
                            <i class="fa-regular fa-circle-xmark remove_item remove_spare_part"
                                id="remove_spare_part"></i> --}}
                        </div>
                    </div>
                </div>
                {{-- Add Services --}}
                <div class="lists_services">
                    <button type="button" class="btn_services" id="add_services" href="javascript:void(0);">
                        اضافة خدمة للسيارة <i class="bx bx-plus me-1"></i>
                    </button>
                    {{-- Lists From Services --}}
                    <div id="items_services">
                        {{-- List From Services --}}
                        {{-- <div class="item_services">
                            <input type="text" name="item_services_title" class="item_services_title"
                                id="val_services_title" value="" placeholder="ادخل خدمة السيارة" required>
                            <input type="number" name="services_price" class="services_price" id="val_services_price"
                                value="" placeholder="ادخل سعر المصنعية" required>
                            <i class="fa-regular fa-circle-xmark remove_item"></i>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <hr />
        {{-- Total Maintenances price --}}
        <button type="button" class="col-md-12 btn_cost" id="show_cost">
            تاكيد التكلفة
        </button>
        <div class="d-none maintenances_price">
            <div class="sparee_price">
                <label class="form-label" for="form-repeater-1-2">سعر قطع الغيار:</label>
                <input type="text" name="sparee_total_price[]" id="sparee_total_price" value="0" readonly />
            </div>
            <div class="servicess_price">
                <label class="form-label" for="form-repeater-1-2">سعر الخدمات:</label>
                <input type="text" name="servicess_total_price[]" id="servicess_total_price" value="0" readonly />
            </div>
            <div class="total_pricee">
                <label class="form-label" for="form-repeater-1-2">سعر الصيانة:</label>
                <input type="text" name="total_pricee" id="total_pricee" value="0" readonly />
            </div>
        </div>
        <hr />


        {{-- <input type="hidden" name="user_id"> --}}

        <button class="btn btn-primary mt-4" id="send_maintenice" type="submit">تاكيد</button>
</form>




@section('script')
<script>
    $(document).ready(function() {

            $('#desc_maintenances').each(function() {
                $(this).val($(this).val().trim());
            });

            $('#category').change(function() {
                $('#category').attr("disabled", "disabled")


                var category = $('#category').val();
                console.log("itemes_spare_part", $("#itemes_spare_part").val())

                $("#selc_car").empty();
                $("#itemes_spare_part").empty();

                var def_option = `<option value="
                " selected disabled>اختيار السيارة</option>`;
                var def_spate_option = `<option value="
                " selected disabled>اختيار قطعة الغيار</option>`;

                if (category == "") {
                    $("#selc_car").append(def_option);

                } else {
                    $("#selc_car").append(def_option);
                    $("#selc_car").val("");
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('filterCarCategory') }}',
                        dataType: "json",
                        data: {
                            'category_id': category,
                            'user_id': {{ auth()->user()->id }},

                        },
                        success: function(response) {
                            var car = response.car_data;
                            console.log(car);

                            $(car).each((ele, val) => {
                                console.log(ele)
                                console.log(val)
                                console.log("data cars", "#".repeat(12))
                                console.log("cars", car[ele])
                                console.log("cars", val.car_parts)
                                console.log(car[ele].car_parts)
                                console.log("#".repeat(12))

                                var cars =
                                    `<option value='${ele}${val.id}' id="car${ele}">${val.cars_name}</option>`;
                                $("#selc_car").append(cars);
                            })

                            var numI = 0;
                            $("#selc_car").change(() => {
                                numI = 0;
                                console.log("change", "#".repeat(12))
                                console.log($("#selc_car").val());
                                console.log($("#selc_car").length);
                                console.log("Change gose")
                                console.log("change", "#".repeat(12))
                                $("#mt_total_price").val(0);
                                $("#itemes_spare_part").empty();
                            })


                            /* Add spare part of car */
                            $("#add_sparePart").click(() => {
                                var ic = $("#selc_car").val().slice(0, 1);
                                console.log(car[ic].car_parts)

                                if (car[ic].car_parts == "") {
                                    console.log("yessssssss")

                                    var validSpare = ` <div id="valid_spare_part" style="text-align: center">
                                        <span class="mt-2" style="font-size: 1.2rem;font-weight: 500">لا يوجد قطعة غيار لهذه
                                            السيارة</span>
                                            </div>`

                                    $("#valid_spare_part").remove();
                                    $("#itemes_spare_part").append(validSpare)
                                } else {
                                    console.log("nooooooooooo")

                                    console.clear();
                                    console.log($("#sel_spare_part1").val())
                                    console.log("data spare Part car", "#".repeat(12))
                                    console.log("data spare Part car", "#".repeat(12))


                                    var sparePart = [];
                                    console.log("sparePartfffff", sparePart)

                                    $(car[ic].car_parts).each((eleP, valP) => {

                                        console.log("SPARE PART", car[ic]
                                            .car_parts[eleP])
                                        console.log("SPARE PART name", valP
                                            .name)
                                        console.log("SPARE PART id", valP.id)
                                        console.log("###################");

                                        var sparePartt =
                                            `<option value='${valP.avg_car_part}_${valP.name}-${valP.id}'>${valP.name}</option>`;

                                        sparePart.push(sparePartt);
                                    })


                                    var new_sparePart = `<div class="item_spare_part" style="padding-bottom: 10px;border-bottom: 2px solid #d6d6d6;">
                                            <select name="spare_part${numI}" class="js-example-basic-single spare_part sel_spare_part" style="width: 100px !important;" id="sel_spare_part${numI}" required>
                                                ${def_spate_option}
                                                ${sparePart}
                                            </select>
                                            <div class="d-flex align-items-center col-md-12">
                                                <label class="col-md-4 tex-price" for="val_spare_part_price${numI}">سعر القطعة :</label>
                                                <input type="text" class="col-md-8 spare_part_price mt-1" id="val_spare_part_price${numI}" value="0" placeholder="0" readonly>
                                            </div>
                                            <div class="d-flex align-items-center col-md-12">
                                                <label class="col-md-4 tex-price" for="val_spare_part_count${numI}">عدد القطع :</label>
                                                <input type="number" class="col-md-8 spare_part_count mt-1" id="val_spare_part_count${numI}" placeholder="ادخل عدد قطع الغيار" >
                                            </div>

                                        </div>`;
                                    numI++;
                                    console.log("spareParteeeeeee", sparePart)
                                    $("#sel_spare_part").append(def_option);
                                    $("#itemes_spare_part").append(new_sparePart);

                                    $('.js-example-basic-single').select2({
                                        width: 'resolve'
                                    });
                                }

                                $(".item_spare_part").each((itemSpare, vallSpare) => {
                                    var seleSpare = `#${$(vallSpare).find(
                                        ".sel_spare_part").attr("id")}`;
                                    var sitPrice = `#${$(vallSpare).find(
                                        ".spare_part_price").attr("id")}`;
                                    var sitTotal = `#${$(vallSpare).find(
                                        ".spare_part_price").attr("id")}`;
                                    var removeSaper = `#${$(vallSpare).find(
                                        ".remove_spare_part").attr("id")}`;

                                    $(seleSpare).change(() => {

                                        var val_price = $(seleSpare)
                                            .val().split("_")[0];
                                        console.log("val_price",
                                            val_price)

                                        $(sitPrice).val(val_price);
                                        console.log("###########")

                                    })

                                    /* Remove Spare part Element */
                                    $(removeSaper).click(() => {


                                        console.log("vallSpare",
                                            vallSpare)
                                        console.log("#######")
                                        console.log($(removeSaper)
                                            .length)


                                        var removePrice =

                                            `#${$(removeSaper).parent().find(".spare_part_price").attr("id")}`;

                                        console.log("removePrice", $(
                                            removePrice).val())

                                        $(removeSaper).parent()
                                            .remove();
                                    })
                                })
                            })


                            /* Add Services */
                            var numI2 = 0;
                            $("#add_services").click(() => {
                                console.clear();
                                var new_services = `<div class="item_services">
                                    <input type="text" name="item_services_title${numI2}" class="item_services_title"
                                        id="val_services_title${numI2}" value="" placeholder="ادخل خدمة السيارة" required>
                                    <input type="number" name="services_price${numI2}" class="services_price"
                                        id="val_services_price${numI2}" value="" placeholder="ادخل سعر المصنعية" required>
                                    <i class="fa-regular fa-circle-xmark remove_item remove_services" id="remove_services${numI2}"></i>
                                    </div>`;
                                numI2++;
                                $("#items_services").append(new_services);

                                console.log($(".item_services").length)

                                $(".item_services").each((serviceEle, serviceVal) => {
                                    console.log("serviceEle", serviceEle)
                                    console.log("serviceVal", $(serviceVal)
                                        .attr("class"))

                                    var removeServices =
                                        `#${$(serviceVal).find(".remove_services").attr("id")}`;

                                    /* Remove Services Element */
                                    $(removeServices).click(() => {
                                        $(removeServices).parent()
                                            .remove();
                                    })
                                    console.log("removeServices",
                                        removeServices)
                                })
                            })

                            /* Show Cost Section */
                            $("#show_cost").click(() => {
                                console.clear();
                                $(".maintenances_price").removeClass("d-none");

                                var arrSparePrice = [];
                                var arrSerPrice = [];

                                var SparePartTotal_Price = $("#sparee_total_price");
                                var ServicesTotal_Price = $("#servicess_total_price");
                                var TotalPrice = $("#total_pricee");


                                /* Sort All Spare Part Price from Element  */
                                $(".spare_part_price").each((eleSS, valSS) => {
                                    var Spare_pricee = `#${$(valSS).attr("id")}`
                                    console.log("eleSS", eleSS)
                                    console.log("valSS", valSS)
                                    console.log("Spare_pricee", $(Spare_pricee)
                                        .val())

                                    /* Set All Price to Array Spare Part */
                                    arrSparePrice.push(parseInt($(Spare_pricee)
                                        .val()))

                                    console.log("SparePartTotal_Price", $(
                                        SparePartTotal_Price).val())

                                    console.log("arrSparePrice", arrSparePrice)
                                })

                                /* Sort All Services Price from Element  */
                                $(".services_price").each((elePP, valPP) => {
                                    var item_pricee = `#${$(valPP).attr("id")}`
                                    console.log("elePP", elePP)
                                    console.log("valPP", valPP)
                                    console.log("item_pricee", $(item_pricee)
                                        .val())

                                    /* Set All Price to Array Services */
                                    arrSerPrice.push(parseInt($(item_pricee)
                                        .val()))

                                    console.log("ServicesTotal_Price", $(
                                        ServicesTotal_Price).val())

                                    console.log("arrSerPrice", arrSerPrice)
                                })


                                /* Add Spare Part Price to Spare Total Price   */
                                var sumSpare = arrSparePrice.reduce((OldPriceSpare,
                                        NewPriceSpare) =>
                                    OldPriceSpare + NewPriceSpare, 0);

                                $(SparePartTotal_Price).val(sumSpare);

                                console.log("sumSpare", sumSpare)

                                /* Add Services Price to Services Price   */
                                var sumServices = arrSerPrice.reduce((OldPriceServices,
                                        NewPriceServices) =>
                                    OldPriceServices + NewPriceServices, 0);

                                $(ServicesTotal_Price).val(sumServices);

                                console.log("sumServices", sumServices)

                                /* Add Spare Part Price && Services Price To Total Price */
                                $(TotalPrice).val(parseInt($(SparePartTotal_Price)
                                    .val()) + parseInt($(ServicesTotal_Price)
                                    .val()))
                            })


                        },
                        error: function(xhr) {
                            console.log("noooo");
                        }

                    });
                }
            });

            /* Send Data About Maintenice  */

            $("#send_maintenice").click(() => {
                console.clear();
                var category_Name = $("#category").val().slice(0, 1);
                var car_Name = $("#selc_car").val().slice(1, $("#selc_car").val().length);
                var disc_Maintenice = $("#desc_maintenances").val();
                /* ############# */
                var allSpareParts = [];
                var allServices = [];
                /* ############# */
                var spare_Prices = $("#sparee_total_price").val();
                var services_Prices = $("#servicess_total_price").val();
                var maintenice_Prices = $("#total_pricee").val();
                /* ############# */
                /* Sort All Spare Name && Price */
                $(".item_spare_part").each((ii, ei) => {
                    var SpareVal = `#${$(ei).find(
                                        ".sel_spare_part").attr("id")}`;
                    var SparePrice = `#${$(ei).find(
                                        ".spare_part_price").attr("id")}`;
                    var SpareCount = `#${$(ei).find(
                                        ".spare_part_count").attr("id")}`;
                    /* ########## */
                    var objSpare = {
                        id: ii,
                        car_part_id: $(SpareVal).val().split('-')[1],
                        sparePartPrice: $(SparePrice).val(),
                        sparePartCount: $(SpareCount).val(),
                    };
                    allSpareParts.push(objSpare)
                    console.log(objSpare)
                })
                console.log("###############")
                /* Sort All Services Name && Price */
                $(".item_services").each((iS, eS) => {
                    var ServicesVal = `#${$(eS).find(
                                        ".item_services_title").attr("id")}`;
                    var ServicesPrice = `#${$(eS).find(
                                        ".services_price").attr("id")}`;
                    /* ########## */
                    var objServices = {
                        id: iS,
                        servicesName: $(ServicesVal).val(),
                        servicesPrice: $(ServicesPrice).val(),
                    };
                    allServices.push(objServices)
                    console.log(objServices)
                })
                console.log("###############")

                var obj = {
                    category: category_Name,
                    car: car_Name,
                    description: disc_Maintenice,
                    sparePart: allSpareParts,
                    services: allServices,
                    totalSparePrice: spare_Prices,
                    totalServicesPrice: services_Prices,
                    maintenances_price: maintenice_Prices,
                }

                console.log("Data", obj)


                $.ajax({
                    method: "POST",
                    url: "{{ route('addMaintenance') }}",
                    data: obj,
                    success: function(data) {
                        console.log(data);
                    }
                });




            })
        });
</script>
@endsection
@endsection