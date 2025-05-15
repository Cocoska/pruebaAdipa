<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Mostrar todos los registros
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar el formulario para crear un nuevo registro
    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar un nuevo registro
    public function store(Request $request)
    {
        // Validar los datos básicos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rut' => 'required|string|unique:usuarios,rut|max:20',
            'fecha_nacimiento' => 'required|date',
        ]);

        // Validar el RUT
        if (!$this->validarRut($request->rut)) {
            return redirect()->back()->withErrors(['rut' => 'El RUT ingresado no es válido.'])->withInput();
        }

        // Crear el usuario
        Usuario::create($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // Método para validar el RUT
    private function validarRut($rut)
    {
        $rut = str_replace(['.', '-'], '', $rut); // Elimina puntos y guión
        $cuerpo = substr($rut, 0, -1); // Parte numérica del RUT
        $dv = strtoupper(substr($rut, -1)); // Dígito verificador

        if (strlen($cuerpo) < 7) {
            return false; // RUT demasiado corto
        }

        $suma = 0;
        $multiplo = 2;

        for ($i = strlen($cuerpo) - 1; $i >= 0; $i--) {
            $suma += $cuerpo[$i] * $multiplo;
            $multiplo = $multiplo === 7 ? 2 : $multiplo + 1; // Reinicia a 2 después de 7
        }

        $resto = $suma % 11;
        $dvCalculado = $resto === 1 ? 'K' : ($resto === 0 ? '0' : 11 - $resto);

        return $dv == $dvCalculado;
    }

    // Mostrar el formulario para editar un registro existente
    public function edit(Usuario $usuario)
    {
        // Verifica si el usuario tiene permiso para editar su información
        // (en este caso, simplemente permitimos que edite su propio perfil)
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar un registro existente
    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rut' => 'required|string|unique:usuarios,rut,' . $usuario->id . '|max:20',
            'fecha_nacimiento' => 'required|date',
        ]);

        // Validar el RUT
        if (!$this->validarRut($request->rut)) {
            return redirect()->back()->withErrors(['rut' => 'El RUT ingresado no es válido.'])->withInput();
        }

        // Actualizar el usuario
        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Mostrar un registro específico
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    // Eliminar un registro
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
