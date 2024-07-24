@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card rounded shadow p-4">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="mb-3">
                        Ubah Data
                    </h5>

                    <a href="{{ url('produk') }}">
                        <button type="button" class="btn btn-secondary">
                            <i class="menu-icon tf-icons ti ti-arrow-left"></i>
                            Kembali
                        </button>
                    </a>
                </div>

                <form class="mb-3" id="formSubmit" method="POST" action="javascript:void(0)"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <input type="hidden" name="id" id="id" value="{{ $product->hash_id }}">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="productCategoryId">
                                    Kategori Produk
                                </label>

                                <select class="form-select select2" name="productCategoryId" id="productCategoryId">
                                    <option value="{{ $product->productCategory->hash_id }}">
                                        {{ $product->productCategory->name }}
                                    </option>

                                    @foreach ($productCategory as $row)
                                        @if ($row->hash_id != $product->productCategory->hash_id)
                                            <option value="{{ $row->hash_id }}">
                                                {{ $row->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">
                                    Nama
                                </label>

                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $product->name }}" placeholder="Masukan Nama" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="stock">
                                    Stok
                                </label>

                                <input type="text" class="form-control regex-number" name="stock" id="stock"
                                    value="{{ FormatterHelper::formatNumber($product->stock) }}"
                                    onkeyup="formatNumber(this)" placeholder="Masukan Stok" autocomplete="off">
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
    <script src="{{ asset('assets/custom/product/edit.js') }}"></script>
@endsection
