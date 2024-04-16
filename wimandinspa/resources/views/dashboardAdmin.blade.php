@extends('layouts.myapp')
@section('page', 'Dashboard')
@section('content')
    @php
        $posts = App\Models\Post::all();
        $services = App\Models\Services::all();
        $reviews = App\Models\Review::all();
        $rooms = App\Models\Room::all();
    @endphp
    <div class = "row">
        <div class = "col-12">
            <div class = "card mb-1">
                <div class="card-header pb-0 my-3">
                    <h5>Dashboard</h5>
                </div>
                <div class= "card-body px-3 pt-0 pb-3">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card" style="border:2px solid red">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">จำนวนโพสต์ทั้งหมด
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $posts->count() }} โพสต์
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card" style="border:2px solid blue">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">จำนวนบริการนวดทั้งหมด
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $services->count() }} บริการ
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card" style="border:2px solid green">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">จำนวนรีวิวทั้งหมด
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $reviews->count() }} คอมเมนต์
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card" style="border:2px solid brown">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-uppercase font-weight-bold">จำนวนห้องทั้งหมด
                                                </p>
                                                <h5 class="font-weight-bolder">
                                                    {{ $rooms->count() }} ห้อง
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
