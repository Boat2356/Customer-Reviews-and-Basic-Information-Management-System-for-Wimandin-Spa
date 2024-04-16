@extends('layouts.header')
@section('title', 'Treatment')
@section('content')
    <style>
        .popup-news .news-card-popup {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
            object-fit: cover;
            background-color: #fff;
            box-shadow: 1px 1px 4px rgb(0, 0, 0, 0.5);
            padding: 10px;
        }
        
    </style>   
    

    <main class="container mb-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="bc breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homeUser')}}">Home</a></li>
                <li class="breadcrumb-item active">Post</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post_types->name }}</li>
            </ol>
        </nav>

        <h1 class="font-sans text-decoration-underline">{{ $post_types->name }}</h1>
        &nbsp;
        <div class="row row-cols row-cols-md-2 g-4">




          @foreach ($posts as $post)
            @if($post->status == 1)
            <div class="news-card col">
                
                    <div class="news_con card">
                        <div class="news-text card-body pb-4">
                            <div class="profile d-inline-box align-items-center">
                                <img class="post-profile" src="../image/logo.png" alt="">
                                <p class="post-name fw-bold ps-2 pt-3 d-inline-flex">
                                    {{ Auth::check() && Auth::user()->user_type == 1 ? Auth::user()->name : 'Wimandin Spa Admin' }}
                                </p>
                                <p class="post-date card-text ps-1 text-body-secondary d-inline-flex mx-2">
                                    @if ($post->updated_at)
                                        {{ $post->updated_at->format('M d, Y') }}
                                        <span style="font-size:12pt">&nbsp; |
                                            {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</span>
                                    @else
                                        - ไม่ระบุวันที่ -
                                    @endif
                                </p>
                            </div>

                            <h5 class="post-title card-title fw-bold pt-3">{{ $post->title }}</h5>
                            <p class="post-content card-content px-3">{{Str::limit(strip_tags($post->content),100)}}</p>
                            <a href="{{ route('showPostDetail', ['post_type_id' => $post->postType->id, 'post_id' => $post->id]) }}" class = "px-3">อ่านเพิ่มเติม</a>
                            
                        </div>
                        <img src="{{ $post->image_url == '' ? asset($post->image_path) : $post->image_url }}"
                            class="news-img" alt="...">


                    </div>
                
            </div>
            @endif
            @endforeach
        </div>

        </div>



    </main>

    <!-- หน้าต่าง pop up -->
    <div class="popup-news">
        <span class="close">&times;</span>

        <div class="news-card-popup">
            <div class="news-text card-body ">
                <div class="profile d-flex align-items-center">
                    <img class="post-profile-popup" src="../image/logo.png" alt="">
                    <p class="post-name-popup fw-bold ps-2 pt-3">Wimandin Spa Admin</p>
                    <p class="post-date-popup card-text ps-4 text-body-secondary px-3">2 วันที่ผ่านมา</p>
                </div>

                <h5 class="card-title-popup fw-bold pt-3">แจ้งเรื่องคิวประจำวันที่ 10/02/2024</h5>
                <p class="card-text-popup pt-2">สำหรับวันนี้​ คิวเต็มทุกรอบแล้วนะคะ​
                    คุณลูกค้าสามารถติดต่อสอบถามสำรองคิวของวันถัดไปได้เลยยย~ค่ะ</p>
            </div>

            <img src="../image/n2.jpg" class="news-image-popup" alt="...">
        </div>
    </div>

    <!-- pop up เด้งขึ้นมาเมื่อกดดู detail -->
    <script>
        document.querySelectorAll('.news-card').forEach(newsCard => {
            newsCard.addEventListener('click', () => {
                const profileImage = newsCard.querySelector('.post-profile');
                const postName = newsCard.querySelector('.post-name').innerText;
                const postDate = newsCard.querySelector('.post-date').innerText;

                const cardImage = newsCard.querySelector('img.news-img');
                const cardTitle = newsCard.querySelector('.post-title').innerText;
                const cardText = newsCard.querySelector('.post-content').innerText;

                //เซ็ตเนื้อหาของ popup
                const popupImagePro = document.querySelector('.popup-news img.post-profile-popup');
                const popupTitle = document.querySelector('.popup-news .card-title-popup');
                const popupText = document.querySelector('.popup-news .card-text-popup');

                const popupImage = document.querySelector('.popup-news img.news-image-popup');
                const popupName = document.querySelector('.popup-news .post-name-popup');
                const popupDate = document.querySelector('.popup-news .post-date-popup');

                popupImage.src = cardImage.src;
                popupTitle.innerText = cardTitle;
                popupText.innerText = cardText;

                popupImagePro.src = profileImage.src;
                popupName.innerText = postName;
                popupDate.innerText = postDate;

                // แสดง popup
                document.querySelector('.popup-news').style.display = 'block';
            });
        });

        //กดปิด popup
        document.querySelector('.popup-news .close').addEventListener('click', () => {
            document.querySelector('.popup-news').style.display = 'none';
        });
    </script>


    <script src={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
