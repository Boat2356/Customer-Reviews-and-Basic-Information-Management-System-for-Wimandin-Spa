@extends('layouts.myapp')
@section('page', 'Dashboard')
@section('content')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }
    </style>
    <div class = "row">
        <div class = "col-12">
            <div class = "card mb-4">
                <div class="card-header pb-0">
                    <h4>Welcome to Admin Profile</h4>
                </div>

                <div class= "card-body px-50 pt-0 pb-2">


                    <div class="row d-inline justify-content-center align-items-center h-100">
                        <div class="col col-lg-10 mb-4 mb-lg-0">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="https://static.thenounproject.com/png/363640-200.png" alt="Avatar"
                                            class="img-fluid my-3" style="width: 80px;" />
                                        <h5>@auth{{ Auth::user()->name }}@endauth</h5>
                                        <p>Admin</p>
                                        <a href="{{ route('profile.edit') }}"><i class="far fa-edit mb-5"> Edit</i></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Information</h6>
                                            <hr class="mt-0 mb-4">
                                            @if (Auth::check())
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Name</h6>
                                                        <p class="text-muted">{{ Auth::user()->name }}</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Email</h6>
                                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Phone</h6>
                                                        <p class="text-muted">{{ Auth::user()->phone }}</p>
                                                    </div>
                                                </div>
                                            @else
                                                <p>Please <a href="{{ route('login') }}">login</a> to view this information.
                                                </p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
