<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href={{ asset('image/logo.png') }}>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


    <!-- ต้องก็อป 2 ลิ้งนี้ใส่ทุกหน้า -->
    <link href={{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') }} rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/navbar.css') }}>
    <!--  -->

    <!-- ลิ้งนี้ให้เปลี่ยนตามไฟล์ของ css ของหน้านั้นๆ -->
    <link href={{ asset('css/style.css') }} rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/home.css') }}>
    <link rel="stylesheet" href={{ asset('css/review.css') }}>
    <link rel="stylesheet" href={{ asset('css/faq.css') }}>
    <link rel="stylesheet" href={{ asset('css/customer_sevice_treatment.css') }}>
    <link rel="stylesheet" href={{ asset('css/customer_sevice_room.css') }}>
    <link rel="stylesheet" href={{ asset('css/sevice_treatment.css') }}>
    <link rel="stylesheet" href={{ asset('css/customer_review.css') }}>
    <link rel="stylesheet" href={{ asset('css/customer_review_add.css') }}>
    <link rel="stylesheet" href={{ asset('css/customer_post_news.css') }}>
    <link rel="stylesheet" href={{ asset('css/post_news.css') }}>



</head>

<body>
    <!-- แถบเมนูบาร์ข้างบนสุด -->
    <nav class="site-header navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="logo navbar-brand" href="{{ route('homeUser') }}"><img src={{ asset('image/logo.png') }}
                    alt="logo"></a>
            <a class="navbar-brand text-white fw-bold" href="{{ route('homeUser') }}">Wimandin Spa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" navbar-wrapper collapse navbar-collapse justify-content-lg-end" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link text-white " aria-current="page" href="{{ route('homeUser') }}">Home</a>
                    </li>
                    <li class="drop1 nav-item dropdown ps-4">
                        <a class="nav-link dropdown-toggle text-white " href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Service
                        </a>
                        <ul class="drop-menu1 dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('service_treatment') }}">Treatment</a></li>
                            <li><a class="dropdown-item" href="{{ route('service_room') }}">Room</a></li>
                        </ul>
                    </li>

                    <li class="drop1 nav-item dropdown ps-4">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Post
                        </a>
                        <ul class="drop-menu1 dropdown-menu">

                            @php
                                use App\Models\PostType;
                                $post_types = App\Models\PostType::all();
                                $posts = App\Models\Post::all();
                            @endphp

                            @foreach ($post_types as $post_type)
                                <li><a class="dropdown-item"
                                        href="{{ route('showPost', $post_type->id) }}">{{ $post_type->name }}</a>
                                </li>
                            @endforeach



                            <!--
                            <li><a class="dropdown-item" href="./post_promotion.html">Promotion</a></li>
                            <li><a class="dropdown-item" href="./post_news.html">News</a></li>
                            -->
                        </ul>
                    </li>

                    <li class="nav-item ps-4">
                        <a class="nav-link text-white" href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link text-white" href="{{ route('review') }}">Review</a>
                    </li>
                </ul>
                <!--
                <div class="search-container">
                    <form class="d-flex mb-0" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="search-button">
                            <img src={//{ asset('image/search.svg') }} alt="Search" class="search-icon" />
                        </button>
                    </form>
                </div>
                -->
                @if (Auth::check())
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('image/person-circle.svg') }}" alt="profile">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('userprofile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div class="profile px-4">
                        <a href="{{ route('register') }}">
                            <img src="{{ asset('image/person-circle.svg') }}" alt="profile" width="50px" height="50px">
                        </a>
                    </div>
                @endif

            </div>

        </div>

    </nav>
    <!-- จบแถบเมนู -->

    <!-- เริ่มส่วนเนื้อหา -->
    @yield('content')
</body>

</html>
