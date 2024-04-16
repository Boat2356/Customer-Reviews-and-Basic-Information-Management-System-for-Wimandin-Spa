@extends('layouts.myapp')
@section('page', 'Create Room')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>เพิ่ม Room</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" method="post" enctype="multipart/form-data" id="post-form"
                        action="{{ route('rooms.update',$rooms->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">

                                <div class="form-group @error('name') has-danger @enderror">

                                    <label for="name" class="form-control-label">ชื่อห้อง
                                    </label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        value="{{$rooms->name}}" name="name" id="name">
                                    @error('name')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class = "col">
                                <div class="form-group @error('size') has-danger @enderror">

                                    <label for="size" class="form-control-label">จำนวนคน/ห้อง
                                    </label>
                                    <input class="form-control @error('size') is-invalid @enderror" type="text"
                                        value="{{$rooms->size}}" name="size" id="size">
                                    @error('size')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="image_url" class="form-control-label">รูปภาพ
                                    (url)</label>
                                <input class="form-control" type="text" value="{{$rooms->image_url}}" name="image_url" id="image_url">
                            </div>
                            <div class="col-6">
                                <label for="image_path" class="form-control-label">รูปภาพ
                                    (upload)</label>
                                <input class="form-control" type="file" value="{{asset($rooms->image_path)}}" name="image_path" id="image_path">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group @error('description') has-danger @enderror">

                                    <label for="description" class="form-control-label">รายละเอียด
                                    </label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control @error('description') is-invalid @enderror">{{$rooms->description}}</textarea>                                   
                                    @error('description')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
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
    </div>
    </div>
@endsection
