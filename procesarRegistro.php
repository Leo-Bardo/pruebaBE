<?php
//Configurar la conexión a la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "pruebaBE"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Procesar los datos del formulario
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellido_paterno'];
$apellidoMaterno = $_POST['apellido_materno'];
$localidad = $_POST['localidad'];
$fechaNacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];

//Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, localidad ,fechaNacimiento, sexo)
        VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$localidad','$fechaNacimiento', '$sexo')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
