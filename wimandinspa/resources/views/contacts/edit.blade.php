@extends('layouts.myapp')
@section('page', 'Edit Contact')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>แก้ไขช่องทางการติดต่อ</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" method="post" enctype="multipart/form-data" id="post-form"
                        action="{{ route('contacts.update',$contacts->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">

                                <div class="form-group @error('address') has-danger @enderror">
 
                                    <label for="address" class="form-control-label">ที่อยู่ของร้าน
                                    </label>
                                    <input class="form-control @error('address') is-invalid @enderror" type="text"
                                        value="{{ $contacts->address }}" name="address" id="address">
                                    @error('address')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group @error('openTime') has-danger @enderror">
                                    <label for="openTime" class="form-control-label">เวลาเปิด-ปิดของร้าน
                                    </label>
                                    <input class="form-control @error('openTime') is-invalid @enderror" type="text"
                                        value="{{ $contacts->openTime }}" name="openTime" id="openTime">
                                    @error('openTime')
                                        <p class="text-red text-sm p-1" style="color:red"> {{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group @error('phone') has-danger @enderror">

                                    <label for="phone" class="form-control-label">เบอร์โทรศัพท์
                                    </label>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                        value="{{ $contacts->phone }}" name="phone" id="phone">
                                    @error('phone')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group @error('email') has-danger @enderror">
                                    <label for="email" class="form-control-label">อีเมล
                                    </label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        value="{{ $contacts->email }}" name="email" id="email">
                                    @error('email')
                                        <p class="text-red text-sm p-1" style="color:red"> {{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group @error('phone') has-danger @enderror">

                                    <label for="phone" class="form-control-label">เฟสบุ๊ค
                                    </label>
                                    <input class="form-control @error('facebook') is-invalid @enderror" type="text"
                                        value="{{ $contacts->facebook }}" name="facebook" id="facebook">
                                    @error('facebook')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group @error('line') has-danger @enderror">
                                    <label for="line" class="form-control-label">ไลน์
                                    </label>
                                    <input class="form-control @error('line') is-invalid @enderror" type="text"
                                        value="{{ $contacts->line }}" name="line" id="line">
                                    @error('line')
                                        <p class="text-red text-sm p-1" style="color:red"> {{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa fa-save"></i>
                                        บันทึก</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            <div class="card-footer pb-0">
            </div>
        </div>
    </div>
    </div>
@endsection
