<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Información del Usuario</h1>

    <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $usuario->apellido }}</p>
    <p><strong>RUT:</strong> {{ $usuario->rut }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $usuario->fecha_nacimiento }}</p>

    {{-- Enlace para editar la información del usuario --}}
    <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar mi información</a>

    <a href="{{ route('login') }}">Volver al inicio</a>
</body>
</html>