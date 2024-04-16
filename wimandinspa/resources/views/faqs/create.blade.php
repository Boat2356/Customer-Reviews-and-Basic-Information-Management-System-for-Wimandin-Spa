@extends('layouts.myapp')
@section('page', 'Create FAQ')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>เพิ่ม FAQ</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" method="post" enctype="multipart/form-data" id="post-form"
                        action="{{ route('faqs.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col">

                                <div class="form-group @error('question') has-danger @enderror">

                                    <label for="question" class="form-control-label">คำถาม
                                    </label>
                                    <input class="form-control @error('question') is-invalid @enderror" type="text"
                                        value="" name="question" id="question">
                                    @error('question')
                                        <p class="text-red text-sm p-1" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group @error('answer') has-danger @enderror">

                                    <label for="answer" class="form-control-label">คำตอบ
                                    </label>
                                    <input class="form-control @error('answer') is-invalid @enderror" type="text"
                                        value="" name="answer" id="answer">
                                    @error('answer')
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
            <div class="card-footer pb-0">
            </div>
        </div>
    </div>
    </div>
@endsection
