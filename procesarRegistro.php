<?php 
   //Validacion de datos de la bd
   $user = "root";
   $pass = "";
   $host = "localhost";
   $dbNombre = "prueba";

   //Coneccion a la base de datos
   $connection = new mysqli($host, $user, $pass, $dbNombre);

   //Deteccion de error al conectar
   if($connection->connect_error){
	echo "No se a podido conectar con el servidor". $connection->connect_error;
   }

   //Recuperacion de datos
   $nombre = $_POST["nombre"];
   $apellidoPaterno = $_POST["apellido_paterno"];
   $apellidoMaterno = $_POST["apellido_materno"];
   $fechaNacimiento = $_POST["fecha_nacimiento"];
   $telefono = $_POST["telefono"];
   $sexo = $_POST["sexo"];
   
   //Sentencia SQL
   $stmt = $connection->prepare("INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno,fechaNacimiento,telefono,sexo)
                       VALUES (?, ?, ?, ?, ?, ?)");
   if ($stmt === false) {
    die('prepare() failed: ' . htmlspecialchars($connection->error));
   }
   $stmt->bind_param('ssssss', $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $telefono, $sexo);
   $stmt->execute();


	echo "<h1>Usuario Registrado</h1>";

   $connection->close();

   echo'<a href="index.html">Regresar</a>';

?>