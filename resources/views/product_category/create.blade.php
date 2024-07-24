@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card rounded shadow p-4">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="mb-3">
                        Tambah Data
                    </h5>

                    <a href="{{ url('kategori-produk') }}">
                        <button type="button" class="btn btn-secondary">
                            <i class="menu-icon tf-icons ti ti-arrow-left"></i>
                            Kembali
                        </button>
                    </a>
                </div>

                <form class="mb-3" id="formSubmit" method="POST" action="javascript:void(0)"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">
                                    Nama
                                </label>

                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukan Nama" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="description">
                                    Deskripsi
                                </label>

                                <textarea class="form-control" name="description" id="description" placeholder="Masukan Deskripsi" autocomplete="off"
                                    cols="30" rows="5"></textarea>
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
        </div>
    </div>
@endsection

@section('custom_js')
    {{-- * Custom JS --}}
    <script src="{{ asset('assets/custom/product_category/create.js') }}"></script>
@endsection
