<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TelemetryController;

Route::prefix('telemetry')->group(function () {
    Route::get('/ddss', [TelemetryController::class, 'ddss']);
    Route::get('/smartmed', [TelemetryController::class, 'smartmed']);
    Route::get('/rosaflora', [TelemetryController::class, 'rosaflora']);
});

Route::post('/contact', [TelemetryController::class, 'contact']);