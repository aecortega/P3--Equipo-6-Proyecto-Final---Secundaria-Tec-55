<?php
// Archivo para autenticar al webmaster
include './conn.php';

// Verificar la conexión
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error en la conexión a la base de datos']);
    exit();  // Sale del script si hay un error de conexión
}

// Obtener los datos del formulario de inicio de sesión
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Consulta SQL para verificar las credenciales
$consulta = "SELECT * FROM administrador WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
$resultado = $conn->query($consulta);

// Verificar si se encontró un registro
if ($resultado->num_rows > 0) {
    session_start();
    $_SESSION['usuario_autenticado'] = true;

    // Autenticación exitosa
    echo json_encode(['success' => true, 'message' => 'Autenticación exitosa']);
} else {
    // Autenticación fallida
    echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
}

// Cerrar la conexión
$conn->close();
?>