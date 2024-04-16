@extends('layouts.myapp')
@section('page', 'Edit PostType')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>แก้ไขหมวดหมู้โพสต์ใหม่</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" method="post" enctype="multipart/form-data" id="post-form"
                        action="{{ route('post_types.update',$post_types->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">              

                                <div class="form-group @error('name') has-danger @enderror" >

                                    <label for="name" class="form-control-label">ชื่อหมวดหมู้โพสต์
                                    </label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $post_types->name }}" name="name" id="name">
                                    @error('name')
                                        <p class="text-red text-sm p-1" style="color:red" >{{ $message }}</p>
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
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
