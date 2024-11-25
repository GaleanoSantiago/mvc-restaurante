<?php
require_once('models/Mesas_model.php');

$model = new Mesas(); // Asegúrate de que el nombre de la clase sea correcto
$id_mesa = $_GET['id_mesa']; // Obtener el ID de la mesa desde la URL
$mesa = $model->obtenerMesaPorId($id_mesa); // Obtener los datos de la mesa

if (!$mesa) {
    die("Mesa no encontrada.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eliminar la mesa
    $model->eliminarMesa($id_mesa);
    header('Location: list_mesas.php');
exit();
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

<form action="eliminarMesas.php?id_mesa=<?php echo urlencode($id_mesa); ?>" method="POST">
<input type="hidden" name="id_mesa" value="<?php echo htmlspecialchars($id_mesa); ?>"> <!-- ID de la mesa -->
    <button type="submit">Eliminar Mesa</button>
</form>

<a href="list_mesas.php">Volver a la lista de mesas</a>

</body>
</html>