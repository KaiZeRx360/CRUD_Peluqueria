<?php
 
include_once('../config/conexion.php');

$nombre = $_REQUEST['nombre'];
$sql = "DELETE FROM agenda WHERE nombre = '$nombre'";
$query = mysqli_query($conexion, $sql);

if ($query) {
    header('Location: ../index.php');
}


?>