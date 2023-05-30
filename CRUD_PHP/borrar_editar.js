const confirmacion = (titulo) => {
    let respuesta = confirm(`Desea ${titulo} el registro?`);
    if (respuesta == true ) {
        return true;
    } else {
        return false;
    }
}