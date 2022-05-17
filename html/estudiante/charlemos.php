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
  <title>Inicio</title>
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

    <div class="row py-4 px-4">

      <div class="col-lg-12 text-center px-5">
        <p class="fs-3">Orientaciones del día</p>
      </div> 

      <div class="col-lg-6 py-2">
        <div class="list-group">

          <?php $sw = FALSE; ?>         

          <?php 
              $id_es = $_SESSION['estudiante']['identificacion'];
              $consulta = "SELECT ps.nombres, o.estado, o.fecha, o.hora, o.codigo, o.sala from estudiante e, psicologo ps, orientacion o where o.id_estudiante = '$id_es' and e.identificacion = '$id_es' and o.id_psicologo = ps.identificacion;";
              $resultado = mysqli_query($conex,$consulta);

              while($mostrar = mysqli_fetch_array($resultado)){
                
                if ($mostrar['estado'] == 'Aceptada' and $mostrar['fecha'] == date('Y-m-d')) {
                  $sw = TRUE;
                  if(!$mostrar['sala']){
                    $link = 'failed.php';
                  }else{
                    if($mostrar['sala']==1){
                      $link ='sala1.php';
                    }elseif($mostrar['sala']==2){
                      $link ='#2';
                    }elseif($mostrar['sala']==3){
                      $link ='#3';
                    }elseif($mostrar['sala']==4){
                      $link ='#4';
                    }
                  }
          ?>


              <a href="<?php echo $link ?>" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Código de la reunión : <?php echo $mostrar['codigo'] ?> </h5>
                  <small class="text-muted"><?php echo $mostrar['fecha'] ?></small>
                </div>
                <p class="mb-1">Tienes un encuentro con el psicólogo <?php echo $mostrar['nombres'] ?> a las <?php echo $mostrar['hora'] ?>. Puedes unirte a través de este enlace durante la
                  hora de la reunión.</p>
              </a>

              <?php
              }}
            ?>         
        </div>

        <?php if ($sw == FALSE) { ?>

          <div class="col-lg-12 py-5">
              <p class="fs-4 px-5">No tienes reuniones programadas para el día de hoy. Puedes agendar una desde la pestaña <a href="agendar.php" class="text-decoration-none">Agendar citas.</a></p>              
          </div>
        
        <?php } ?>


      </div>
      <div class="col-lg-6">
        <img src="../../img/BMO.png" class="img-fluid mx-auto d-block w-75" alt="...">
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