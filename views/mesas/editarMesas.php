<?php 
require_once("./../head/head.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mesa</title>
</head>
<body>

<h2>Editar Mesa</h2>

<form action="./functions.php" method="POST">
    <input type="hidden" name="edit" id="inputhidden">
    <input type="hidden" name="id_mesa" value="<?php echo $mesa['id_mesa']; ?>"> <!-- ID de la mesa -->
    
    <label for="n_mesa">Número de Mesa:</label> <br>
    <input type="text" id="n_mesa" name="n_mesa" required>
    <br>
    <label for="capacidad_mesa">Capacidad:</label> <br>
    <input type="number" id="capacidad_mesa" name="capacidad_mesa" required>
    <br>
    <label for="descripcion_mesa">Descripción:</label> <br>
    <textarea id="descripcion_mesa" name="descripcion_mesa" required></textarea>
    <br>
    <button type="submit">Actualizar Mesa</button>
</form>

<a href="list_mesas.php">Volver a la lista de mesas</a>

</body>
</html>

<?php
    require_once("./../head/footer.php");
?>