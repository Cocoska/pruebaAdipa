<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <script src="{{ asset('js/validarRut.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Crear Usuario</h1>

    @if($errors->any())
        <div style="color: red;">
            <p>Por favor corrige los siguientes errores:</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
        </div>
        <div>
            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" value="{{ old('rut') }}" required onblur="validarRut(this)">
            @error('rut')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
        </div>
        <div>
            <label for="administrador">¿Es administrador?</label>
            <select id="administrador" name="administrador">
                <option value="0" selected>No</option>
                <option value="1">Sí</option>
            </select>
        </div>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>