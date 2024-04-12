<?php
// En este apartado comienza la conexion a la base de datos pruebabe.
$servername = "127.0.0.1";
$username = "root"; 
$password = ""; 
$database = "pruebabe";

// Aqui empieza la conexión a la base de datos.
$conn = new mysqli($servername, $username, $password, $database);

// Despues empieza a verificar la conexión.
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";    

// Termina y cierra la conexión con la base de datos.
$conn->close();
?>
