<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/f_ficha.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        $(document).ready(function () {
            // ... (código existente)

            // Manejo del envío del formulario
            $('#myForm').submit(function (event) {
                // Detiene el envío del formulario para realizar la verificación
                event.preventDefault();

                // Obtiene la CURP ingresada por el usuario
                var curp = $('input[name="curp"]').val();
                console.log('CURP ingresada:', curp);

                // Realiza la verificación en el servidor mediante AJAX
                $.ajax({
                    type: 'POST',
                    url: './funcionesphp/verificar_curp.php', // Asegúrate de que la ruta sea correcta
                    data: { curp: curp },
                    contentType: 'application/x-www-form-urlencoded', // Agrega esta línea
                    success: function (response) {
                        console.log('Respuesta del servidor:', response);
                        if (response === 'curp_duplicada') {
                            // Muestra el modal de CURP duplicada
                            $('#curpDuplicadaModal').modal('show');
                        } else {
                            // Si no hay duplicados, envía el formulario
                            $('#myForm')[0].submit();
                        }
                    },
                    error: function (error) {
                        console.error('Error al verificar CURP:', error);
                    }
                });
            });
        });

    </script>


</head>


<body>
    <!-- Modal de CURP duplicada -->
    <div class="modal fade" id="curpDuplicadaModal" tabindex="-1" role="dialog"
        aria-labelledby="curpDuplicadaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="curpDuplicadaModalLabel">Error de Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    La CURP ya ha sido registrada. Por favor, ingresa una CURP diferente.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Formulario de Inscripción</h2>
                <form id="myForm" action="./funcionesphp/registro.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="custom-legend">Datos del Egresado</legend>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nombres:</label>
                                <input type="text" class="form-control" name="nombres" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Apellido Paterno:</label>
                                <input type="text" class="form-control" name="apellidoP" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Apellido Materno:</label>
                                <input type="text" class="form-control" name="apellidoM" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Foto del Alumno (Archivo):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileAlumno" name="fotoA"
                                        required>
                                    <label class="custom-file-label" for="customFileAlumno">Seleccionar archivo</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mexicana-fields">
                                <label>CURP:</label>
                                <input type="text" class="form-control" name="curp" required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Género:</label>
                                <select class="form-control" name="genero" required>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" name="fecha_n" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nacionalidad:</label>
                                <select class="form-control" name="nacionalidad" required>
                                    <option value="Mexicana">Mexicana</option>
                                    <option value="Americana">Americana</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mexicana-fields">
                                <label>Estado de Nacimiento:</label>
                                <select class="form-control" name="est_nacimiento" required>
                                    <option value="">Seleccionar Estado</option>
                                    <?php
                                    $estados = array(
                                        'Aguascalientes',
                                        'Baja California',
                                        'Baja California Sur',
                                        'Campeche',
                                        'Chiapas',
                                        'Chihuahua',
                                        'Ciudad de México',
                                        'Coahuila',
                                        'Colima',
                                        'Durango',
                                        'Guanajuato',
                                        'Guerrero',
                                        'Hidalgo',
                                        'Jalisco',
                                        'México',
                                        'Michoacán',
                                        'Morelos',
                                        'Nayarit',
                                        'Nuevo León',
                                        'Oaxaca',
                                        'Puebla',
                                        'Querétaro',
                                        'Quintana Roo',
                                        'San Luis Potosí',
                                        'Sinaloa',
                                        'Sonora',
                                        'Tabasco',
                                        'Tamaulipas',
                                        'Tlaxcala',
                                        'Veracruz',
                                        'Yucatán',
                                        'Zacatecas'
                                    );

                                    foreach ($estados as $estado) {
                                        echo "<option value='$estado'>$estado</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mexicana-fields">
                                <label>Ciudad de Nacimiento:</label>
                                <input type="text" class="form-control" name="est_nac_cd" required>
                            </div>
                            <div class="form-group col-md-4 americana-fields">
                                <!-- Campos específicos para nacionalidad americana, si es necesario -->
                            </div>
                        </div>
                    </fieldset>

                    <!-- Datos de Los Tutores -->
                    <fieldset>
                        <legend class="custom-legend">Datos Del Padre o Tutor</legend>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nombre(s):</label>
                                <input type="text" class="form-control" name="nombre_pmt" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label>Apellido paterno:</label>
                                <input type="text" class="form-control" name="pmt_apellidoP" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Apellido Materno:</label>
                                <input type="text" class="form-control" name="pmt_apellidoM" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Fecha de Nacimieneto:</label>
                                <input type="date" class="form-control" name="pmt_fecha_nacim" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nacionalidad:</label>
                                <select class="form-control" name="pmt_nacionalidad" required>
                                    <option value="Mexicana">Mexicana</option>
                                    <option value="Americana">Americana</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 pmt-mexicana-fields">
                                <label>Estado de Nacimiento:</label>
                                <select class="form-control" name="pmt_est_naci" required>
                                    <option value="">Seleccionar Estado</option>
                                    <?php
                                    $estados = array(
                                        'Aguascalientes',
                                        'Baja California',
                                        'Baja California Sur',
                                        'Campeche',
                                        'Chiapas',
                                        'Chihuahua',
                                        'Ciudad de México',
                                        'Coahuila',
                                        'Colima',
                                        'Durango',
                                        'Guanajuato',
                                        'Guerrero',
                                        'Hidalgo',
                                        'Jalisco',
                                        'México',
                                        'Michoacán',
                                        'Morelos',
                                        'Nayarit',
                                        'Nuevo León',
                                        'Oaxaca',
                                        'Puebla',
                                        'Querétaro',
                                        'Quintana Roo',
                                        'San Luis Potosí',
                                        'Sinaloa',
                                        'Sonora',
                                        'Tabasco',
                                        'Tamaulipas',
                                        'Tlaxcala',
                                        'Veracruz',
                                        'Yucatán',
                                        'Zacatecas'
                                    );

                                    foreach ($estados as $estado) {
                                        echo "<option value='$estado'>$estado</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 pmt-mexicana-fields">
                                <label>Ciudad de Nacimiento:</label>
                                <input type="text" class="form-control" name="pmt_cd_naci" required>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Dirección -->
                    <fieldset>
                        <legend class="custom-legend">Dirección</legend>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Código Postal:</label>
                                <input type="text" class="form-control" name="cp" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Estado:</label>
                                <select class="form-control" name="estado" required>
                                    <option value="">Seleccionar Estado</option>
                                    <?php
                                    $estados = array(
                                        'Aguascalientes',
                                        'Baja California',
                                        'Baja California Sur',
                                        'Campeche',
                                        'Chiapas',
                                        'Chihuahua',
                                        'Ciudad de México',
                                        'Coahuila',
                                        'Colima',
                                        'Durango',
                                        'Guanajuato',
                                        'Guerrero',
                                        'Hidalgo',
                                        'Jalisco',
                                        'México',
                                        'Michoacán',
                                        'Morelos',
                                        'Nayarit',
                                        'Nuevo León',
                                        'Oaxaca',
                                        'Puebla',
                                        'Querétaro',
                                        'Quintana Roo',
                                        'San Luis Potosí',
                                        'Sinaloa',
                                        'Sonora',
                                        'Tabasco',
                                        'Tamaulipas',
                                        'Tlaxcala',
                                        'Veracruz',
                                        'Yucatán',
                                        'Zacatecas'
                                    );

                                    foreach ($estados as $estado) {
                                        echo "<option value='$estado'>$estado</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ciudad:</label>
                                <input type="text" class="form-control" name="ciudad" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Calle:</label>
                                <input type="text" class="form-control" name="calle" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Colonia:</label>
                                <input type="text" class="form-control" name="colonia" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Número Interior/Exterior:</label>
                                <input type="text" class="form-control" name="n_in_ext" required>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="custom-legend">Escolaridad</legend>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nombre de Primaria:</label>
                                <input type="text" class="form-control" name="n_primaria" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Estado de Procedencia:</label>
                                <select class="form-control" name="p_estado" required>
                                    <option value="">Seleccionar Estado</option>
                                    <?php
                                    $estados = array(
                                        'Aguascalientes',
                                        'Baja California',
                                        'Baja California Sur',
                                        'Campeche',
                                        'Chiapas',
                                        'Chihuahua',
                                        'Ciudad de México',
                                        'Coahuila',
                                        'Colima',
                                        'Durango',
                                        'Guanajuato',
                                        'Guerrero',
                                        'Hidalgo',
                                        'Jalisco',
                                        'México',
                                        'Michoacán',
                                        'Morelos',
                                        'Nayarit',
                                        'Nuevo León',
                                        'Oaxaca',
                                        'Puebla',
                                        'Querétaro',
                                        'Quintana Roo',
                                        'San Luis Potosí',
                                        'Sinaloa',
                                        'Sonora',
                                        'Tabasco',
                                        'Tamaulipas',
                                        'Tlaxcala',
                                        'Veracruz',
                                        'Yucatán',
                                        'Zacatecas'
                                    );

                                    foreach ($estados as $estado) {
                                        echo "<option value='$estado'>$estado</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ciudad de Procedencia:</label>
                                <input type="text" class="form-control" name="p_ciudad" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Dirección de Procedencia:</label>
                                <input type="text" class="form-control" name="p_direccion" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Promedio:</label>
                                <input type="number" step="0.01" class="form-control" name="promedio" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Última Boleta (Archivo):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileBoleta"
                                        name="ultima_boleta" required>
                                    <label class="custom-file-label" for="customFileBoleta">Seleccionar archivo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Costo de la Ficha:</label>
                            <span class="form-text text-muted">El costo de la ficha es de $1400 pesos.</span>
                        </div>
                        <div class="form-group">
                            <a href="./index.php" class="btn btn-outline-secondary">Cancelar y volver</a>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <script>
        $(document).ready(function () {
            // Oculta o muestra los campos de ciudad y estado según la nacionalidad seleccionada
            $('select[name="nacionalidad"]').change(function () {
                var nacionalidad = $(this).val();
                if (nacionalidad === 'Mexicana') {
                    $('.mexicana-fields').show().find(':input').prop('disabled', false);
                    $('.americana-fields').hide().find(':input').prop('disabled', true);
                } else if (nacionalidad === 'Americana') {
                    $('.mexicana-fields').hide().find(':input').prop('disabled', true);
                    $('.americana-fields').show().find(':input').prop('disabled', false);
                } else {
                    $('.mexicana-fields, .americana-fields').hide().find(':input').prop('disabled', true);
                }
            });

            // Oculta o muestra los campos de ciudad y estado del padre o tutor según la nacionalidad seleccionada
            $('select[name="pmt_nacionalidad"]').change(function () {
                var nacionalidad = $(this).val();
                if (nacionalidad === 'Mexicana') {
                    $('.pmt-mexicana-fields').show().find(':input').prop('disabled', false);
                    $('.pmt-americana-fields').hide().find(':input').prop('disabled', true);
                } else if (nacionalidad === 'Americana') {
                    $('.pmt-mexicana-fields').hide().find(':input').prop('disabled', true);
                    $('.pmt-americana-fields').show().find(':input').prop('disabled', false);
                } else {
                    $('.pmt-mexicana-fields, .pmt-americana-fields').hide().find(':input').prop('disabled', true);
                }
            });

            // Manejo del envío del formulario
            $('#myForm').submit(function () {
                // Habilita todos los campos antes de enviar el formulario
                $(this).find(':input').prop('disabled', false);
            });
        });

    </script>



</body>

</html>