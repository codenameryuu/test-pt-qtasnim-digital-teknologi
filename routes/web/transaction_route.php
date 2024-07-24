<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanel\TransactionController;

Route::group(
    [
        'as' => 'transaction.',
        'middleware' => ['auth'],
        'prefix' => 'transaksi',
    ],
    function () {
        Route::get('', [TransactionController::class, 'index'])
            ->name('index');

        Route::get('datatable', [TransactionController::class, 'datatable'])
            ->name('datatable');

        Route::get('cek-stok', [TransactionController::class, 'checkStock'])
            ->name('checkStock');

        Route::get('tambah-data', [TransactionController::class, 'create'])
            ->name('create');

        Route::post('tambah-data', [TransactionController::class, 'store'])
            ->name('store');

        Route::get('ubah-data/{id}', [TransactionController::class, 'edit'])
            ->name('edit');

        Route::put('ubah-data/{id}', [TransactionController::class, 'update'])
            ->name('update');

        Route::delete('hapus-data/{id}', [TransactionController::class, 'destroy'])
            ->name('destroy');
    }
);
