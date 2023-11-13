<?php

include_once('../config/conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];
$empleado_id = isset($_POST['empleado_id']) ? $_POST['empleado_id'] : null;

if ($empleado_id !== null && ($empleado_id == 1 || $empleado_id == 2)) {
    $sqlInsert = "INSERT INTO agenda(nombre, apellido, numero, fecha, empleado_id) VALUES (?, ?, ?, ?, ?)";
    
    $stmtInsert = mysqli_prepare($conexion, $sqlInsert);

    mysqli_stmt_bind_param($stmtInsert, 'ssiss', $nombre, $apellido, $numero, $fecha, $empleado_id);
    
    if (mysqli_stmt_execute($stmtInsert)) {
        
        $sqlSelect = "SELECT nombre FROM empleados WHERE empleado_id = ?";
        $stmtSelect = mysqli_prepare($conexion, $sqlSelect);
        mysqli_stmt_bind_param($stmtSelect, 'i', $empleado_id);
        mysqli_stmt_execute($stmtSelect);
        mysqli_stmt_bind_result($stmtSelect, $nombreEmpleado);
        mysqli_stmt_fetch($stmtSelect);

        
        header("Location: ../index.php?msg=La cita fue agendada con éxito. Atendido por: $nombreEmpleado");
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }
} else {
    echo "Error: El campo empleado_id no está definido o tiene un valor no permitido.";
}

?>
