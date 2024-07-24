@extends('layouts.auth')

@section('content')
    <div class="card form-signin p-4 rounded shadow">
        <h5 class="mb-3 text-center">
            Login
        </h5>

        <form class="mb-3" id="formSubmit" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="email">
                            Email
                        </label>

                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email"
                            autocomplete="off">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="password">
                            Password
                        </label>

                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukan Password" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary w-100" id="btnSubmit">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('custom_js')
    {{-- * Custom JS --}}
    <script src="{{ asset('assets/custom/auth/login.js') }}"></script>
@endsection
