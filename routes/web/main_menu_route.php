<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanel\MainMenuController;

Route::group(
    [
        'as' => 'main-menu.',
        'middleware' => ['auth'],
        'prefix' => 'menu-utama',
    ],
    function () {
        Route::get('', [MainMenuController::class, 'index'])
            ->name('index');
    }
);
