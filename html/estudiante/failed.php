<?php
    session_start();
    
    if(!$_SESSION['estudiante']){
      header("Location: ../login.html");
    }else{
      include("../../database/con_db.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitudes</title>
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>

  <div class="col-lg-12 text-center bg-light">
    <img src="../../img/cabezera.png" class="img-fluid w-25">
  </div>


  <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
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


  <div class="container container shadow-lg my-5">
        <div class="row m-3">
            <div class="col-lg-8 py-5 px-4">
                <p class="fs-4 px-5">¡Vaya! parece que la reunión aun no empieza. Espera a que tu psicólogo habilite la sala para que puedas unirte a la reunion. <a href="charlemos.php" class="text-decoration-none">Presiona aquí para volver a “Charlemos”.</a></p>              
            </div>
            <div class="col-lg-4">
                <img src="../../img/jake_esperando.png" class="img-fluid" alt="">              
            </div>
        </div>
    </div>

  <footer class="text-center text-white bg-light">
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
      © 2022 Copyright:
      <a class="text-dark" href="#">ITSA</a>
    </div>
    <!-- Copyright -->
  </footer>

</body>

</html>