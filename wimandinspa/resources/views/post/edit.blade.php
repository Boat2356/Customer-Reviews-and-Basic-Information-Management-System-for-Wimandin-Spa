@extends('layouts.myapp')
@section('page','Edit Post')
@section('content')
    <div class="row">        
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>แก้ไขโพสต์</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" method="post" enctype="multipart/form-data" id="post-form"
                        action="{{ route('post.update',$post->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">              

                                <div class="form-group @error('title') has-danger @enderror" >

                                    <label for="title" class="form-control-label">ชื่อโพสต์
                                    </label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{$post->title}}" name="title" id="title">
                                    @error('title')
                                        <p class="text-red text-sm p-1" style="color:red" >{{ $message }}</p>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="form-group @error('post_type_id') has-danger @enderror">
                                    <label for="post_type_id" class="form-control-label">ประเภท</label>
                                    <select class="form-control @error('post_type_id') is-invalid @enderror" name="post_type_id" id="post_type_id">                                        
                                        <option value="">Choose an option</option>                                                                             
                                        @foreach ($ptypes as $pt)
                                            <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('post_type_id')
                                        <p class="text-red text-sm p-1" style="color:red">The post type field is required.</p>
                                @enderror
                                </div>
                                <script>
                                    document.getElementById('post_type_id').value = "{{ $post->post_type_id }}";
                                </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group @error('content') has-danger @enderror">
                                    <label for="content" class="form-control-label">เนื้อหาโพสต์
                                    </label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">
                                        {{$post->content}}
                                    </textarea>
                                    @error('content')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror

                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#content'), {
                                                ckfinder: {
                                                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                                                }                                                
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>

                                </div>
                                
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="image_url" class="form-control-label">รูปภาพ
                                    (url)</label>
                                <input class="form-control" type="text" value="{{$post->image_url}}" name="image_url" id="image_url">
                            </div>
                            <div class="col-6">
                                <label for="image_path" class="form-control-label">รูปภาพ
                                    (upload)</label>
                                <input class="form-control" type="file" value="{{$post->image_path}}" name="image_path" id="image_path">
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
