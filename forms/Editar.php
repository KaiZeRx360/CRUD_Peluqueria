<?php

include_once('../config/conexion.php');

$nombre = $_REQUEST['nombre'];

$sql = "SELECT * FROM agenda WHERE nombre = '$nombre'";
$query = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_array($query);


if (!$fila) {
    echo "No se encontró ninguna cita con el nombre proporcionado.";
   
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/135a385d4e.js" crossorigin="anonymous"></script>
</head>
<body>
  <h1 class="bg-success p-2 text-white text-center"> Editar Cita <i class="fa-solid fa-user-pen"></i></h1>
  <br>

  <div class="container">
    <form action="../CRUD/Editar.php" method="POST">
      <input type="hidden" name="Nombre" value="<?php echo $fila['nombre']?>">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $fila['nombre']?>" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="<?php echo $fila['apellido']?>" required>
      </div>
      <div class="mb-3">
        <label for="numero" class="form-label">Numero Telefonico</label>
        <input type="tel" class="form-control" name="numero" value="<?php echo $fila['numero']?>" pattern="[0-9]{10}" required>
        <small>Ejemplo: 1234567890</small>
      </div>
      <label for="empleado_id" class="form-label">¿Quieres ser atendido por?</label>
<select class="form-control" name="empleado_id" required>
    <option value="1">Empleado 1: Juan Francisco</option>
    <option value="2">Empleado 2: Jocelyn Melo</option>
</select>
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo $fila['fecha']?>" required>
      </div>
      <div class="container text-center">
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="../index.php" class="btn btn-dark">Regresar</a>
      </div>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
