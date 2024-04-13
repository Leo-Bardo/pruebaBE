<?php
// Establecer la conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "pruebabe";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellidoPaterno = mysqli_real_escape_string($conn, $_POST['apellido_paterno']);
    $apellidoMaterno = mysqli_real_escape_string($conn, $_POST['apellido_materno']);
    $numeroTelefonico = mysqli_real_escape_string($conn, $_POST['numero_telefonico']);
    $fechaNacimiento = mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']);
    $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);

    $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, numeroTelefonico, fechaNacimiento, sexo) 
            VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$numeroTelefonico', '$fechaNacimiento', '$sexo')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar los datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
