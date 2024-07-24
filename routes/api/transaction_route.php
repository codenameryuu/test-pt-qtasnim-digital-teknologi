<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TransactionApiController;

Route::group(
    [
        'as' => 'api.transaction.',
        'middleware' => ['throttle:global', 'auth:api'],
        'prefix' => 'transaction',
    ],
    function () {
        Route::get('', [TransactionApiController::class, 'index'])
            ->name('index');

        Route::get('{transaction_id}', [TransactionApiController::class, 'show'])
            ->name('show');

        Route::post('', [TransactionApiController::class, 'create'])
            ->name('create');

        Route::put('{transaction_id}', [TransactionApiController::class, 'update'])
            ->name('update');

        Route::delete('{transaction_id}', [TransactionApiController::class, 'destroy'])
            ->name('destroy');
    }
);
