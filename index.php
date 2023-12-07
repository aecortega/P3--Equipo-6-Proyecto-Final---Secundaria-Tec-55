<?php
if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'registro_exitoso') {
    echo "<div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
            Registro exitoso. ¡Busca tu Ficha con tu CURP!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ESC. Secundaria Tec. #55</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
    <div id="container" class="container mt-4">
        <header class="text-center">
            <h1 class="mb-4">Escuela Secundaria Número 55</h1>
        </header>

        <section class="principal row">
            <aside class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Ficha de Inscripción</h2>
                        <a href="./formularioficha.php" class="btn btn-primary btn-block btn-tramitar-ficha">Tramitar
                            Ficha</a>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Buscar Ficha</h2>
                        <form action="./funcionesphp/mostrar_ficha.php" method="GET">
                            <div class="form-group">
                                <label for="curp">CURP:</label>
                                <input type="text" class="form-control" id="curp" name="curp" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-buscar">Buscar</button>
                        </form>
                    </div>
                </div>
            </aside>

            <main class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <img src="img/im1.png" alt="imagen" class="img-fluid float-right">
                        <br>
                        <h5>1987 el halcón emprende el vuelo para hacer su nido y así nace la casa de los halcones en
                            Cd. Juárez
                            y con ella nacen las ilusiones, sueños y anhelos de quienes a partir de la nada lo crearon
                            todo.
                            Nacen las causas de una nueva escuela que forjará jóvenes estudiantes con un mejor futuro.
                            Porque
                            cada alumno que ingresa es una razón de ser.</h5>

                        <p>
                        <h5>
                            Porque con su fundación surgen nuevos héroes y profesores, nace el orgullo de ser halcón, se
                            escribe una historia sí, pero comienza otra, nacen nuevos escritores, lectores,
                            historiadores,
                            matemáticos, físicos, biólogos, informáticos, artistas, técnicos, deportistas, nacen
                            nuestros
                            valores, nace la unidad, nuestras tradiciones, nuestras celebraciones, nacen nuevas
                            costumbres
                            que día a día enriquecen la educación de nuestro país, así es como nace nuestra escuela, una
                            escuela con historia, con un pasado tan orgulloso como glorioso.<br><br>
                            <img src="img/Captura de pantalla 2023-11-22 094126.png" alt="IMAGEN" height="300"
                                width="600"><br><br>

                            Hoy a 28 años de su fundación seguimos con orgullo haciendo de la casa de los halcones la
                            mejor
                            escuela secundaria técnica de la zona 3, hacemos que todo alumno que la técnica 55 entrega a
                            la
                            sociedad es una persona con valores, conocimientos y con la capacidad para encontrar un
                            mejor
                            futuro y una mejor vecindad, que aquí conoce amigos, más que profesores, que los directivos,
                            los
                            prefectos, los orientadores, trabajo social dejan una huella en lo más profundo de su ser y
                            que
                            cada alumno encuentra en esta casa un recuerdo inolvidable durante esta etapa de su
                            vida.<br><br>

                            Que surgen sólo alumnos ganadores y padres de familia con la confianza de traer a sus hijos
                            a una
                            escuela con la mejor ética profesional, que 28 años parece poco pero son 25 generaciones
                            egresadas
                            de esta escuela y que cada año que regresan inflan su pecho lleno de orgullo y satisfacción
                            por
                            haber egresado de la mejor escuela secundaria técnica de Cd. Juárez, una escuela que no
                            tiene
                            igual, la escuela secundaria técnica no.55 es nuestra y tiene el mejor personal, los mejores
                            alumnos y los mejores ciudadanos.
                        </h5>
                        </p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.2053399770352!2d-106.4157064547726!3d31.65560145371322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e75ded00f575ed%3A0x4c7b36737046273f!2sSECUNDARIA%20T%C3%89CNICA%20NO.%2055!5e0!3m2!1ses-419!2smx!4v1700672344004!5m2!1ses-419!2smx"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </main>
        </section>



        <footer class="mt-3 text-center">
            <p>Las 4 Ases y un Comodin</p>
        </footer>
    </div>

    <div class="modal fade" id="webmasterModal" tabindex="-1" role="dialog" aria-labelledby="webmasterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="webmasterModalLabel">Inicio de Sesión del Webmaster</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes colocar el formulario de inicio de sesión del webmaster -->
                    <form id="webmasterLoginForm">
                        <div class="form-group">
                            <label for="webmasterUsername">Usuario:</label>
                            <input type="text" class="form-control" id="webmasterUsername" name="usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="webmasterPassword">Contraseña:</label>
                            <input type="password" class="form-control" id="webmasterPassword" name="contraseña"
                                required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="autenticarWebmaster()">Iniciar
                            Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Función para abrir el modal del webmaster al presionar Ctrl + M
        document.addEventListener('keydown', function (event) {
            // Verifica si la tecla Ctrl y la tecla M están presionadas simultáneamente
            if ((event.ctrlKey || event.metaKey) && event.key.toUpperCase() === 'M') {
                // Muestra el modal del webmaster
                $('#webmasterModal').modal('show');
            }
        });

        function autenticarWebmaster() {
            // Obtener los datos del formulario
            var formData = $('#webmasterLoginForm').serialize();

            // Realizar una solicitud AJAX para autenticar al webmaster
            jQuery.ajax({
                type: 'POST',
                url: 'funcionesphp/autenticar_inicio.php', // Ajusta la ruta según tu configuración
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Autenticación exitosa, redirige a administrador.php
                        alert(response.message);  // Puedes mostrar un mensaje si lo deseas

                        // Redirigir a administrador.php
                        window.location.href = 'administrador.php';

                    } else {
                        // Autenticación fallida, muestra un mensaje de error
                        alert(response.message);
                    }
                },
                error: function () {
                    // Error en la solicitud AJAX
                    alert('Error en la solicitud AJAX');
                }
            });
        }

    </script>
</body>

</html>