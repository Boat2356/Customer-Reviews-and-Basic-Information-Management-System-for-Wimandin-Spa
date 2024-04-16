@extends('layouts.myapp')
@section('page', 'ServiceTypes')
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
                    <h6>หมวดหมู่บริการทั้งหมด ({{ $service_types->count() }} รายการ)</h6>
                </div>
                <div class="position-absolute top-2 end-2">
                    <a href="{{ route('service_types.create') }}" class="btn btn-success px-3 py-2 mx-3 my-2"><i
                            class="fa fa-plus"></i> เพิ่มประเภทบริการ</a>
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
                                @foreach ($service_types as $service_type)
                                    <tr>
                                        <td>
                                            <p class="text-xs px-4 font-weight-bold mb-0">{{ $service_type->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div>
                                                    <img src="https://cdn-icons-png.flaticon.com/512/8119/8119629.png" class="avatar avatar-sm me-3"
                                                        alt="user1" width="40px" height="40px">
                                                </div>
                                                <p></p>
                                                <div class="d-flex px-3 flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $service_type->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <form action="{{ route('service_types.destroy', $service_type->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('service_types.edit', $service_type->id) }}"
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
