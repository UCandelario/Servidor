<?php
$servername = "localhost";
$username = "root";
$password = "(Ur$07121998"; // Revisa si esta contraseña es correcta
$dbname = "br_pruebas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fk_planta']) && isset($_POST['humedad']) && isset($_POST['fecha']) && isset($_POST['hora'])) {
        $fk_planta = $_POST['fk_planta'];
        $humedad = $_POST['humedad'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        $sql = "INSERT INTO datos_humedad (fk_planta, humedad, fecha, hora) VALUES ('$fk_planta', '$humedad', '$fecha', '$hora')";

        if ($conn->query($sql) === TRUE) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }
    } else {
        echo "Datos incompletos";
    }
} else {
    echo "Solicitud no válida";
}

$conn->close();

