@extends('layouts.header')
@section('title', 'Room')
@section('content')
<main class="container mb-5">
    <!-- breadcrumb -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="bc breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('homeUser')}}">Home</a></li>
        <li class="breadcrumb-item active">Service</li>
        <li class="breadcrumb-item active" aria-current="page">Room</li>
      </ol>
    </nav>

    <div class="mb-5">
      <h1>Room</h1>
      <h2>ห้อง</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($rooms as $room)            
    
      <div class="room_card col" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <div class="card h-100">
          <img src="{{ $room->image_url == '' ? asset($room->image_path) : $room->image_url }}" class="card-img-top" alt="...">
          <div class="room-text card-body text-center">            
            <p class="card-text">
            <h5 class="card-title">ชื่อห้อง : {{$room->name}}</h5>
            <h5 class="card-text d-inline mx-5 mb-2">ขนาด/ความจุ : {{$room->size}}</h5>
            &nbsp;
            <h3 class="card-title form-text text-left">รายละเอียด : {{$room->description}}</h3>
        </p>

          </div>
        </div>
      </div>
    @endforeach  

      
      
    </div>
  </main>


  <!-- Modal bootstrap -->
  <div class="popup-image modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <span class="close" data-bs-dismiss="modal" aria-label="Close">&times;</span>
    <div class="modal-dialog modal-dialog modal-dialog-centered">

      <div class="modal-content">
        <img src={{asset("image/r4.jpg")}} alt="...">
        <h5 class="card-title-popup text-center pt-3">Family size 1</h5>
        <p class="card-text-popup text-center">4 คน</p>


      </div>
    </div>
  </div>

  <!-- pop up เด้งขึ้นมาเมื่อกดดู detail -->
  <script>
    document.querySelectorAll('.room_card').forEach(roomCard => {
      roomCard.addEventListener('click', () => {
        const cardImage = roomCard.querySelector('img');
        const cardTitle = roomCard.querySelector('.card-title').innerText;        
        const cardText = roomCard.querySelector('.card-text').innerText;

        //เซ็ตเนื้อหาของ popup
        const popupImage = document.querySelector('.popup-image img');
        const popupTitle = document.querySelector('.popup-image .card-title-popup');
        const popupText = document.querySelector('.popup-image .card-text-popup');

        popupImage.src = cardImage.src;
        popupTitle.innerText = cardTitle;
        popupText.innerText = cardText;

        //แสดง popup
        document.querySelector('.popup-image').style.display = 'block';
      });
    });

    //กดปิด popup
    document.querySelector('.popup-image .close').addEventListener('click', () => {

      document.querySelector('.popup-image').style.display = 'none';
    });
  </script>


<!-- ต้องก็อปลิ้งนี้ใส่ทุกหน้าด้วย -->
<script src={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<!--  -->
@endsection