@extends('layouts.header')
@section('title', 'Treatment')
@section('content')
    <!-- เนื้อหาในเว็บ -->



    <div class="treatment-container container ">



        <!-- เนื้อหา treatment -->

        <div class="treatment-container container mb-5">
            <!-- breadcrumb -->

            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="bc breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homeUser') }}">Home</a></li>
                    <li class="breadcrumb-item active">Service</li>
                    <li class="breadcrumb-item active" aria-current="page">Treatment</li>
                </ol>
            </nav>

            <!-- เนื้อหา treatment -->


            <section class="treatment-section ">
                <h1>Treatment</h1>
                <h2>ทรีทเม้นท์</h2>

                <div class="select-dropdown">

                    <select onchange="showDivs(this)" id="showDiv" onfocus="this.size=5;" onblur="this.size=0;"
                        onchange="this.size=1; this.blur()">
                        <option value="all" selected="">รายการทั้งหมด</option>
                        @foreach ($service_types as $service_type)
                            <option value="{{ $service_type->id }}">{{ $service_type->name }}</option>
                        @endforeach
                        <!--
                                                  <option value="treatment-menu_1">รายการนวดผ่อนคลาย</option>
                                                  <option value="treatment-menu_2">รายการมิกซ์อบสมุนไพร</option>
                                                  <option value="treatment-menu_3">รายการปรนนิบัติผิว</option>
                                                  <option value="treatment-menu_4">มิกซ์แอนแมทช์รายการนวดและปรนนิบัติผิว</option>
                                                  <option value="treatment-menu_5">รายการมินิทรีทเม้นท์</option> -->

                    </select>

                </div>

                <!-- dropdown รายการทั้งหมด -->
                @foreach ($service_types as $service_type)
                    <div id="treatment-menu_{{ $service_type->id }}" class="treatment-menu row" style="display: none;">
                        @foreach ($services as $service)
                            @if ($service->service_type_id == $service_type->id)
                                @if($service->status == 1)
                                <article class="treatment-item col-lg-4 col-md-4 col-sm-1">
                                    <div class="treatment-img">
                                        <img src="{{ $service->image_url == '' ? asset($service->image_path) : $service->image_url }}"
                                            alt="">
                                    </div>
                                    <div class="treatment-text">
                                        <h4>{{ $service->name }}</h4>
                                        <p class="text-xs text-secondary">ประเภท : {{ $service->service_types->name }}</p>
                                        <p>{{ $service->description }}</p>
                                        <span>ราคา: </span>
                                        <p class="inline"> {{ number_format($service->price, 0) }} บาท <br></p>
                                        <span>ระยะเวลา: </span>
                                        <p class="inline"> {{ $service->duration }}</p>
                                    </div>
                                </article>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endforeach


            </section>


        </div>


        <script>
            /*function showDivs(select) {
                                                var selectedValue = select.options[select.selectedIndex].value;
                                                var divs = document.getElementsByClassName("treatment-item");
                                                for (var i = 0; i < divs.length; i++) {
                                                    if (selectedValue === "all") {
                                                        divs[i].style.display = "block";
                                                    } else {
                                                        divs[i].style.display = "none";
                                                        if (divs[i].classList.contains(selectedValue)) {
                                                            divs[i].style.display = "block";
                                                        }
                                                    }
                                                }
                                            }*/

            function showDivs(select) {
                var selected = select.options[select.selectedIndex].value;
                var treatmentMenus = document.querySelectorAll('.treatment-menu');

                treatmentMenus.forEach(function(menu) {
                    if (menu.id === 'treatment-menu_' + selected || selected === 'all') {
                        menu.style.display = 'block';
                    } else {
                        menu.style.display = 'none';
                    }
                });
            }

            document.addEventListener("DOMContentLoaded", function() {
                var selectDropdown = document.getElementById('showDiv');
                selectDropdown.value = 'all'; // หรือเลือกค่าเริ่มต้นที่คุณต้องการแสดง
                showDivs(selectDropdown);
            });
        </script>


        <script src={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <!--  -->
    @endsection
