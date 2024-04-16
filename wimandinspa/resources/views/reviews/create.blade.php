@php
    use Illuminate\Database\Eloquent\Model;
    use App\Models\Review;
@endphp
@extends('layouts.myapp')
@section('page', 'Show Reviews')
@section('content')


    <div class="row">
        <div class="col-12">
            
            <div class="card mb-4">

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <section style="background-color: #ffffff;">
                            <div class="container my-0 py-0">

                                <div class="row d-flex justify-content-center">


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
                                                            class="form-control-label">แสดงความคิดเห็น</label>
                                                        <textarea name="comment" id="comment" cols="30" rows="10"
                                                            class="form-control @error('comment') is-invalid @enderror"></textarea>
                                                        @error('comment')
                                                            <p class="text-red text-sm p-1" style="color:red">
                                                                {{ $message }}</p>
                                                        @enderror

                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success px-3 py-2"><i
                                                                class="fa fa-save"></i>
                                                            บันทึก</button>
                                                    </div>
                                                </div>
                                                
                                            </form>

                                        </div>
                                    </div>


                                </div>


                            </div>
                        </section>


                    </div>
                </div>


            </div>
           
        </div>
    </div>

@endsection
