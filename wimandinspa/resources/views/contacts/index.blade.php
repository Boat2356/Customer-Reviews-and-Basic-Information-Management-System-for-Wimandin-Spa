@extends('layouts.myapp')
@section('page', 'FAQ')
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
                    <h6>ช่องทางติดต่อของร้านทั้งหมด ({{ $contacts->count() }} รายการ)</h6>
                </div>
                <div class="position-absolute top-2 end-2">
                    <a href="{{ route('contacts.create') }}" class="btn btn-success px-3 py-2 mx-3"><i class="fa fa-plus"></i>
                        เพิ่มช่องทางติดต่อ</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ทีอยู่
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        เบอร์โทรศัพท์
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        เวลาเปิด-ปิด
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        อีเมล</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        เฟสบุ๊ค</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        ไลน์</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        สถานะ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        เครื่องมือ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>
                                            <p class="text-xs px-4 font-weight-bold mb-0">{{ $contact->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ Str::limit($contact->address,20) }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $contact->phone }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $contact->openTime }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $contact->email }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $contact->facebook }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $contact->line }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($contact->status == true)
                                                <a href="{{ route('changeCS', $contact->id) }}" class = "btn btn-success"
                                                    onclick="return confirm('คุณต้องการเปลี่ยนสถานะหรือไม่?')">เผยแพร่</a>
                                            @else
                                                <a href="{{ route('changeCS', $contact->id) }}" class = "btn btn-warning"
                                                    onclick="return confirm('คุณต้องการเปลี่ยนสถานะหรือไม่?')">ฉบับร่าง</a>
                                            @endif
                                        </td>

                                        <td class="align-middle">
                                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('contacts.edit', $contact->id) }}"
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
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
