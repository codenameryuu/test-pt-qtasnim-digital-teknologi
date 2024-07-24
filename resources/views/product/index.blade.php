@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card rounded shadow p-4">
            <div class="card-body">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        Tabel Produk
                    </h5>

                    <div class=" mb-3">
                        <a href="{{ url('produk/tambah-data') }}">
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
                                Nama Kategori
                            </th>

                            <th>
                                Stok
                            </th>

                            <th>
                                Transaksi Paling Banyak
                            </th>

                            <th>
                                Transaksi Paling Sedikit
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

@section('custom_js')
    {{-- * Custom JS --}}
    <script src="{{ asset('assets/custom/product/index.js') }}"></script>
@endsection
