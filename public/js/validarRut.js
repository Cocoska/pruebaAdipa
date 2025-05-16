function validarRut(rutInput) {
    const rut = rutInput.value.replace(/\./g, '').replace('-', '');
    const cuerpo = rut.slice(0, -1);
    const dv = rut.slice(-1).toUpperCase();

    if (cuerpo.length < 7) {
        alert('El RUT es demasiado corto.');
        rutInput.value = '';
        return false;
    }

    let suma = 0;
    let multiplo = 2;

    for (let i = cuerpo.length - 1; i >= 0; i--) {
        suma += parseInt(cuerpo[i]) * multiplo;
        multiplo = multiplo === 7 ? 2 : multiplo + 1;
    }

    const resto = suma % 11;
    const dvCalculado = resto === 1 ? 'K' : resto === 0 ? '0' : (11 - resto).toString();

    if (dv !== dvCalculado) {
        alert('El RUT ingresado no es válido.');
        rutInput.value = '';
        return false;
    }

    return true;
}