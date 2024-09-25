<?php
session_start();
require_once("./app/config/dependencias.php");
require_once("./app/controller/inicio.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=CSS."inicio.css";?>">
    <title>Formulario de datos</title>
</head>
<body class="vh-100">
    <div class="row">
        <div class="col"></div>
        <div class="col mt-5">
            <h1 class="text-center fs-3">Bienvenido Usuario</h1>

            <!-- Tabla con información del usuario -->
            <table class="table table-striped table-bordered mt-4">
              <thead class="table-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Campo</th>
                  <th scope="col">información</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Nombre</td>
                  <td><?= $_SESSION['registro']['nombre']; ?></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Apellido</td>
                  <td><?= $_SESSION['registro']['apellido']; ?></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Email</td>
                  <td><?= $_SESSION['registro']['email']; ?></td>
                </tr>
              </tbody>
            </table>

            <!-- Botón para cerrar sesión -->
            <div class="d-flex justify-content-center mt-3">
                <a href="cerrar_sesion.php" class="btn btn-danger btn-lg">Cerrar sesión</a>
            </div>
        </div>
        <div class="col"></div>
    </div>
</body>
</html>


   
    