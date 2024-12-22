<?php 
require_once("./../head/head.php");
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
<form action="./functions.php" method="POST">
<input type="hidden" name="create" id="inputhidden">
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

<?php
    require_once("./../head/footer.php");
?>