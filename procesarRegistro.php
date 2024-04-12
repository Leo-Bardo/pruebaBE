<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos MySQL (XAMPP)
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "pruebabe";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellido_paterno'];
    $apellidoMaterno = $_POST['apellido_materno'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];

    // Preparar la consulta SQL para insertar datos en la tabla 'usuarios'
    $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, sexo, email) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$sexo', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Registro exitoso</h1>";
    } else {
        echo "Error al insertar en la base de datos: " . $conn->error;
    }

    // Cerrar la conexión con la base de datos
    $conn->close();
}
?>
