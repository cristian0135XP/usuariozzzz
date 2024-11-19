<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "sistemas_bd");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id_usuario'])) {
    $id = $_GET['id_usuario'];

    // Eliminar el usuario por ID
    $sql = "DELETE FROM usuario WHERE id_usuario= $id_usuario";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado correctamente";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();

// Redirigir a la lista de usuarios
header("Location: listar_usuarios.php");
exit();
?>