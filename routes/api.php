<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('test')->group(function () {
    Route::get('/', function () {
        return 'Hola Manuel';
    });

    Route::post('/{name}', function ($name) {
        return "Usuario guardado: {$name}";
    });

    Route::put('/{name}', function ($name) {
        return "Usuario actualizado: {$name}";
    });

    Route::patch('/{name}', function ($name) {
        return "Usuario actualizado: {$name}";
    });

    Route::delete('/{name}', function ($name) {
        return "Usuario borrado: {$name}";
    });
});

Route::get('random/{min}/{max}', function ($min, $max) {
    $random_number = random_int($min, $max);
    $data = ['random_number' => $random_number];

    return response()->json($data, 200);
});