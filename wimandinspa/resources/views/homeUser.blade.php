@extends('layouts.header')
@section('title', 'Home')
@section('content')
    <!-- เนื้อหาในเว็บ -->
    <img src={{asset("image/home_im.png")}} class="card-img-top" alt="...">

    <p><br><br><br><br>
    <h1 class="text-center">ABOUT US</h1><br><br></p>

    <div class="box">
        <div class="home_r4_image">
            <img src={{asset("image/r4.jpg")}} alt="image">
        </div>
        <div class="card-center">
            <div class="card-body">
                <p class="card-text">วิมานดินของเราเป็นบริการด้านสุขภาพทางเลือกแบบองค์รวม ที่มีบริการ อบสมุนไพร แช่สมุนไพร
                    นวดแผนไทย สปาผิวกาย สปาผิวหน้า นวดอโรม่า นวดน้ำนมบำรุงผิว อื่นๆ บริการอาหารและเครื่องดื่ม
                    และเป็นศูนย์ฝึกอาชีพนวดแผนไทยและสปา
                    <br><br>Holistic Alternative Health Services
                    We offer a variety of holistic health services, including Herbal sauna and steam ,Thai massage , Body
                    spa ,
                    Facial
                    spa , Aromatherapy massage , Milk massage , Other services , Food and beverage services , Thai massage
                    and spa
                    training center
                </p>
            </div>
        </div>
        <div class="vdo">
            <video width="384" height="646" controls>
                <source src={{asset("image/video_wimandin.mp4")}} type="video/mp4">
            </video>
        </div>
    </div>

    <div class="th_page">
        <p><br><br><br><br>
        <h1 class="text-center">Treatment</h1><br><br></p>

    </div>
    <div class ="th_im">
        <img src={{asset("image/tm_all.png")}}>
    </div>

    <!--  -->






    <script src={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
