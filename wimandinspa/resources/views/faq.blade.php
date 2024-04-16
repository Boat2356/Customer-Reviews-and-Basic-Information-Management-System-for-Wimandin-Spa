@extends('layouts.header')
@section('title', 'FAQ')
@section('content')
    <section class="container question-section">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="bc breadcrumb">
                <li class="breadcrumb-item link"><a href="{{route('homeUser')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">FAQ</li>
            </ol>
        </nav>

        <h1 class="page-title">FAQ</h1>
        <h2 class="page-subtitle">คำถามที่พบบ่อย</h2>

        @foreach ($faqs as $faq)
        @if ($faq->status == 1)    
        
        <div class="question-article mt-5">
            <p class="question-link">{{$faq->question}} ?</p>
            <p class="answer-text">{{$faq->answer}}</p>
        </div>
        @endif
        @endforeach        
        
        <div class = "card-footer pb-0">
            {{ $faqs->links() }}
        </div>
    </section>
    
    
    <!--
    <nav aria-label="Page navigation example ">
        <ul class="pagination d-flex justify-content-center mt-5">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    -->
    
    
    <section class="contact-container container">
        @foreach ($contacts as $contact)
        @if($contact->status == 1)
        <header class="contact-title">Contact</header>
        <p class="contact-subtitle">ช่องทางการติดต่อ</p>
        <section class="contact-info">
            <div class="contact-details">
                <div class="contact-label">ที่ตั้ง:</div>
                <div class="contact-text">{{ $contact->address}}</div>
            </div>
            <div class="contact-details">
                <div class="contact-label">เวลาเปิดร้าน:</div>
                <div class="contact-text">{{ $contact->openTime}}</div>
            </div>
            <div class="contact-details">
                <div class="contact-label ">ช่องทางการติดต่อ:</div>
            </div>
            <div class="contact-socials">
                <img loading="lazy"
                    src={{ asset("https://cdn.builder.io/api/v1/image/assets/TEMP/58386924fdca281d64e6dc5a687b351a337a03782a0233496a18643b2c03b942?apiKey=37189c57caf0427ab2f296460ec4dc93&") }}
                    class="image-icon" alt="Contact Phone Icon">
                <div class="contact-text">{{ $contact->phone}}</div>
            </div>
            <div class="contact-socials">
                <img loading="lazy"
                    src={{ asset("https://cdn.builder.io/api/v1/image/assets/TEMP/b851e363cef32261daf2ae0bfa816918446ecf1eac8bec4327a6ca8478d90e9d?apiKey=37189c57caf0427ab2f296460ec4dc93&") }}
                    class="image-icon-small" alt="@Wimandinspa Instagram Icon">
                <div class="contact-text">{{ $contact->email}}</div>
            </div>
            <div class="contact-socials">
                <img loading="lazy"
                    src={{ asset("https://cdn.builder.io/api/v1/image/assets/TEMP/6feaac7fc868cebbfb9d89b1592ec3f2bbe041358f54f15278fe79e40c0f7491?apiKey=37189c57caf0427ab2f296460ec4dc93&") }}
                    class="image-icon-small" alt="วิมานดิน สปาขอนแก่น Facebook Icon">
                <div class="contact-text">{{ $contact->facebook}}</div>
            </div>
        </section>
        @else            
            
        @endif
        @endforeach
    </section>



    <!-- ต้องก็อปลิ้งนี้ใส่ทุกหน้าด้วย -->
    <script src={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!--  -->
@endsection
