<?php
include("libs/conex.php");
include("libs/personas.lib.php");
$datos = traerPersonas($conn);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex container mt-5 justify-content-between align-items-center" style="background-color:">
        <h1>Personas</h1>
        <a href="nuevo.php" class="btn btn-primary " style="height:45px; ">Nuevo</a>
    </div>
    <table class="table container" style="background-color:#DCDCDD">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>CI</th>
                <th>Direccion</th>
                <th>Nacimiento</th>
                <th>Ciudad</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($datos as $d) {
                ?>
                <tr>
                    <td>
                        <?php echo $d['id']; ?>
                    </td>
                    <td>
                        <?php echo $d['nombre']; ?>
                    </td>
                    <td>
                        <?php echo $d['apellido']; ?>
                    </td>
                    <td>
                        <?php echo $d['cin']; ?>
                    </td>
                    <td>
                        <?php echo $d['direccion']; ?>
                    </td>
                    <td>
                        <?php echo $d['fecha_nac']; ?>
                    </td>
                    <td>
                        <?php echo $d['ciudad_id']; ?>
                    </td>
                    <td><a href="/CRUD_PHP/nuevo.php?id=<?php echo $d['id']; ?>" class="btn btn-primary">Editar</a>
                    </td>
                    <td><a href="/CRUD_PHP/borrar.php?id=<?php echo $d['id']; ?>" onclick="return confirmacion('eliminar')" class="btn btn-danger">Borrar</a> </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
<script src='borrar_editar.js'></script>
</html>