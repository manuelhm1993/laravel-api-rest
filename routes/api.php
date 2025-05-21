<?php

use App\Models\User;
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
    $data = [];
    $code = 200;
    
    if(is_numeric($min) && is_numeric($max)) {
        $random_number = random_int($min, $max);
        $data = ['random_number' => $random_number];
    }
    else 
    {
        $data = ['error' => 'El tipo de dato ingresado no es el correcto'];
        $code = 400;
    }

    return response()->json($data, $code);
});

Route::prefix('users')->group(function () {
    Route::get('/', function () {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    });

    Route::post('/', function (Request $request) {
        $data = $request->all();
        $data['password'] = '$2a$12$w6R6DlbSE.pl40v95bTyuuUofpqzxDvBlNUh2ka4JrYR3eKX3Xj8y'; //1234

        $user = User::create($data);
        
        return response()->json(['new-user' => $user], 200);
    });
});

Route::prefix('v2/users')->group(function () {
    Route::get('/', function () {
        $users = User::select('name', 'email')->get();
        return response()->json(['users' => $users], 200);
    });

    Route::post('/', function (Request $request) {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        
        return response()->json(['new-user' => $user], 200);
    });
});