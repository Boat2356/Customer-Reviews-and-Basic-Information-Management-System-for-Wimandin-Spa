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
                                        <h4 class="mb-0">Recent comments</h4>
                                        <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>

                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">{{ $reviews->users->name }}</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        {{ $reviews->updated_at->format('M d, Y') }}
                                                        {{ Carbon\Carbon::parse($reviews->updated_at)->diffForHumans()}}                                                     
                                                        &nbsp;
                                                        @if ($reviews->status == true)
                                                            <span class="badge bg-primary px-3 py-2">
                                                                <a href="{{ route('changeRS', $reviews->id) }}" class="text-white"
                                                                >เผยแพร่</a>
                                                            </span>
                                                        @else
                                                            <span class="badge bg-primary px-3 py-2">
                                                                <a href="{{ route('changeRS', $reviews->id) }}" class="text-white"
                                                                    >ฉบับร่าง</a>
                                                            </span>
                                                        @endif
                                                        <!--<span class="badge bg-primary">Pending</span> -->
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    <img src="https://5.imimg.com/data5/UJ/WF/MY-28143547/thai-body-massage-services-500x500.png"
                                                        width="140px" height="140px">
                                                <p class="py-3">{{ $reviews->comment }}</p>

                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-0" />

                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">Lara Stewart</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        March 15, 2021
                                                        <span class="badge bg-success">Approved</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="text-success"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-danger"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                                    has roots in a piece of classical Latin literature from 45 BC, making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                                    the cites.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-0" style="height: 1px;" />

                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">Alexa Bennett</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        March 24, 2021
                                                        <span class="badge bg-danger">Rejected</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    There are many variations of passages of Lorem Ipsum available, but the
                                                    majority have suffered alteration in some form, by injected humour, or
                                                    randomised words which don't look even slightly believable. If you are
                                                    going to use a passage of Lorem Ipsum, you need to be sure.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-0" />

                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(24).webp"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">Betty Walker</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        March 30, 2021
                                                        <span class="badge bg-primary">Pending</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    It uses a dictionary of over 200 Latin words, combined with a handful of
                                                    model sentence structures, to generate Lorem Ipsum which looks
                                                    reasonable. The generated Lorem Ipsum is therefore always free from
                                                    repetition, injected humour, or non-characteristic words etc.
                                                </p>
                                            </div>
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
