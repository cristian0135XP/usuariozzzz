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
$num_piso = $_POST['num_piso'];
$num_aula = $_POST['num_aula'];

// ENSERTAR DATOS EN LA TABLA "USUARIOS"
$sql = "INSERT INTO aulas (num_piso, num_aula) VALUES ('$num_piso', '$num_aula')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// CERRAR LA CONEXION
$conn->close();
?>