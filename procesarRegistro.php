<?php

// Datos dpara la conexion de base de datos
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Nombre de usuario
$password = ""; // Contraseña
$dbname = "pruebaBE"; // Nombre de la base de datos a la que se conectará

// Establece la conexión a la base de datos utilizando la clase mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos enviados mediante el método POST desde un formulario HTML
$nombre = $_POST['nombre']; // Se obtiene el valor del campo 'nombre'
$apellidoPaterno = $_POST['apellido_paterno']; // Se obtiene el valor del campo 'apellido_paterno'
$apellidoMaterno = $_POST['apellido_materno']; // Se obtiene el valor del campo 'apellido_materno'
$fechaNacimiento = $_POST['fecha_nacimiento']; // Se obtiene el valor del campo 'fecha_nacimiento'
$sexo = $_POST['sexo']; // Se obtiene el valor del campo 'sexo'
$correo = $_POST['correo']; // Se obtiene el valor del campo 'correo'

// Preparar la consulta SQL para insertar los datos en la tabla 'usuarios'
$sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, sexo, correo)
        VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$sexo', '$correo')";

// Ejecutar la consulta SQL y se verifica si fue exitosa
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso"; // Si la inserción fue exitosa, se muestra un mensaje de éxito
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; // Si hubo un error en la inserción, se muestra el mensaje de error
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
