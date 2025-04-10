<?php
class Reserva {
    public $nombre;
    public $telefono;
    public $fecha;
    public $hora;
    public $descripcion;

    public function __construct($nombre, $telefono, $fecha, $hora, $descripcion) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->descripcion = $descripcion;
    }

    public function __toString() {
        return "Nombre: {$this->nombre}, Teléfono: {$this->telefono}, Fecha: {$this->fecha}, Hora: {$this->hora}, Descripción: {$this->descripcion}\n";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $hora = htmlspecialchars($_POST['hora']);
    $descripcion = htmlspecialchars($_POST['descripcion']);


    $reserva = new Reserva($nombre, $telefono, $fecha, $hora, $descripcion);

    $archivo = fopen("reservaciones.txt", "a");
    if ($archivo) {
        fwrite($archivo, $reserva); 
        fclose($archivo);
        echo "<p>¡Reserva realizada por {$nombre} guardada exitosamente!</p>";
        echo '<a href="../Reservas/reservaciones.php">Ver reservaciones</a>';
    } else {
        echo "<p>Error al guardar la reserva.</p>";
    }
}
?>