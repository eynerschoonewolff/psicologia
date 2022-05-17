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
  <title>Agendar cita</title>
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


  <div class="container shadow-lg">
    <div class="row my-4 mt-4">
      <div class="col-lg-6 col-sm-6 col-12 d-grid gap-2 my-4 text-center">
        <div class="card mx-auto d-block" style="width: 15rem;">
          <img src="../../img/ejemplo 1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Charles Ibañez</h5>
            <p class="card-text">Psicologo especialista en desarrollo humano. Temas de consulta: Desarrollo personal,
              autoconocimiento.</p>
            <a href="agendar/psicologo1.php" class="btn btn-primary">Agendar cita</a>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-12 d-grid gap-2 my-4 text-center">
        <div class="card mx-auto d-block" style="width: 15rem;">
          <img src="../../img/ejemplo 2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Sonya Pedroso</h5>
            <p class="card-text">Licenciada en psicología. Temas de consulta: Depresión, Angustia, Manejo del estres.
            </p>
            <a href="agendar/psicologo2.php" class="btn btn-primary">Agendar cita</a>
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
      © 2022 Copyright:
      <a class="text-dark" href="#">ITSA</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>