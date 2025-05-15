function validarRut(rutInput) {
    const rut = rutInput.value.replace(/\./g, '').replace('-', ''); // Elimina puntos y guión
    const cuerpo = rut.slice(0, -1); // Parte numérica del RUT
    const dv = rut.slice(-1).toUpperCase(); // Dígito verificador

    // Validar largo mínimo
    if (cuerpo.length < 7) {
        alert('El RUT es demasiado corto.');
        rutInput.value = '';
        return false;
    }

    // Calcular dígito verificador
    let suma = 0;
    let multiplo = 2;

    for (let i = cuerpo.length - 1; i >= 0; i--) {
        suma += parseInt(cuerpo[i]) * multiplo;
        multiplo = multiplo === 7 ? 2 : multiplo + 1; // Reinicia a 2 después de 7
    }

    const resto = suma % 11;
    const dvCalculado = resto === 1 ? 'K' : resto === 0 ? '0' : (11 - resto).toString();

    // Validar dígito verificador
    if (dv !== dvCalculado) {
        alert('El RUT ingresado no es válido.');
        rutInput.value = '';
        return false;
    }

    return true;
}