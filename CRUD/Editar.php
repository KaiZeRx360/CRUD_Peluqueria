<?php

include_once('../config/conexion.php');

$nombreOriginal = $_POST['Nombre'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];
$empleado_id = isset($_POST['empleado_id']) ? $_POST['empleado_id'] : null;

if ($empleado_id !== null && ($empleado_id == 1 || $empleado_id == 2)) {
    $sql = "UPDATE agenda SET nombre=?, apellido=?, numero=?, fecha=?, empleado_id=? WHERE nombre=?";
    
    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param($stmt, 'ssisss', $nombre, $apellido, $numero, $fecha, $empleado_id, $nombreOriginal);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../index.php");
    } else {
        echo "Error al editar datos: " . mysqli_error($conexion);
    }
} else {
    echo "Error: El campo empleado_id no está definido o tiene un valor no permitido.";
}

?>
