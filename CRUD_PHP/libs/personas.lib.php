<?php
function traerPersonas($con)
{
    $sql = "SELECT * FROM personas";
    $filas = $con->query($sql);
    return $filas;
}
//con esta funcion traemos una persona por id de la base de datos
function traerPersona($id, $con)
{
    $sql = "SELECT * FROM personas where id=" . $id;
    $filas = $con->query($sql);
    return $filas;
}
function agregarPersona($datos, $con)
{
    $sql = "INSERT INTO personas (nombre, apellido, cin, direccion, fecha_nac, ciudad_id) VALUES (
        '" . $datos['nombre'] . "', 
        '" . $datos['apellido'] . "', 
        '" . $datos['cin'] . "', 
        '" . $datos['direccion'] . "',
        '" . $datos['fecha_nac'] . "',
        '" . $datos['ciudad_id'] . "');";
    $con->query($sql);
}
function editarPersona($datos, $conn)
{
    // update ciudades set nombre = CAMPO where id= ID
    $sql = "UPDATE personas SET 
    nombre = '" . $datos['nombre'] . "',
    apellido = '" . $datos['apellido'] . "', 
    cin = '" . $datos['cin'] . "', 
    direccion = '" . $datos['direccion'] . "',
    fecha_nac = '" . $datos['fecha_nac'] . "',
    ciudad_id = '" . $datos['ciudad_id'] . "' WHERE id=" . $datos['id'];
    $conn->query($sql);
}
function borrarPersona($id, $con)
{
    // delete from ciudades where id == ID
    $sql = "DELETE FROM personas WHERE id=" . $id;
    $filas = $con->query($sql);
    return $filas;
}
?>