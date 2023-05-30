<?php
//llamamos a los archivos que se van a utilizar
include("libs/conex.php");
include("libs/personas.lib.php");
//preguntamos si el metodo GET existe
if ($_GET and $_GET['id']) {
    // echo $_GET['id'];
    $rs = borrarPersona($_GET['id'], $conn);   
    header('Location:index.php');  //indicamos donde sera redirigida la pagina al ejecutarse la funcion

}
?>