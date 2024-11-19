<?php
// DATOS DE CONEXION A LA BASE DE DATOS
$host = "localhost";//DONDE ESTA TU BASE DE DATOS
$dbname = "sistemas_bd";//NOMBRE DE LA BASE DE TATOS
$user = "root"; // CAMBIAR SI ES NECERARIO
$password = ""; // CAMBIAR SI ES NECESARIO

//  CREAR CONEXION
$conn = new mysqli($host, $user, $password, $dbname);

// VERIFICAR CONEXION
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//OBTENER LOS DATOS DEL FUMULARIO
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$ci = $_POST['ci'];
$contraseña = $_POST['contraseña'];

// ENSERTAR DATOS EN LA TABLA "USUARIOS"
$sql = "INSERT INTO usuario (nombre, apellido_paterno, apellido_materno, celular, correo, ci, contraseña ) VALUES ('$nombre', '$apellido_paterno', '$apellido_paterno', '$celular', '$correo', '$ci','$contraseña')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// CERRAR LA CONEXION
$conn->close();
?>