<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información</title>
    <script src="{{ asset('js/validarRut.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Editar Información</h1>

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

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" required>
        </div>
        <div>
            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" value="{{ old('rut', $usuario->rut) }}" readonly onblur="validarRut(this)">
        </div>
        <div>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}" required>
        </div>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>