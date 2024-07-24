@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card rounded shadow p-4">
            <div class="card-body">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Tabel Transaksi
                    </h5>

                    <div class=" mb-3">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <i class="menu-icon tf-icons ti ti-filter"></i>
                            Filter
                        </button>

                        <a href="{{ url('transaksi/tambah-data') }}">
                            <button type="button" class="btn btn-primary">
                                <i class="menu-icon tf-icons ti ti-plus"></i>
                                Tambah
                            </button>
                        </a>
                    </div>
                </div>

                <table class="table dt-responsive" id="datatable">
                    <thead class="text-center">
                        <tr>
                            <th>
                                No
                            </th>

                            <th>
                                Nama Produk
                            </th>

                            <th>
                                Nama Kategori Produk
                            </th>

                            <th>
                                Stok
                            </th>

                            <th>
                                Jumlah Terjual
                            </th>

                            <th>
                                Tanggal Transaksi
                            </th>

                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <form id="formSubmit" method="POST" action="javascript:void(0)">
        @method('delete')
        @csrf
    </form>
@endsection

@section('modal')
    <div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Filter
                    </h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="mb-3" id="formFilter" method="GET" action="javascript:void(0)"
                    enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="filterStartDate">
                                        Tanggal Awal
                                    </label>

                                    <input type="text" class="form-control custom-datepicker" name="filter[startDate]"
                                        id="filterStartDate" value="{{ $filter->startDate }}"
                                        placeholder="Masukan Tanggal Awal" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="filterEndDate">
                                        Tanggal Akhir
                                    </label>

                                    <input type="text" class="form-control custom-datepicker" name="filter[endDate]"
                                        id="filterEndDate" value="{{ $filter->endDate }}"
                                        placeholder="Masukan Tanggal Akhir" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>

                        <button type="submit" class="btn btn-primary" onclick="submitFilter()">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    {{-- * Custom JS --}}
    <script src="{{ asset('assets/custom/transaction/index.js') }}"></script>
@endsection
