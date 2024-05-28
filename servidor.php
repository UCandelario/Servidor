<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario de la base de datos es diferente
$password = "(Ur$07121998"; // Cambia esto si tu contraseña de la base de datos es diferente
$dbname = "br_pruebas";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los datos enviados por el ESP32
$fk_planta = $_POST['fk_planta'];
$fecha_riego = $_POST['fecha_riego'];
$hora_riego = $_POST['hora_riego'];

// Preparar y ejecutar la consulta SQL para insertar los datos en la tabla horario_riego
$sql = "INSERT INTO horario_riego (fk_planta, fecha_riego, hora_riego) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("iss", $fk_planta, $fecha_riego, $hora_riego);
    if ($stmt->execute()) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

