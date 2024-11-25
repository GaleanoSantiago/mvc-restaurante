<?php
require_once ('models/Mesas_model.php');

$model = new Mesas();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n_mesa = $_POST['n_mesa'];
    $capacidad_mesa = $_POST['capacidad_mesa'];
    $descripcion_mesa = $_POST['descripcion_mesa'];
    
    $model->agregarMesa($n_mesa, $capacidad_mesa, $descripcion_mesa);
    header('Location: list_mesas.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reservación</title>
</head>
<body>

<h2>Agregar Reservación</h2> <br> <br>
<form action="" method="POST">
    <label for="n_mesa">Número de Mesa:</label>
    <input type="text" id="n_mesa" name="n_mesa" required><br><br>
    
    <label for="capacidad_mesa">Capacidad:</label>
    <input type="number" id="capacidad_mesa" name="capacidad_mesa" required><br><br>
    
    <label for="descripcion_mesa">Descripción:</label>
    <input type="text" id="descripcion_mesa" name="descripcion_mesa" required><br><br>
    
    <input type="submit" value="Agregar Mesa">
</form>

<a href="list_mesas.php">Volver a la lista de mesas</a>

</body>
</html>