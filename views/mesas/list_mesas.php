<?php 
require_once("./../head/head.php");
?>

<?php
require_once ('./../../models/Mesas.php');
$model = new Mesa();
$mesas = $model->obtenerMesas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones de Mesas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            background-color: #008CBA; /* Azul */
            color: white;
        }
    </style>
</head>
<body>

<h2>Mesas de Reservación</h2>

<a href="agregarMesas.php" class="btn">Agregar Reservación</a> <br><br>

<table>
    <thead>
        <tr>
            <th>ID Mesa</th>
            <th>Número de Mesa</th>
            <th>Capacidad</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mesas as $mesa): ?>
            <tr>
                <td><?php echo $mesa['id_mesa']; ?></td>
                <td><?php echo $mesa['n_mesa']; ?></td>
                <td><?php echo $mesa['capacidad_mesa']; ?></td>
                <td><?php echo $mesa['descripcion_mesa']; ?></td>
                <td>
                    <a href="editarMesas.php" class="btn">Editar</a>
                    <a href="eliminarMesas.php?id_mesa=<?php echo $mesa['id_mesa'];?>" class="btn">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

<?php
    require_once("./../head/footer.php");
?>