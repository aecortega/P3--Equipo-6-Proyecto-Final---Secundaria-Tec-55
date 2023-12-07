<?php
// Conectar a la base de datos
include './conn.php';

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombres = $_POST["nombres"];
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
    $curp = $_POST["curp"];
    $genero = $_POST["genero"];
    $fecha_n = $_POST["fecha_n"];
    $nacionalidad = $_POST["nacionalidad"];
    $est_nacimiento = $_POST["est_nacimiento"];
    $est_nac_cd = $_POST["est_nac_cd"];
    $nombre_pmt = $_POST["nombre_pmt"];
    $pmt_apellidoP = isset($_POST["pmt_apellidoP"]) ? $_POST["pmt_apellidoP"] : "";
    $pmt_apellidoM = isset($_POST["pmt_apellidoM"]) ? $_POST["pmt_apellidoM"] : "";
    $pmt_fecha_nacim = $_POST["pmt_fecha_nacim"];
    $pmt_nacionalidad = $_POST["pmt_nacionalidad"];
    $pmt_est_naci = $_POST["pmt_est_naci"];
    $pmt_cd_naci = $_POST["pmt_cd_naci"];
    $cp = $_POST["cp"];
    $estado = $_POST["estado"];
    $ciudad = $_POST["ciudad"];
    $calle = $_POST["calle"];
    $colonia = $_POST["colonia"];
    $n_in_ext = $_POST["n_in_ext"];
    $n_primaria = $_POST["n_primaria"];
    $p_estado = $_POST["p_estado"];
    $p_ciudad = $_POST["p_ciudad"];
    $p_direccion = $_POST["p_direccion"];
    $promedio = $_POST["promedio"];
    $costo_ficha = 1400;

     // Manejo de la foto del alumno
     $fotoA = $_FILES["fotoA"];
     $fotoA_nombre = $fotoA["name"];
     $fotoA_tipo = $fotoA["type"];
     $fotoA_tamanio = $fotoA["size"];
     $fotoA_tmp = $fotoA["tmp_name"];
 
     // Ruta donde guardar la foto del alumno (ajusta según tu estructura de carpetas)
     $ruta_fotoA = "../fotos_alumnos/" . $fotoA_nombre;
 
     // Mover la foto del alumno a la carpeta destino
     if (move_uploaded_file($fotoA_tmp, $ruta_fotoA)) {
         // Manejo de la última boleta
         $ultima_boleta = $_FILES["ultima_boleta"];
         $ultima_boleta_nombre = $ultima_boleta["name"];
         $ultima_boleta_tipo = $ultima_boleta["type"];
         $ultima_boleta_tamanio = $ultima_boleta["size"];
         $ultima_boleta_tmp = $ultima_boleta["tmp_name"];
 
         // Ruta donde guardar la última boleta (ajusta según tu estructura de carpetas)
         $ruta_ultima_boleta = "../boletas/" . $ultima_boleta_nombre;
 
         // Mover la última boleta a la carpeta destino
         if (move_uploaded_file($ultima_boleta_tmp, $ruta_ultima_boleta)) {
             // Consulta SQL para insertar datos en la tabla 'ficha'
             $sql = "INSERT INTO ficha (nombres, apellidoP, apellidoM, fotoA, curp, genero, fecha_n, nacionalidad, est_nacimiento, est_nac_cd, nombre_pmt, pmt_apellidoP, pmt_apellidoM, pmt_fecha_nacim, pmt_nacionalidad, pmt_est_naci, pmt_cd_naci, cp, estado, ciudad, calle, colonia, n_in_ext, n_primaria, p_estado, p_ciudad, p_direccion, promedio, ultima_boleta, costo_ficha)
             VALUES ('$nombres', '$apellidoP', '$apellidoM', '$fotoA_nombre', '$curp', '$genero', '$fecha_n', '$nacionalidad', '$est_nacimiento', '$est_nac_cd', '$nombre_pmt', '$pmt_apellidoP', '$pmt_apellidoM', '$pmt_fecha_nacim', '$pmt_nacionalidad', '$pmt_est_naci', '$pmt_cd_naci', '$cp', '$estado', '$ciudad', '$calle', '$colonia', '$n_in_ext', '$n_primaria', '$p_estado', '$p_ciudad', '$p_direccion', '$promedio', '$ruta_ultima_boleta', '$costo_ficha')";
 
             // Verificar si la consulta fue exitosa
             if ($conn->query($sql) === TRUE) {
                 header("Location: ../index.php?mensaje=registro_exitoso");
                 exit();
             } else {
                 echo "Error al insertar datos: " . $conn->error;
             }
         } else {
             echo "Error al subir la última boleta.";
         }
     } else {
         echo "Error al subir la foto del alumno.";
     }
 
     // Cerrar la conexión a la base de datos
     $conn->close();
 }
 ?>
