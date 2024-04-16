@extends('layouts.header')
@section('title', 'Post Detail')
@section('content')

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mx-5">
    <ol class="bc breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('homeUser')}}">Home</a></li>
        <li class="breadcrumb-item active">Post</li>
        <li class="breadcrumb-item active">{{$post->postType->name}}</li>
        <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
    </ol>
</nav>

<article class="blog-post mx-5 my-5">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">
    @if ($post->updated_at)
        {{ $post->updated_at->format('M d, Y') }}
        <span style="font-size:12pt">&nbsp; |
            {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</span>
    @else
        - ไม่ระบุวันที่ -
    @endif 
    by {{ Auth::check() && Auth::user()->user_type == 1 ? Auth::user()->name : 'Wimandin Spa Admin' }}</p>

    <hr>
    <p>{!! $post->content !!}</p>
    
  </article>


  <script src={{asset("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js")}}
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"></script>

@endsection