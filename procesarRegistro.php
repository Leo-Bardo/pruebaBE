<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellidoPaterno = $_POST['apellido_paterno'] ?? '';
    $apellidoMaterno = $_POST['apellido_materno'] ?? '';
    $fechaNacimiento = $_POST['fecha_nacimiento'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    // Validación de datos
    if (empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($fechaNacimiento) || empty($sexo) || empty($direccion)) {
        echo "<p>Error: Todos los campos son requeridos.</p>";
        exit;
    }

    // Conexión a la base de datos
    $host = 'localhost'; // Host de MySQL en XAMPP
    $username = 'root'; // Nombre de usuario de MySQL en XAMPP
    $password = ''; // Contraseña de MySQL en XAMPP (por defecto esta vacía)
    $database = 'pruebabe'; // Nombre de la base de datos (en este caso pruebabe)

    $conexion = new mysqli($host, $username, $password, $database);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Prepara la consulta SQL para insertar los datos del usuario
    $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, sexo, direccion) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("ssssss", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $sexo, $direccion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<p>Registro exitoso. ¡Gracias por registrarte!</p>";
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }

    // Cerrar la conexión y la declaración
    $stmt->close();
    $conexion->close();
}

?>