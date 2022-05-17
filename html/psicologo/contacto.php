<?php
session_start();

if (!$_SESSION['psicologo']) {
    header("Location: ../login.html");
} else {
    include("../../database/con_db.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="../../js/JS property/correoSoportePsciologo.js"></script>
    
</head>

<body>

    <div class="col-lg-12 text-center bg-light">
        <img src="../../img/cabezera.png" class="img-fluid w-25">
    </div>


    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="container-fluid">
            <img src="../../img/logo_colegio.png" alt="" class="col-sm-2 col-lg-2 col-3 navbar-brand">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="inicio.php">Solicitudes</a>
                <a class="nav-link" href="estadisticas.php">Consultas</a>
                <a class="nav-link" href="charlemos.php.">Charlemos</a>
                <a class="nav-link" href="contacto.php">Contacto</a>
                </div>
            </div>

            <div class="p-2 mt-3">
                <p class="fs-3">
                    <?php echo $_SESSION['psicologo']['nombres'] ?>
                </p>
            </div>

            <div class="p-2 mt-2">
                <a class="btn btn-outline-danger" href="../../database/sign_out.php" role="button">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="container shadow-lg my-5">
        <div class="row mt-3 pt-5">
            <div class="col-lg-12 text-center px-5">
                <p class="fs-3">Contacto</p>
                <p class="px-5">Comunícate con nosotros llenando este formulario o escribiendo a example@gmail.com</p>
            </div>
        </div>

        <form class="row g-3 mx-5" method="POST" name="formularioContactoPscicologo">
            <div class="row mt-3">
                <div class="col-lg-4 mb-3">
                    <label for="nombreContacto" class="form-label">Nombre *</label>
                    <input type="text" class="form-control" id="nombreContacto" placeholder="Your name">
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="emailContacto" class="form-label">Correo electrónico *</label>
                    <input type="email" class="form-control" id="emailContacto" placeholder="name@example.com">
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="telefonoContacto" class="form-label">Número de teléfono</label>
                    <input type="tel" class="form-control" id="telefonoContacto" maxlength="10" placeholder="3001111111">
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="asuntoContacto" class="form-label">Asunto</label>
                    <input type="text" class="form-control" id="asuntoContacto" placeholder="Peticion">
                </div>

                <div class="mb-3">
                    <label for="smsContacto" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="smsContacto" rows="3"></textarea>
                </div>
            </div>

            <div class="col-12 form-check">
                <input class="form-check-input" type="checkbox" value="" id="privacidadContacto">
                <label class="form-check-label" for="privacidadContacto">
                    Acepto la política de privacidad
                </label>
            </div>

            <div class="row my-3">
                <!--Botones-->
                <div class="col-lg-1">
                    <button class="btn btn-primary" type="button" onclick="SoporteEnvioPscicologo()">Enviar</button>
                </div>
            </div>
        </form>


    </div>
    <!--container-->

    <footer class="text-center text-white bg-light">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-facebook"></i></a>

                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-linkedin"></i></a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="bi bi-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3 bg-light">
            © 2022 Copyright:
            <a class="text-dark" href="#">ITSA</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>