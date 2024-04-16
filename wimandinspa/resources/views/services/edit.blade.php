@extends('layouts.myapp')
@section('page', 'Edit Services')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>เพิ่มบริการใหม่</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" method="post" enctype="multipart/form-data" id="post-form"
                        action="{{ route('services.update',$services->id) }}">
                        @method('PUT')
                        @csrf                        
                        <div class="row">
                            <div class="col">

                                <div class="form-group @error('name') has-danger @enderror">

                                    <label for="title" class="form-control-label">ชื่อบริการ
                                    </label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        value="{{$services->name}}" name="name" id="name">
                                    @error('name')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group @error('service_type_id') has-danger @enderror">
                                    <label for="service_type_id" class="form-control-label">ประเภท</label>
                                    <select class="form-control @error('service_type_id') is-invalid @enderror"
                                        name="service_type_id" id="service_type_id">
                                        <option value="">Choose an option</option>
                                        @foreach ($service_types as $service_type)
                                            <option value="{{ $service_type->id }}">{{ $service_type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_type_id')
                                        <p class="text-red text-sm p-1" style="color:red">The ServiceTypes field is required.</p>
                                    @enderror
                                </div>
                                <script>
                                    document.getElementById('service_type_id').value = "{{ $services->service_type_id }}";
                                </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group @error('description') has-danger @enderror">
                                    <label for="content" class="form-control-label">รายละเอียดบริการ
                                    </label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control @error('description') is-invalid @enderror">
                                    {{$services->description}}                                        
                                    </textarea>
                                    @error('description')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror                                    

                                </div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="col">

                                <div class="form-group @error('price') has-danger @enderror">

                                    <label for="price" class="form-control-label">ราคา
                                    </label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="text"
                                        value="{{$services->price}}" name="price" id="price">
                                    @error('price')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group @error('duration') has-danger @enderror">
                                    <label for="duration" class="form-control-label">ระยะเวลา
                                    </label>
                                    <input class="form-control @error('duration') is-invalid @enderror" type="text"
                                        value="{{$services->duration}}" name="duration" id="duration">
                                    @error('duration')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <label for="image_url" class="form-control-label">รูปภาพ
                                    (url)</label>
                                <input class="form-control" type="text" value="{{$services->image_url}}" name="image_url" id="image_url">
                            </div>
                            <div class="col-6">
                                <label for="image_path" class="form-control-label">รูปภาพ
                                    (upload)</label>
                                <input class="form-control" type="file" value="{{$services->image_path}}" name="image_path" id="image_path">                                                             
                                
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
