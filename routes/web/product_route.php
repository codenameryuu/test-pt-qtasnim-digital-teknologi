<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanel\ProductController;

Route::group(
    [
        'as' => 'product.',
        'middleware' => ['auth'],
        'prefix' => 'produk',
    ],
    function () {
        Route::get('', [ProductController::class, 'index'])
            ->name('index');

        Route::get('datatable', [ProductController::class, 'datatable'])
            ->name('datatable');

        Route::get('tambah-data', [ProductController::class, 'create'])
            ->name('create');

        Route::post('tambah-data', [ProductController::class, 'store'])
            ->name('store');

        Route::get('ubah-data/{id}', [ProductController::class, 'edit'])
            ->name('edit');

        Route::put('ubah-data/{id}', [ProductController::class, 'update'])
            ->name('update');

        Route::delete('hapus-data/{id}', [ProductController::class, 'destroy'])
            ->name('destroy');
    }
);
