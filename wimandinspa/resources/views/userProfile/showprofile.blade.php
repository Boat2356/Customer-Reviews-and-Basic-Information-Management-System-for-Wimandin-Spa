@extends('layouts.header')
@section('title', 'Profile')

@section('content')

    <link rel="stylesheet" href={{ asset('css/customer_profile.css') }}>
    

    <!-- เนื้อหาในเว็บ -->
    <div class="treatment-container container ">
        <!-- breadcrumb -->
    
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="bc breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('homeUser')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
    
        <!-- เนื้อหา  -->
    
        <main>
          <section class="profile-section">
            <div class="profile-info">
              <div class="review-content d-flex pt-5 justify-content-space-between">
                <img src="https://static.thenounproject.com/png/363640-200.png" alt="profile photo" class="profile-img">
    
                
    
              </div>
              <div class="bold-text vip">ข้อมูลส่วนตัว</div>
              <div><span class="bold-text px-1">ชื่อ:</span>@auth{{ Auth::user()->name }}@endauth</div>     
              @if (Auth::user()->user_type == 1)             
              
              <div><span class="bold-text">ตำแหน่ง:</span> แอดมิน</div>
              @else
              <div><span class="bold-text">ตำแหน่ง:</span> ลูกค้า</div>
              @endif
              <div><span class="bold-text">เบอร์โทรศัพท์:</span> {{ Auth::user()->phone}}</div>
              <div><span class="bold-text px-1">อีเมล:</span>@auth{{ Auth::user()->email }}@endauth</div>
              
              <div class="d-flex">
                <img src={{asset("image/Group.png")}} alt="pen" class="pen-img">
                <a href="{{route('profile.edit')}}" class="editja ps-1">แก้ไข</a>
              </div>
             
              <a href="{{route('logout')}}" class="action-btn d-block text-center pt-4">
                <button class="logout-btn btn btn-dark">ล็อกเอาท์</button></a>
              
            </div>
          </section>
        </main>
    
        
      </div>
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    




@endsection