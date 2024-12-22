<?php
require_once ('./../../models/Mesas.php');

$model = new Mesa();
$id_mesa = $_GET['id_mesa']; // Obtener el ID de la mesa
$mesa = $model->obtenerMesaPorId($id_mesa); // Obtener los datos de la mesa

if (!$mesa) {
    die("Mesa no encontrada.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Mesa</title>
</head>
<body>

<h2>Eliminar Mesa</h2>
<p>¿Estás seguro de que deseas eliminar la mesa con el número de mesa: <strong><?php echo htmlspecialchars($mesa['n_mesa']); ?></strong>?</p>

<form action="./functions.php" method="POST">
<input type="hidden" name="delete" id="inputhidden">
<input type="hidden" name="id_mesa" value="<?php echo htmlspecialchars($id_mesa); ?>"> <!-- ID de la mesa -->
    <button type="submit">Eliminar Mesa</button>
</form>

<a href="list_mesas.php">Volver a la lista de mesas</a>

</body>
</html>