<?php
include './conn.php'; // Asegúrate de la ruta correcta a tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curp = $_POST["curp"];

    // Consulta SQL segura usando sentencias preparadas para evitar inyecciones SQL
    $sql = "SELECT * FROM ficha WHERE curp = ?";
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    
    // Vincular parámetros
    $stmt->bind_param("s", $curp);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener resultado
    $result = $stmt->get_result();

    // Verificar si la CURP ya existe en la base de datos
    if ($result->num_rows > 0) {
        // La CURP ya existe, devuelve un mensaje al cliente
        echo 'curp_duplicada';
    } else {
        // La CURP no existe, se puede continuar con la inserción normal de datos
        echo 'curp_no_duplicada';
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
}
?>
