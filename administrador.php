<?php
// Verificar si el usuario está autenticado, de lo contrario redirigir al inicio de sesión
session_start();
if (!isset($_SESSION['usuario_autenticado'])) {
    // El usuario no está autenticado, redirigir al inicio de sesión
    header("Location: index.php");
    exit();
}

// Incluir la conexión u otros archivos necesarios
include 'funcionesphp/conn.php';

// Obtener los datos de la tabla de fichas
$sql = "SELECT nombres, apellidoP, apellidoM, curp FROM ficha";
$result = $conn->query($sql);

// Puedes agregar más lógica según tus necesidades aquí

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Otros estilos o scripts que puedas necesitar -->
</head>

<body>
    <div class="container">
        <h1>Bienvenido al Panel de Administrador</h1>
        <!-- Contenido del panel de administrador -->

        <a href="./funcionesphp/cerrar_sesion.php">Cerrar Sesión</a> <!-- Puedes crear un archivo para cerrar sesión -->

        <h2>Tabla de Fichas</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>CURP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los datos de la tabla de fichas en la tabla HTML
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nombres']}</td>
                            <td>{$row['apellidoP']}</td>
                            <td>{$row['apellidoM']}</td>
                            <td><a class='btn btn-primary' href='./funcionesphp/mostrar_ficha.php?curp={$row['curp']}'>{$row['curp']}</a></td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Otros scripts que puedas necesitar -->
</body>

</html>