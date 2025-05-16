<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rut' => 'required|string|unique:usuarios,rut|max:20',
            'fecha_nacimiento' => 'required|date',
        ]);

        if (!$this->validarRut($request->rut)) {
            return redirect()->back()->withErrors(['rut' => 'El RUT ingresado no es válido.'])->withInput();
        }

        Usuario::create($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    private function validarRut($rut)
    {
        $rut = str_replace(['.', '-'], '', $rut);
        $cuerpo = substr($rut, 0, -1);
        $dv = strtoupper(substr($rut, -1));

        if (strlen($cuerpo) < 7) {
            return false;
        }

        $suma = 0;
        $multiplo = 2;

        for ($i = strlen($cuerpo) - 1; $i >= 0; $i--) {
            $suma += $cuerpo[$i] * $multiplo;
            $multiplo = $multiplo === 7 ? 2 : $multiplo + 1;
        }

        $resto = $suma % 11;
        $dvCalculado = $resto === 1 ? 'K' : ($resto === 0 ? '0' : 11 - $resto);

        return $dv == $dvCalculado;
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rut' => 'required|string|unique:usuarios,rut,' . $usuario->id . '|max:20',
            'fecha_nacimiento' => 'required|date',
        ]);

        if (!$this->validarRut($request->rut)) {
            return redirect()->back()->withErrors(['rut' => 'El RUT ingresado no es válido.'])->withInput();
        }

        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

   public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
