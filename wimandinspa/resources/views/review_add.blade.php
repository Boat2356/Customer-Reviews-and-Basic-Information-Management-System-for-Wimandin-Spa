@extends('layouts.header')
@section('title', 'Review Add')
@section('content')
<div class="treatment-container container ">

    <!-- breadcrumb -->

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="bc breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('homeUser')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('review')}}">Review</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Review</li>
      </ol>
    </nav>

    <!-- เนื้อหา -->

    <!-- <h1 class="text-center">เขียนรีวิว</h1><br><br></p> -->
    <!-- <main>
        <article class="review-section">
          <img src="../image/person-circle.svg" alt="Reviewer Avatar" class="reviewer-avatar">
          <p class="fw-bold mt-3 ps-2">สมใจ ใจดี</p>

            <h2>Review for Wimandin Spa</h2>
            <div class="review-comment">คุณจะแนะนำอะไรเกี่ยวกับ วิมานดิน สปา...</div>
            <div class="action-buttons">
                <a href="./customer_review.html" class="action-btn">ยกเลิก</a>
                <button class="button">บันทึก</button>
            </div>
        </article>
    </section>
</main> -->

    <main>
      <section class="review-section">
        <div class="card-body p-4">

            <h4 class="mb-0 py-3 my-0">แสดงความคิดเห็น <i class="fas fa-pencil-alt ms-2"></i>
            </h4>
            <!--<p class="fw-light mb-4 pb-2">รีวิวทั้งหมด ({//{ $review->count() }} รายการ)</p> -->

            <div class="d-flex flex-start">

                <form role="form" method="post" enctype="multipart/form-data" id="post-form"
                    action="{{ route('reviews.store') }}">
                    @csrf
                    <img class="rounded-circle shadow-1-strong me-3"
                        src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar"
                        width="60" height="60" />
                    
                    <div>                                               
                                                                           
                                                                      
                                                                                               
                        
                        <div class="d-flex align-items-center mb-0"></div>

                        <div class="form-group mb-0 mt-0 @error('rating') has-danger @enderror">
                            <label for="rate" class="form-control-label"></label>
                            <div class="rate">
                                <input type="radio" id="star5" name="rating"
                                    value="5"><label for="star5"
                                    title="5 stars"></label>
                                <input type="radio" id="star4" name="rating"
                                    value="4"><label for="star4"
                                    title="4 stars"></label>
                                <input type="radio" id="star3" name="rating"
                                    value="3"><label for="star3"
                                    title="3 stars"></label>
                                <input type="radio" id="star2" name="rating"
                                    value="2"><label for="star2"
                                    title="2 stars"></label>
                                <input type="radio" id="star1" name="rating"
                                    value="1"><label for="star1" title="1 star"></label>
                            </div>
                            @error('rating')
                                <p class="text-red text-sm p-1" style="color:red">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-9">
                            <label for="image_path" class="form-control-label">รูปภาพ (upload)</label>
                            <input class="form-control" type="file" multiple name="image_path[]" id="image_path">
                        </div>

                        </p>
                        <p class="py-0">
                        <div class="form-group @error('comment') has-danger @enderror">
                            <label for="comment"
                                class="form-control-label my-2">แสดงความคิดเห็น</label>
                            <textarea name="comment" id="comment" cols="30" rows="10"
                                class="form-control @error('comment') is-invalid @enderror"></textarea>
                            @error('comment')
                                <p class="text-red text-sm p-1" style="color:red">
                                    {{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group py-3">
                            <button type="submit" class="btn btn-success px-3 py-2"><i
                                    class="fa fa-save"></i>
                                บันทึก</button>
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
        
      </section>
    </main>




    <!-- จบเนื้อหา -->


  </div>


  <script src={{asset("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js")}}
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


@endsection