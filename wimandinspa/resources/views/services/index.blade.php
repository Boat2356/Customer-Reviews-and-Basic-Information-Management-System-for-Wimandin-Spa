@extends('layouts.myapp')
@section('page', 'Services')
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
                    <h6>บริการทั้งหมด ({{ $services->count() }} รายการ)</h6>
                </div>
                <div class="position-absolute top-2 end-2">
                    <a href="{{ route('services.create') }}" class="btn btn-success px-3 py-2 mx-3"><i
                            class="fa fa-plus"></i> เพิ่มบริการ</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ชื่อ
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        รูปภาพ
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        รายละเอียด</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        ราคา (บาท)</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        ระยะเวลา</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        สถานะ</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        เครื่องมือ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>
                                            <p class="text-xs px-4 font-weight-bold mb-0">{{ $service->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $service->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $service->service_types->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class = "d-flex px-2 py-1"></div>
                                            <div>
                                                <img src="{{ $service->image_url == '' ? asset($service->image_path) : $service->image_url }}"
                                                    class="avartar avatar-sm me-3" alt = "user1" width="100px"
                                                    height="100px">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ Str::limit($service->description, 20) }}</h6>
                                                <p class="text-xs text-secondary mb-0"></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $service->price }}</h6>                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $service->duration }}</h6>                                                    
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($service->status == true)
                                                <a href="{{route('changeSs',$service->id)}}" class = "btn btn-success" onclick="return confirm('คุณต้องการเปลี่ยนสถานะหรือไม่?')">เผยแพร่</a>
                                            @else
                                                <a href="{{route('changeSs',$service->id)}}" class = "btn btn-warning" onclick="return confirm('คุณต้องการเปลี่ยนสถานะหรือไม่?')">ฉบับร่าง</a>
                                                
                                            @endif
                                        </td>


                                        <td class="align-middle">
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('services.edit', $service->id) }}"
                                                    class="btn btn-outline-success px-3 py-2"><i class="fa fa-pencil"></i>
                                                    แก้ไข</a>
                                                <button type="submit" class="btn btn-outline-danger px-3 py-2"
                                                    onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')"><i
                                                        class="fa fa-trash"></i> ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class = "card-footer pb-0">
                            {{ $services->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
