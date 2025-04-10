<?php
$archivo = file_get_contents('../recetas/recetas-dulces.txt');
if ($archivo === false) {
    echo "Error: No se pudo cargar el archivo recetas-dulces.txt";
    exit;
}
$recetas = explode("===", $archivo);

function formatearReceta($bloque) {

    $lineas = explode("\n", $bloque);
    $titulo = '';
    $descripcion = '';
    $ingredientes = '';
    $preparacion = '';

    foreach ($lineas as $linea) {
        if (strpos($linea, 'Título:') === 0) {
            $titulo = trim(substr($linea, strlen('Título:')));
        } elseif (strpos($linea, 'Descripción:') === 0) {
            $descripcion = trim(substr($linea, strlen('Descripción:')));
        } elseif (strpos($linea, 'Ingredientes:') === 0) {
            $ingredientes = trim(substr($linea, strlen('Ingredientes:')));
        } elseif (strpos($linea, 'Preparación:') === 0) {
            $preparacion = trim(substr($linea, strlen('Preparación:')));
        }
    }
    return '
    <div class="receta">
        <h3>' . htmlspecialchars($titulo) . '</h3>
        <p>' . htmlspecialchars($descripcion) . '</p>
        <h4>Ingredientes:</h4>
        <ul>
            <li>' . str_replace(', ', '</li><li>', htmlspecialchars($ingredientes)) . '</li>
        </ul>
        <h4>Preparación:</h4>
        <ol>
            <li>' . str_replace('. ', '</li><li>', htmlspecialchars($preparacion)) . '</li>
        </ol>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurante Jose con los mejores platillos y postres de la ciudad.">
    <meta property="og:title" content="Restaurante Jose">
    <meta property="og:description" content="Disfruta de una experiencia culinaria inigualable con nuestros platos y postres exclusivos.">
    <meta property="og:image" content="imagenes/imagen_restaurante_interior.jpg">
    <meta property="og:url" content="http://www.restaurantejose.com">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Restaurante Jose">
    <meta name="twitter:description" content="Disfruta de una experiencia culinaria inigualable con nuestros platos y postres exclusivos.">
    <meta name="twitter:image" content="imagenes/imagen_restaurante_interior.jpg">
    <meta name="twitter:site" content="@restaurantejose">
    <title>Practica#1 - Restaurante Jose</title>
    <link rel="icon" href="../imagenes/faicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="Fondo">
    <div class="container">
        <div class="logo-title">
            <img src="../imagenes/faicon.png" alt="Logo del restaurante">
            <h1 class="title">Restaurante Jose</h1>
        </div>
        <div class="menu" id="menu">
            <a href="../index.html">Página Principal</a>
            <a href="../menu/postres.html">Postres</a>
            <a href="../menu/platos-fuertes.html">Platos Fuertes</a>
            <a href="../personal/personal.html">Nuestro Personal</a>
            <a href="../resenias/resenias.html">Reseñas</a>
            <a href="../recetas/recetas-dulces.php">Recetas Dulces</a>
            <a href="../recetas/recetas-saladas.php">Recetas Saladas</a>
        </div>
        <div class="hamburger" id="hamburger">&#9776;</div>
    </div>
    <div class="content">
        <h1>Recetas Dulces del Restaurante Jose</h1>
        <h2>Descubre nuestras mejores recetas dulces</h2>
    </div>
    <div class="recetas-container">
        <?php
    
        $i = 1; 
        foreach ($recetas as $receta) {
            echo "<!-- Receta #$i -->\n";
            echo formatearReceta($receta);
            $i++;
        }
        ?>
    </div>
    <footer class="footer">
        <p class="texto">&copy; 2025 Restaurante Jose. Todos los derechos reservados.</p>
    </footer>

    <script>
        const hamburger = document.getElementById('hamburger');
        const menu = document.getElementById('menu');

        hamburger.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>