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
    <div class="row px-5 py-4">
      <div class="col-lg-7">
        <div id="otEmbedContainer" class="img-fluid mx-auto d-block mb-2" style="width:800px; height:540px"></div>
        <script
          src="https://tokbox.com/embed/embed/ot-embed.js?embedId=79ac762a-3eb9-46e0-bc3d-5174d5fde150&room=DEFAULT_ROOM"></script>
      </div>
      <div class="col-lg-5">
        

        <form class="form-floating" action="../../database/actualizarFinal.php" method="POST" name="orientacion">

          <input type="email" class="form-control" id="codeOr" name="codeOr"
          value="<?php echo $_SESSION['psicologo']['id_reunion'];?>" readonly>
          <label for="codeOr">Código de la reunión </label>

          <div class="form-floating mt-3 mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="notaOrientacion"
              name="notaOrientacion" style="height: 350px"></textarea>
            <label for="notaOrientacion">Notas de la reunión </label>
          </div>

          <div class="col-md">
            <div class="form-floating mb-3">
              <select class="form-select" id="diagnostico" name="diagnostico"
                aria-label="Floating label select example">
                <option selected readonly value="Sin diagnostico">Seleccione una opcion</option>
                <option value="Depresión">Depresión </option>
                <option value="Ansiedad">Ansiedad</option>
                <option value="Procrastinación">Procrastinación</option>
              </select>
              <label for="floatingSelectGrid">Diagnóstico rápido </label>
            </div>
          </div>

          <div class="d-grid gap-2 pb-5">
            <button class="btn btn-primary" type="submit" name="upfinal">Enviar y finalizar</button>
          </div>
        </form>

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