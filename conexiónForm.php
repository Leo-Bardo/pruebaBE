<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'procesarRegistro.php';

    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellidoPaterno = mysqli_real_escape_string($conn, $_POST['apellido_paterno']);
    $apellidoMaterno = mysqli_real_escape_string($conn, $_POST['apellido_materno']);
    $numeroTelefonico = mysqli_real_escape_string($conn, $_POST['numero_telefonico']);
    $fechaNacimiento = mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']);
    $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);

    $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, NúmeroTelefonico, fechaNacimiento, sexo) 
            VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$numeroTelefonico', '$fechaNacimiento', '$sexo')";



    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al Registrar los datos: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
