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
        <div class="col-xl-10 col-lg-10 col-sm-12 col-lg-12 my-auto px-5">
            <h1 class="display-6 m-2">Síntomas de que estás sufriendo maltrato psicológico</h1>
        </div>

        <div class="row g-0">
            <div class="col-xl-8 col-lg-8 col-sm-8 col-lg-8 my-auto px-5 mt-5">
                <img src="../../img/blog-02.png" class="img-fluid rounded-start" alt="...">
                <p class="m-4">
                    El maltrato psicológico es una forma de agresión donde una persona ejerce un poder sobre otra, con
                    comportamientos físicos o verbales de forma reiterada que atentan contra la estabilidad emocional.
                    La
                    víctima sufre intimidación, culpa y baja autoestima, sin lograr salir de la situación donde se
                    siente
                    prisionera.
                </p>
            </div>


            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card-section border rounded p-3 mb-3">
                    <div class="card-header-first rounded pb-5">
                        <h5 class="card-header-title text-white text-center pt-3">¿Qué es el maltrato psicologico en la
                            escuela?</h5>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text">El acoso escolar es el acto de agresión u hostigamiento, realizado por
                            estudiantes que atenten en contra de otro estudiante, valiéndose de una situación de
                            superioridad. Estos actos agresivos pueden ser cometidos por un solo estudiante o por un
                            grupo, y puede ser tanto dentro como fuera del establecimiento educacional.</p>
                    </div>
                </div>



                <div class="card-section border rounded">
                    <div class="card-header card-header-second rounded">
                        <h4 class="card-header-title mb-3 mt-1 text-center text-white">Maltrato psicológico infantil
                        </h4>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text">El maltrato psicológico es conocido también como abuso psicológico o abuso
                            emocional. Este tipo de maltrato comprende comportamientos como poner en ridículo,
                            intimidar, insultar, rechazar o humillar a un niño.</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="row m-4">
            <div class="offset-lg-4 col-lg-8">
                <ul class="nav nav-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#elemento" role="tab">Síntomas de
                            maltrato </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#elemento2" role="tab">El maltrato
                            en adolescentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#elemento3" role="tab">Depresión en adolescentes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content m-3">


            <div class="tab-pane active" id="elemento" role=" tabpanel">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-md-3 mb-lg-0">
                        <img src="../../img/istockphoto-1306836428-612x612.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-8 mb-md-5">
                        <h4 class="lead p-1">
                            Síntomas de maltrato psicológico
                        </h4>
                        <p>Mantener una situación de maltrato psicológico siempre tiene consecuencias directas para
                            quien lo sufre. No son situaciones que se reparen con el tiempo, ni solas ni con nuestra
                            ayuda. Acaban apareciendo enfermedades físicas y sintomatología mental que deterioran
                            seriamente la salud.</p>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-success">1. Sus necesidades van siempre antes
                                que las tuyas
                            </li>
                            <li class="list-group-item list-group-item-info">2. Te hace sentir que no eres válido ni
                                capaz</li>
                            <li class="list-group-item list-group-item-warning">3. Rompe toda estabilidad en tu vida
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="elemento2" role="tabpanel">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-md-3 mb-lg-0">
                        <img src="../../img/123160080-ilustración-de-dibujos-animados-de-vector-de-personas-hombre-agresivo-gritándole-a-la-mujer-marido-e.jpg"
                            alt="" class="img-fluid">
                    </div>
                    <div class="col-md-8 mb-md-5">
                        <h4 class="lead p-1">
                            El maltrato psicológico en adolescentes
                        </h4>
                        <p>El maltrato psicológico consiste, en pocas palabras, en dañar a otro individuo mediante
                            el uso del discurso negativo. Por ejemplo, descalificaciones e insultos,
                            independientemente del tono de voz (pues no siempre se necesitan gritos para hacer que
                            una persona se sienta mal). Por lo tanto, genera sentimientos de inferioridad,
                            vergüenza, angustia, abandono, desasosiego, intranquilidad, rechazo, etcétera.</p>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="elemento3" role="tabpanel">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-md-3 mb-lg-0">
                        <img src="../../img/maltrato-pscicologicp.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-8 mb-md-5">
                        <h4 class="lead p-1">
                            ¿Qué es la depresión en los adolescentes?
                        </h4>
                        <p>La depresión en adolescentes es una enfermedad médica grave. Es más que sentirse triste
                            durante unos días. Es un intenso sentimiento de tristeza, desesperanza e ira o
                            frustración que dura mucho tiempo. Estos sentimientos hacen que te sea difícil tener una
                            vida normal y hacer tus actividades habituales. También puedes tener problemas para
                            concentrarte y no tener motivación o energía. La depresión puede hacerte difícil
                            disfrutar la vida o incluso superar el día.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




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