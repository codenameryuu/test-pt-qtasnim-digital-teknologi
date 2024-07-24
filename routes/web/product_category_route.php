<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanel\ProductCategoryController;

Route::group(
    [
        'as' => 'product-category.',
        'middleware' => ['auth'],
        'prefix' => 'kategori-produk',
    ],
    function () {
        Route::get('', [ProductCategoryController::class, 'index'])
            ->name('index');

        Route::get('datatable', [ProductCategoryController::class, 'datatable'])
            ->name('datatable');

        Route::get('tambah-data', [ProductCategoryController::class, 'create'])
            ->name('create');

        Route::post('tambah-data', [ProductCategoryController::class, 'store'])
            ->name('store');

        Route::get('ubah-data/{id}', [ProductCategoryController::class, 'edit'])
            ->name('edit');

        Route::put('ubah-data/{id}', [ProductCategoryController::class, 'update'])
            ->name('update');

        Route::delete('hapus-data/{id}', [ProductCategoryController::class, 'destroy'])
            ->name('destroy');
    }
);
