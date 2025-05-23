<?php

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\UsuarioController;

/**
 * Application routes.
 */

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', function (Request $request) {
    $rut = $request->input('rut');

    $usuario = Usuario::where('rut', $rut)->first();

    if (!$usuario) {
        return redirect()->route('usuarios.create')->with('error', 'El RUT no existe. Por favor, crea un usuario.');
    }

    session(['rut' => $rut]);

    $rol = Rol::where('rut', $rut)->first();

    if ($rol && $rol->administrador) {
        return redirect()->route('usuarios.index');
    }

    return redirect()->route('usuarios.show', $usuario->id);
});

Route::resource('usuarios', UsuarioController::class);
