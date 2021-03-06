<?php
    session_start();
    
    if(!$_SESSION['estudiante']){
      header("Location: ../login.html");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Cómo combatir el maltrato en jóvenes y niños? </title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="col-lg-12 text-center bg-light">
        <img src="../../img/cabezera.png" class="img-fluid w-25">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 px-5">
        <div class="container-fluid">
            <img src="../../img/logo_colegio.png" alt="" class="col-sm-2 col-lg-2 col-3 navbar-brand">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="inicioEstudiante.php">Inicio</a>
                    <a class="nav-link" href="agendar.php">Agendar cita</a>
                    <a class="nav-link" href="charlemos.php">Charlemos</a>
                    <a class="nav-link" href="blogest.php">Blog</a>
                    <a class="nav-link" href="contactoest.php">Contacto</a>
                </div>
            </div>
            <div class="p-2 mt-3">
                <p class="fs-3">
                    <?php echo $_SESSION['estudiante']['nombres']?>
                </p>
            </div>

            <div class="p-2 mt-2">
                <a class="btn btn-outline-danger" href="../../database/sign_out.php" role="button">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="container shadow-lg my-5">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-lg-12 my-auto px-5 p-3">
            <div class="m-4">
                <h3 class="text-center">Cómo prevenir el maltrato infantil: en la comunidad, el hogar y en el día a
                    día</h3>
            </div>
            <div class="row g-0">
                <div class="col-xl-8 col-lg-8 col-sm-8 col-lg-8 my-auto px-5 p-3">
                    <img src="../../img/blog-04.png" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 col-lg-4 p-4">
                    <h5 class="h2 py-2">En la comunidad</h5>
                    <p>
                        -Para prevenir el maltrato infantil en los niveles sociales comunitarios, es importante la
                        introducción de reformas jurídicas y cumplimiento de derechos, esto se realiza a través de:
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Reforzar los sistemas jurídicos </li>
                        <li class="list-group-item list-group-item-info">Promover los derechos sociales, culturales
                            y económicos </li>
                        <li class="list-group-item list-group-item-warning">Que la Convención sobre los Derechos del
                            Niño sea plasmada en el escenario nacional.</li>
                    </ul>

                </div>
                <div class="col-xl-12 col-lg-12 col-sm-12 col-lg-12 p-4">
                    <p class="card-text">-Modificación de paradigmas y normas sociales y culturales, que permitan la
                        violencia hacia
                        los niños y niñas.-Reducción de las desigualdades económicas. Que incluyen: </p>

                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Eliminación de la pobreza </li>
                        <li class="list-group-item list-group-item-info">Reducción de las desigualdades de ingresos
                            y la brecha salarial de género </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row">
            <h2 class="text-center">En el hogar</h2>
            <img src="../../img/maltrato-en-el-hogar.webp" alt="..."
                class="col-xl-6 col-lg-6 col-sm-6 col-lg-6 p-4 float-left">
            <div class="col-xl-6 col-lg-6 col-sm-6 col-lg-6 p-4 float-end">
                <img src="../../img/evitar-pegar-a-los-hijos-min-1200x900.jpg" alt="..." class="img-fluid">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-lg-12 p-4">
                <p class="card-text">La prevención del maltrato infantil en casa se logra a través de: </p>

                <ul class="list-group">
                    <li class="list-group-item list-group-item-success">Programas de visita al hogar </li>
                    <li class="list-group-item list-group-item-info">Formación en las funciones y roles parentales </li>
                </ul>

                <p class="card-text p-3">Las maneras de prevenir el maltrato infantil dentro del hogar es fortalecer los
                    vínculos de los padres
                    con sus hijos e hijas, así como incorporar métodos de disciplina no violentos, igualmente es
                    necesario
                    que vivan en un hogar que les brinde condiciones adecuadas para un desarrollo mental positivo. </p>

                <p class="card-text">Así mismo, los programas de visitas al hogar ayudan a prevenir el maltrato al
                    orientar y
                    apoyar los roles parentales. </p>

            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-sm-12 col-lg-12 p-4">
            <h1 class="text-center p-3">
                En el individuo
            </h1>

            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Reduciendo los embarazos no deseados </li>
                <li class="list-group-item list-group-item-info">Mejor acceso a servicios prenatales y postnatales</li>
                <li class="list-group-item list-group-item-warning">Orientación a niñas y niños para que puedan
                    reconocer y evitar situaciones de maltrato infantil.</li>
            </ul>
        </div>

        <p class="card-text p-3">A nivel individual prevenir el maltrato infantil se enfoca en el cambio de actitudes,
            convicciones y comportamientos. Así mismo la disminución de embarazos no deseados puede repercutir en la
            reducción del maltrato infantil. Al igual que garantizar el acceso a servicios prenatales y posnatales es
            una oportunidad de que los nuevos padres tengan contacto con programas de formación parental. </p>
    </div>
    <footer class="text-center text-white bg-light mt-5">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="bi bi-facebook"></i></a>

                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="bi bi-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="bi bi-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="bi bi-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="bi bi-linkedin"></i></a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
                    data-mdb-ripple-color="dark"><i class="bi bi-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3 bg-light">
            © 2020 Copyright:
            <a class="text-dark" href="#">ITSA</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>