<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "sistemas_bd");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id_usuario'])) {
    $id = $_GET['id_usuario'];

    // Obtener el usuario por ID
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado";
        exit();
    }
}

// Guardar los cambios en la base de datos
if (isset($_POST['editar'])) {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];

    $sql = "UPDATE usuario SET nombre='$nombre', celular='$celular', correo='$correo' WHERE id_usuario=$id_usuario";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente";
        header("Location: listar_usuarios.php"); // Redirige a la lista de usuarios
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="POST" action="">
        <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required><br><br>

        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="celular" value="<?php echo $row['celular']; ?>" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required><br><br>

        <input type="submit" name="editar" value="Guardar Cambios">
    </form>
</body>
</html>