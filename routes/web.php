<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DevicePlayerController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\File;

use App\Events\PlaylistUpdated;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/devices',[DeviceController::class, 'index'])->name('devices');
    Route::get('/refresh-device/{deviceCode}', [DeviceController::class, 'refreshDevice']);

});

Route::get('/refresh/{code}', [PlaylistController::class, 'refresh'])->name('refresh');

Route::post('/generate-code', [DeviceController::class, 'generateDeviceCodeWithPin']);
Route::get('/device-player', [DevicePlayerController::class, 'index']);

Route::get('/api/css-files', function () {
    $files = File::allFiles(public_path('css'));
    $fileNames = collect($files)->map(function ($file) {
        return '/css/' . $file->getFilename();
    });
    return response()->json($fileNames);
});
