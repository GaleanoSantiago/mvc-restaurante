<?php

    session_start();
    if(empty($_SESSION['user_name'])){
        header("Location:./../../views/login/index.php");
    } 
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Exportar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="./../dashboard/index.php">Restaurante Pergolinni</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" id="item-inicio" href="./../dashboard/index.php">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Clientes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-light" href="./../clientes/index.php">Lista de Clientes</a></li>
                                <li><a class="dropdown-item text-light" href="./../clientes/create.php">Nuevo Cliente</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reservaciones
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-light" href="./../reservacion/index.php">Lista de Reservaciones</a></li>
                                <li><a class="dropdown-item text-light" href="./../frontend/index.php">Nueva Reservación</a></li>
                            </ul>
                        </li>    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mesas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-light" href="./../frontend/index.php">Lista de Mesas</a></li>
                                <li><a class="dropdown-item text-light" href="#">Nueva Mesa</a></li>
                            </ul>
                        </li>
                        <?php if($_SESSION['id_rol']==1): ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuarios
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-light" href="./../login/user_list.php">Lista de Usuarios</a></li>
                                <li><a class="dropdown-item text-light" href="./../login/create.php">Nuevo Cliente</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        
                    </ul>

                </div>
                <div class="logout-container">
                    <form action="./../login/functions.php" class="" method="post">
                        <input type="hidden" name="logout">
                        <button type="submit" class="btn btn-dark d-flex">Cerrar Sesión</button>   
                    </form>
                </div>
            </div>
        </nav>
    </header>