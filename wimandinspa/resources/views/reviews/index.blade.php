@extends('layouts.myapp')
@section('page', 'Show Reviews')
@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card mb-4">

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <section style="background-color: #ffffff;">
                            <div class="container my-0 py-3">
                                <h4 class="mb-0">รีวิวทั้งหมดจากลูกค้า <i class="fas fa-pencil-alt ms-2"></i>
                                </h4>
                                <p class="fw-light mb-4 pb-2">รีวิวทั้งหมด ({{ $reviews->count() }} รายการ)</p>

                                <div class="row d-flex justify-content-center">

                                    @foreach ($reviews as $review)
                                        <div class="card-body p-4">

                                            <div class="d-flex flex-start">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar"
                                                    width="60" height="60" style="">

                                                <div>

                                                    <h6 class="fw-bold mb-1">{{ $review->users->name }}</h6>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <p class="fw-light mb-0">
                                                            <!-- ใช้การ loop เพื่อแสดงดาวตามคะแนนที่ได้รับ -->
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <i class="fas fa-star text-warning"></i>
                                                                @else
                                                                    <i class="far fa-star text-warning"></i>
                                                                @endif
                                                            @endfor
                                                            &nbsp;
                                                            @php
                                                                #$review->updated_at = Carbon\Carbon::now();
                                                            @endphp
                                                            @if ($review->created_at)
                                                                {{ $review->created_at->format('M d, Y') }}
                                                                <span style="font-size:10pt">|
                                                                    {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                                                            @else
                                                                - ไม่ระบุวันที่ -
                                                            @endif
                                                            &nbsp;
                                                            @if ($review->status == true)
                                                                <span class="badge bg-primary px-3 py-2">
                                                                    <a href="{{ route('changeRS', $review->id) }}"
                                                                        class="text-white"
                                                                        onclick="return confirm('คุณต้องการเปลี่ยนสถานะหรือไม่?')">เผยแพร่</a>
                                                                </span>
                                                            @else
                                                                <span class="badge bg-primary px-3 py-2">
                                                                    <a href="{{ route('changeRS', $review->id) }}"
                                                                        class="text-white"
                                                                        onclick="return confirm('คุณต้องการเปลี่ยนสถานะหรือไม่?')">ฉบับร่าง</a>
                                                                </span>
                                                            @endif
                                                        <form action="{{ route('reviews.destroy', $review->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                class="btn btn-outline-danger px-2 py-1 mx-2 my-1"
                                                                onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')"><i
                                                                    class="fa fa-trash px-2"></i> ลบ</button>
                                                        </form>
                                                        <!--<span class="badge bg-primary">Pending</span> -->
                                                        </p>
                                                    </div>

                                                    @if (is_array($review->image_path))
                                                        @foreach ($review->image_path as $image)
                                                            <img src="{{ asset($image) }}" width="200px" height="200px"
                                                                alt="multiple image" style="margin-right: 10px;">
                                                        @endforeach
                                                    @endif
                                                    <p class="py-3">{{ $review->comment }}</p>


                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<hr width=30% size=2 color=black>-->
                                    @endforeach
                                </div>
                                <div class = "card-footer pb-0">
                                    {{ $reviews->links() }}
                                </div>

                            </div>
                        </section>


                    </div>
                </div>
                

            </div>
        </div>
    </div>

@endsection
