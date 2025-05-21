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

