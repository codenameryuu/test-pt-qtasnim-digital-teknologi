<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanel\DashboardController;

Route::group(
    [
        'as' => 'dashboard.',
        'middleware' => [],
        'prefix' => '',
    ],
    function () {
        Route::get('', [DashboardController::class, 'index'])
            ->name('index');
    }
);
