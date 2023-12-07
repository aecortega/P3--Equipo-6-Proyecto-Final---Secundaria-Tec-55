<?php
// Verificar si se recibió una CURP por GET
if (isset($_GET['curp'])) {
    // Incluir archivo de conexión
    include './conn.php';

    // Obtener CURP de la variable GET
    $curp = $_GET['curp'];

    // Escapar la CURP para evitar inyección SQL
    $curp = $conn->real_escape_string($curp);

    // Consulta a la base de datos
    $sql = "SELECT * FROM ficha WHERE curp = '$curp'";
    $result = $conn->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }


    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Ficha</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                background-color: #f8f9fa;
            }

            #container {
                margin-top: 20px;
            }

            h1 span {
                font-weight: bold;
                color: #007bff;
            }

            h2 {
                margin-bottom: 20px;
            }

            p {
                font-size: 16px;
                line-height: 1.6;
            }

            .card {
                border: none;
            }

            .card-body {
                padding: 30px;
            }

            #logo {
                max-width: 200px;
                /* Ajusta el tamaño según sea necesario */
                margin-bottom: 20px;
                /* Espacio entre el logo y el título */
            }

            .data-section {
                margin-bottom: 30px;
            }

            .data-section legend {
                font-weight: bold;
                color: #007bff;
                font-size: 18px;
            }

            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -20px;
                margin-left: -20px;
            }

            .small-image {
                max-width: 25%;
                /* Puedes ajustar este valor según tus necesidades */
                height: auto;
            }

            @media print {
                body {
                    background-color: #ffffff;
                    /* Fondo blanco para la impresión */
                }

                .card {
                    box-shadow: none;
                    /* Elimina la sombra de la tarjeta */
                }

                .text-center {
                    text-align: center;
                    /* Alinea el texto al centro en la impresión */
                }

                @page {
                    size: tabloid;
                    /* Establece el tamaño del papel en tabloide (11x17 pulgadas) */
                    margin: 1cm;
                    /* Establece los márgenes del papel (puedes ajustar según sea necesario) */
                }

                /* Agrega estilos adicionales según sea necesario */

                /* Hace visible solo la sección principal al imprimir */
                .principal {
                    display: block !important;
                }

                /* Oculta el botón de impresión al imprimir */
                .btn-primary {
                    display: none !important;
                }

                .btn-secondary {
                    display: none !important;
                }
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>

    <body>
        <!-- Agrega un botón para volver -->
        <div class="text-center mt-4">
            <a class="btn btn-secondary" href="../index.php">Volver</a>
        </div>
        <div class="container mt-4">

            <h1 class="text-center"><span>Escuela secundaria número 55</span></h1>

            <section class="principal row">
                <main class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <img id="logo" src="../img/im1.png" alt="Logo de la Escuela" class="mx-auto d-block img-fluid">

                            <h2 class="text-center">Datos de la Ficha</h2>

                            <?php
                            // Mostrar los datos obtenidos
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <!-- Datos Personales -->
                                <div class="data-section">
                                    <fieldset>
                                        <legend>Datos Personales</legend>
                                        <?php
                                        // Mostrar la imagen
                                        $imageFileName = $row['fotoA'];  // Obtén el nombre del archivo
                                        $imagePath = "../fotos_alumnos/" . $imageFileName;  // Construye la ruta completa
                                        if (file_exists($imagePath)) {
                                            echo '<img src="' . $imagePath . '" alt="Foto del Alumno" class="small-image">';
                                        } else {
                                            echo '<div class="alert alert-warning" role="alert">La imagen no está disponible.</div>';
                                        }
                                        ?>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <strong>Nombre:</strong>
                                                <?php echo $row["nombres"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Apellido Paterno:</strong>
                                                <?php echo $row["apellidoP"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Apellido Materno:</strong>
                                                <?php echo $row["apellidoM"]; ?>
                                            </div>

                                        </div>

                                        <!-- Otros campos de datos personales -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>CURP:</strong>
                                                <?php echo $row["curp"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Género:</strong>
                                                <?php echo $row["genero"]; ?>
                                            </div>
                                            <!-- Otros campos de datos personales -->
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Datos del Padre o Tutor -->
                                <div class="data-section">
                                    <fieldset>
                                        <legend>Datos del Padre o Tutor</legend>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Nombre:</strong>
                                                <?php echo $row["nombre_pmt"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Apellido Paterno:</strong>
                                                <?php echo $row["pmt_apellidoP"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Apellido Materno:</strong>
                                                <?php echo $row["pmt_apellidoM"]; ?>
                                            </div>
                                        </div>
                                        <!-- Otros campos de datos del padre o tutor -->
                                        <div class="row">
                                            <!-- Otros campos de datos del padre o tutor -->
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Dirección -->
                                <div class="data-section">
                                    <fieldset>
                                        <legend>Dirección</legend>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Código Postal:</strong>
                                                <?php echo $row["cp"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Estado:</strong>
                                                <?php echo $row["estado"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Ciudad:</strong>
                                                <?php echo $row["ciudad"]; ?>
                                            </div>
                                        </div>
                                        <!-- Otros campos de dirección -->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <strong>Calle:</strong>
                                                <?php echo $row["calle"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Colonia:</strong>
                                                <?php echo $row["colonia"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Número Interior/Exterior:</strong>
                                                <?php echo $row["n_in_ext"]; ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Escolaridad -->
                                <div class="data-section">
                                    <fieldset>
                                        <legend>Escolaridad</legend>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Número de Primaria:</strong>
                                                <?php echo $row["n_primaria"]; ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Promedio:</strong>
                                                <?php echo $row["promedio"]; ?>
                                            </div>
                                        </div>
                                        <!-- Otros campos de escolaridad -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Estado:</strong>
                                                <?php echo $row["p_estado"]; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Ciudad:</strong>
                                                <?php echo $row["p_ciudad"]; ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Formato Ficha de Inscripción -->
                                <div class="data-section">
                                    <fieldset>
                                        <legend>Formato Ficha de Inscripción</legend>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Fecha de Registro:</strong>
                                                <?php echo date('Y-m-d H:i:s'); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Costo de la Ficha:</strong>
                                                $1400 pesos
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Fecha del Examen:</strong>
                                                20 de Febrero 2024
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </main>
            </section>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="imprimirFicha()">Imprimir Ficha</button>
        </div>


        <script>
            function imprimirFicha() {
                // Abre la ventana de impresión
                window.print();
            }
        </script>
    </body>

    </html>

    <?php
    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporcionó una CURP, redirige al formulario de búsqueda
    header("Location: busqueda.php");
    exit();
}
?>