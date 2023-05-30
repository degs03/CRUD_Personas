<?php
include("libs/conex.php");
include("libs/ciudades.lib.php");
include("libs/personas.lib.php");
$titulo = "Insertar Persona";
$dato_b = traerCiudades($conn);
//preguntamos si se utiliza el metodo get y si trae el id 
if ($_GET and $_GET['id']) {
    $titulo = "Editar Persona";
    $titulo_b = "Editar";
    $rs = traerPersona($_GET['id'], $conn);
    //echo "<pre>";
    $dato = $rs->fetch_assoc();
    // echo "</pre>";

    // si el id esta en -1 significa que queremos insertar un nuevo usuario
} else {
    $dato['id'] = -1;
    $dato['nombre'] = "";
    $dato['apellido'] = "";
    $dato['cin'] = "";
    $dato['direccion'] = "";
    $dato['fecha_nac'] = "";
    $dato['cedula_id'] = "";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas -
        <?php echo $titulo; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center">
        <?php echo $titulo; ?>
    </h3>
    <div class="container w-25" style="box-shadow: 5px 5px 4px #DCDCDD; padding: 20px; border-radius:10px">
        <form action="guardar.php" method="post" class="d-flex flex-column">
            <div class="d-flex w-100 justify-content-between">
                <div style="width:48%">
                    <label>Nombre</label><br>
                    <input type="hidden" id="id" name="id" value="<?php
                    echo $dato['id'];
                    ?>" />
                    <input type="text" id="nombre" name="nombre" class="form-control" required
                        value="<?php if (isset($dato['nombre'])) {
                            echo $dato['nombre'];
                        } ?>" /> <br>
                </div>
                <div style="width:48%">
                    <label>Apellido</label><br>
                    <input type="text" id="apellido" name="apellido" class="form-control" required
                        value="<?php if (isset($dato['apellido'])) {
                            echo $dato['apellido'];
                        } ?>" /> <br>
                </div>
            </div>
            <div class="d-flex w-100 justify-content-between">
                <div style="width:48%">
                    <label>Numero de identificacion</label><br>
                    <input type="text" id="cin" name="cin" class="form-control" required
                        value="<?php if (isset($dato['cin'])) {
                            echo $dato['cin'];
                        } ?>" /> <br>
                </div>
                <div style="width:48%">
                    <label>Direccion</label><br>
                    <input type="text" id="direccion" name="direccion" class="form-control" required
                        value="<?php if (isset($dato['direccion'])) {
                            echo $dato['direccion'];
                        } ?>" /> <br>
                </div>
            </div>
            <div class="d-flex w-100 justify-content-between">
                <div style="width:48%">
                    <label>Nacimiento</label><br>
                    <input type="date" id="fecha_nac" name="fecha_nac" class="form-control" required
                        value="<?php if (isset($dato['fecha_nac'])) {
                            echo $dato['fecha_nac'];
                        } ?>" /> <br>
                </div>
                <div style="width:48%">
                    <label>Ciudad</label><br>
                    <select id="ciudad_id" type="text" name="ciudad_id" class="form-control" required value="<?php
                    ?>" />
                    <?php foreach ($dato_b as $dat) { ?>
                        <option value="<?php echo $dat['nombre']; ?>"> <?php echo $dat['nombre']; ?> </option>
                    <?php } ?>
                    </select><br>
                </div>
            </div>
            <div class="text-center">
                <?php
                if ($_GET and $_GET['id']) {
                    ?>
                    <button type="submit" class="btn btn-primary" onclick="return confirmacion('editar')"><?php echo $titulo_b ?></button>
                <?php } else {
                ?>
                    <button type="submit" class="btn btn-primary" >Guardar</button>
                <?php } ?>
                <a href="index.php?mod=personas" class="btn btn-primary">Volver</a>
            </div>

        </form>

    </div>
</body>
<script src='borrar_editar.js'></script>

</html>