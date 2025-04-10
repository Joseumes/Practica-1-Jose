<?php
$archivo = "reservaciones.txt";

if (file_exists($archivo)) {
    $reservaciones = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    $reservaciones = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones - Restaurante Jose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Reservaciones</h1>

        <?php if (empty($reservaciones)): ?>
            <p class="text-center">No hay reservaciones registradas.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservaciones as $reserva): ?>
                        <?php
                        
                        $partes = explode(", ", $reserva);
                        $nombre = str_replace("Nombre: ", "", $partes[0]);
                        $telefono = str_replace("Teléfono: ", "", $partes[1]);
                        $fecha = str_replace("Fecha: ", "", $partes[2]);
                        $hora = str_replace("Hora: ", "", $partes[3]);
                        $descripcion = str_replace("Descripción: ", "", $partes[4]);
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($nombre); ?></td>
                            <td><?php echo htmlspecialchars($telefono); ?></td>
                            <td><?php echo htmlspecialchars($fecha); ?></td>
                            <td><?php echo htmlspecialchars($hora); ?></td>
                            <td><?php echo htmlspecialchars($descripcion); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>