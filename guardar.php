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
    if (isset($_POST['fk_planta']) && isset($_POST['fecha_riego']) && isset($_POST['hora_riego'])) {
        $fk_planta = $_POST['fk_planta'];
        $fecha_riego = $_POST['fecha_riego'];
        $hora_riego = $_POST['hora_riego'];

        $sql = "INSERT INTO horario_riego (fk_planta, fecha_riego, hora_riego) VALUES ('$fk_planta', '$fecha_riego', '$hora_riego')";

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
