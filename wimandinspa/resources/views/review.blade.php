@extends('layouts.header')
@section('title', 'Review')
@section('content')
    <!-- เนื้อหาในเว็บ -->
    <main class="content container">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="bc breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('homeUser') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Review</li>
            </ol>
        </nav>

        <div class="mb-5">
            <h1>Review</h1>
            <h2>รีวิว</h2>
            <p></p>
            @if (session('status'))
                <div class = "alert alert-success" role="alert">
                    <span class="alert-icon"><i class = "ni ni-like-2"></i></span>
                    <span class="alert-text"><Strong>Success!</Strong> {{ session('status') }} </span>
                </div>
            @endif
        </div>

        <section class="review-section">
            <article class="review">
                <div class="review-add">
                    <!-- <h4 class="text-center">เขียนรีวิว</h4> -->

                    @if (Auth::check())
                        <a class="d-block text-center" href="{{ route('reviewAdd') }}">
                            <button class="submit-btn btn btn-dark mt-4">เขียนรีวิว</button>
                        </a>
                    @else
                        <a class="d-block text-center" href="{{ route('login') }}">
                            <button class="submit-btn btn btn-dark mt-4">เขียนรีวิว</button>
                        </a>
                    @endif
                </div>

            </article>


            @foreach ($reviews as $review)
                <article class="review">
                    <div class="review-content d-flex ps-4">
                        <img src={{ asset('image/person-circle.svg') }} alt="Reviewer Avatar" class="reviewer-avatar">
                        
                        <p class="fw-bold mt-3 ps-2">{{ $review->users->name }}</p>

                    </div>
                    <div class = "px-5 mx-3 mb-1">
                        <span>
                            <!-- ใช้การ loop เพื่อแสดงดาวตามคะแนนที่ได้รับ -->
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star text-warning"></i>
                                @endif
                            @endfor
                            &nbsp;

                        </span>
                    </div>
                    @if ($review->created_at)
                        <span class="post-date">{{ $review->created_at->format('M d, Y') }}
                            <span style="font-size:10pt">|
                                {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                        </span>
                    @else
                        <span class="post-date">- ไม่ระบุวันที่ -</span>
                    @endif
                    <p class="mt-3">{{ $review->comment }}</p>
                    <p class="mt-3">
                        @if (is_array($review->image_path))
                            @foreach ($review->image_path as $image)
                                <img src="{{ asset($image) }}" width="200px" height="200px" alt="multiple image"
                                    style="margin-right: 10px;">
                            @endforeach
                        @endif
                    </p>

                </article>
                &nbsp;
            @endforeach

            <div class = "card-footer pb-0">
                {{ $reviews->links() }}
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
    </main>

    <!-- จบเนื้อหาในเว็บ -->

    <!-- ต้องก็อปลิ้งนี้ใส่ทุกหน้าด้วย -->
    <script src={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!--  -->
@endsection
