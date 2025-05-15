<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/validarRut.js') }}"></script>
</head>
<body>
    <h1>Inicio de Sesión</h1>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" required onblur="validarRut(this)">
        </div>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>