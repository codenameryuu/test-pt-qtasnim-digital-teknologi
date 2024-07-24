@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card rounded shadow p-4">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="mb-3">
                        Ubah Data
                    </h5>

                    <a href="{{ url('transaksi') }}">
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
                        <input type="hidden" name="id" id="id" value="{{ $transaction->hash_id }}">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="productId">
                                    Produk
                                </label>

                                <select class="form-select select2" name="productId" id="productId"
                                    onchange="onChangeProductId()">
                                    <option value="{{ $transaction->product->hash_id }}">
                                        {{ $transaction->product->name }}
                                    </option>

                                    @foreach ($product as $row)
                                        @if ($row->hash_id != $transaction->product->hash_id)
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
                                <label class="form-label" for="quantity">
                                    Jumlah
                                </label>

                                <input type="text" class="form-control regex-number" name="quantity" id="quantity"
                                    onkeyup="formatNumber(this)"
                                    value="{{ FormatterHelper::formatNumber($transaction->quantity) }}"
                                    placeholder="Masukan Jumlah" autocomplete="off">
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
    <script src="{{ asset('assets/custom/transaction/edit.js') }}"></script>
@endsection
