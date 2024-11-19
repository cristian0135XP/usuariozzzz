<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h2>Lista de Usuarios</h2>
    <table border ="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        <?php
        $host = "localhost";//DONDE ESTA TU BASE DE DATOS
        $dbname = "sistemas_bd";//NOMBRE DE LA BASE DE TATOS
        $user = "root"; // CAMBIAR SI ES NECERARIO
        $password = ""; // CAMBIAR SI ES NECESARIO
        
        //  CREAR CONEXION
        $conn = new mysqli($host, $user, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consultar todos los usuarios
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_usuario'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['celular'] . "</td>";
                echo "<td>" . $row['correo'] . "</td>";
                echo "<td>
                        <a href='editar_usuario.php?id=" . $row['id_usuario'] . "'>Editar</a> | 
                        <a href='eliminar_usuario.php?id=" . $row['id_usuario'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\")'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay usuarios registrados</td></tr>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>



    </table>
    <br>
    <a class="editar-informacion.png" href="usuario.html">
  <svg class="bi" aria-hidden="true"><use xlink:href="editar-informacion.png"></use></svg>
  Icon link
</a>
    <a href="usuario.html">Registrar nuevo usuario</a>
</body>
</html>