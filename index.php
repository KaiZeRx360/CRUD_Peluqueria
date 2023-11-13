<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/135a385d4e.js" crossorigin="anonymous"></script>
    <style>
        body {
          background-image: linear-gradient(to right, #f83600 0%, #f9d423 100%);
        }
    </style>
</head>
<body>
  <h1 class="bg-warning p-2 text-while text-center"><i class="fa-solid fa-scissors"></i> Citas Peluqueria <i class="fa-solid fa-scissors"></i></h1>
  <br>
  <div class="container">
    <a href="forms/Agregar.php" class="btn btn-primary"><i class="fa-solid fa-user"></i> Agregar </a>
  </div>
  <br>
  <div class="container bg-light">
    <h2 >Lista de citas</h2>
  <br>
    <table class="table table-striped-columns">
  <thead class="table-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Numero </th>
      <th scope="col">Fecha</th>
      <th scope="col">Atendido por</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php
    include ("./config/conexion.php");
    $sql = "SELECT * FROM agenda";
    $query = mysqli_query($conexion,$sql);

     while ( $fila = mysqli_fetch_array($query)) {
      ?>

    <tr>
    <td><?php echo $fila ['nombre']?></td>
    <td><?php echo $fila ['apellido']?></td>
    <td><?php echo $fila ['numero']?></td>
    <td><?php echo $fila ['fecha']?></td>
    <td><?php echo $fila ['empleado_id']?></td>
    <td>
      <a href="CRUD/eliminar.php?nombre=<?php echo $fila['nombre']?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
      <a href="forms/Editar.php?nombre=<?php echo $fila['nombre']?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen"></i></a>

  </tr>

      <?php
      
     }
    ?>
  </tr>
  </tbody>
</table>
</div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>