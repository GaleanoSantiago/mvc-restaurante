<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mesasModel = new Mesas();

    // Obtener los datos del formulario
    $id_mesa = $_POST['id_mesa'];
    $n_mesa = $_POST['n_mesa'];
    $capacidad_mesa = $_POST['capacidad_mesa'];
    $descripcion_mesa = $_POST['descripcion_mesa'];

    // Actualizar la mesa
    if ($mesasModel->actualizarMesa($id_mesa, $n_mesa, $capacidad_mesa, $descripcion_mesa)) {
        // Redirigir a la lista de mesas o mostrar un mensaje de éxito
        header("Location: list_mesas.php?mensaje=Mesa actualizada con éxito");
        exit();
    } else {
        echo "Error al actualizar la mesa.";
    }
} else {
    echo "Método de solicitud no válido.";
}
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

<form action="editar_mesa.php" method="POST">
    <input type="hidden" name="id_mesa" value="<?php echo $mesa['id_mesa']; ?>"> <!-- ID de la mesa -->
    
    <label for="n_mesa">Número de Mesa:</label>
    <input type="text" id="n_mesa" name="n_mesa" value="" required>
    
    <label for="capacidad_mesa">Capacidad:</label>
    <input type="number" id="capacidad_mesa" name="capacidad_mesa" value="" required>
    
    <label for="descripcion_mesa">Descripción:</label>
    <textarea id="descripcion_mesa" name="descripcion_mesa" required></textarea>
    
    <button type="submit">Actualizar Mesa</button>
</form>

<a href="list_mesas.php">Volver a la lista de mesas</a>

</body>
</html>