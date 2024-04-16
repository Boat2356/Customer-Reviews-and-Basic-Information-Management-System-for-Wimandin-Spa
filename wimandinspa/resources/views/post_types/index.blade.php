@extends('layouts.myapp')
@section('page', 'PostType')
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('status'))
                <div class = "alert alert-success" role="alert">
                    <span class="alert-icon"><i class = "ni ni-like-2"></i></span>
                    <span class="alert-text"><Strong>Success!</Strong> {{ session('status') }} </span>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>หมวดหมู่โพสต์ทั้งหมด ({{ $post_types->count() }} รายการ)</h6>
                </div>
                <div class="position-absolute top-4 end-4">
                    <a href="{{ route('post_types.create') }}" class="btn btn-success px-3 py-2 mx-3 my-2"><i
                            class="fa fa-plus"></i> เพิ่มประเภทโพสต์</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weightbolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weightbolder opacity-7">หมวดหมู่
                                    </th>

                                    <th
                                        class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post_types as $post_type)
                                    <tr>
                                        <td>
                                            <p class="text-xs px-4 font-weight-bold mb-0">{{ $post_type->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div>
                                                    <img src="img/blog_category.png" class="avatar avatar-sm me3"
                                                        alt="user1">
                                                </div>
                                                <p></p>
                                                <div class="d-flex px-3 flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $post_type->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <form action="{{ route('post_types.destroy', $post_type->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('post_types.edit', $post_type->id) }}"
                                                    class="btn btn-outline-success px-3 py-2"><i class="fa fa-pencil"></i>
                                                    แก้ไข</a>

                                                <button type="submit" class="btn btn-outline-danger px-3 py-2"
                                                    onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')"><i
                                                        class="fa fa-trash"></i> ลบ
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
