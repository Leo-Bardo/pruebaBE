<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "pruebaBE"; 

// Se establece la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Se obtienen los datos enviados mediante el método POST desde un formulario HTML
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellido_paterno'];
$apellidoMaterno = $_POST['apellido_materno'];
$fechaNacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];

// Preparar la consulta SQL para insertar los datos en la tabla 'usuarios'
$sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, sexo, correo)
        VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$sexo', '$correo')";

// Ejecutar la consulta SQL y se verifica si fue exitosa
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// cerrar la conexión a la base de datos
$conn->close();
?>
