<?php
    session_start();
    
    if(!$_SESSION['psicologo']){
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
  <title>Charlemos</title>
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
          <a class="nav-link active" aria-current="page" href="inicio.php">Solicitudes</a>
          <a class="nav-link" href="estadisticas.php">Consultas</a>
          <a class="nav-link" href="charlemos.php.">Charlemos</a>
          <a class="nav-link" href="contacto.php">Contacto</a>
        </div>
      </div>

      <div class="p-2 mt-3">
        <p class="fs-3">
          <?php echo $_SESSION['psicologo']['nombres']?>
        </p>
      </div>

      <div class="p-2 mt-2">
        <a class="btn btn-outline-danger" href="../../database/sign_out.php" role="button">Cerrar sesión</a>
      </div>
    </div>
  </nav>

  

  <div class="container shadow-lg my-5">    

  <div class="row mx-5">

    <div class="col-md-12 my-5">
        <div class="card">
          <div class="card-header fs-4 fw-normal bg-light text-center">
            Orientaciones del día 
          </div>
          <div class="p-4">
            <div class="table-responsive">
              <table class="table table-bordered table table-hover">
                <thead>
                  <tr class="p-2">
                    <th scope="col">Estudiante</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody id="tablacontenidoContacto">
            <?php
              $sw = FALSE; 
              $id_ps = $_SESSION['psicologo']['identificacion'];

              $consulta = "SELECT e.nombres, e.apellidos, e.identificacion, o.codigo, o.fecha, o.hora, o.estado from estudiante e, psicologo ps, orientacion o where o.id_psicologo = '$id_ps' and ps.identificacion = '$id_ps' and e.identificacion = o.id_estudiante;";
              $resultado = mysqli_query($conex,$consulta);

              while($mostrar = mysqli_fetch_array($resultado)){
                if ($mostrar['estado'] == 'Aceptada' and $mostrar['fecha'] == date('Y-m-d')) {
                  $sw = TRUE;
              ?>

            <tr>
              <td>
                <?php echo $mostrar['nombres']." ".$mostrar['apellidos'] ?><a class="text-info text-decoration-none"
                  href="#" data-bs-toggle="modal"
                  data-bs-target="#studentModal<?php echo $mostrar['identificacion']; ?>"> <i
                    title="Informacion del estudiante" class="bi-person-fill"></i></a>
              </td>
              <td>
                <?php echo $mostrar['codigo'] ?>
              </td>
              <td>
                <?php echo $mostrar['fecha'] ?>
              </td>
              <td>
                <?php echo $mostrar['hora'] ?>
              </td>
              <td>
                <?php echo $mostrar['estado'] ?>
              </td>
              <td>
                <div class="d-grid gap-2 d-md-block">
                  <button method="POST" type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#editsModal<?php echo $mostrar['codigo']; ?>" name="btt-edit">Empezar</button>
                </div>
              </td>
            </tr>

            <?php include('modalEstudiante.php'); ?>
            <?php include('modalSalas.php'); ?>

            <?php
              }}
            ?>

            <?php if ($sw == FALSE) { ?>            
            <tr class="text-center">
            <td colspan="6">No hay datos para mostrar</td>
            </tr>
            <?php } ?>
          </tbody>
              </table>
            </div>
          </div>
        </div>
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