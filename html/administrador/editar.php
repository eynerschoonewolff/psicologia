<?php
    session_start();
    
    if(!$_SESSION['administrador']){
      header("Location: ../login.html");
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="../../js/bootstrap.min.js"></script>
    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
                    <h5><a class="nav-link active text-warning" aria-current="page" href="inicioAdmin.php">Administracion</a></h5>
                </div>
            </div>
            <form class="d-flex mt-4">
                <table class="table table-borderless fs-3" id="usuariologin"></table>
            </form>

            <div class="p-2 mt-2">
                <a class="btn btn-outline-danger" href="../../database/sign_out.php" role="button">Cerrar sesión</a>
            </div>

        </div>
    </nav>

    <?php



    include_once "../../database/conexion.php";
    $codigo1 = $_GET['valor'];

    $sql = $bd->prepare("SELECT u.correo, u.contraseña, u.fech_reg,u.tip_user tipo_usuario_id, 
    e.nombres nombres_estudiante, e.apellidos apellidos_estudiante, 
    e.identificacion identificacion_estudiante, e.fecha_nacimiento fecha_nacimiento_estudiante, e.codigo_curso codigo_curso_estudiante,
    p.nombres nombres_psicologo, p.apellidos apellidos_psicologo, p.identificacion identificacion_psicologo
    FROM usuarios u
    LEFT JOIN estudiante e ON e.correo = u.correo
    LEFT JOIN psicologo p ON  p.correo = u.correo
    WHERE u.correo =?;");
    $sql->execute([$codigo1]);
    $usu = $sql->fetch(PDO::FETCH_OBJ);
    ?>

    <div class="container shadow-lg my-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Editar</h5>
                    </div>
                    <form action="../../database/procesoEditar.php" method="POST">
                        <div class="m-3">

                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">correo</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="correo" value="<?= $usu->correo; ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">actualizar correo</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="correoNuevo" value="<?= $usu->correo; ?>" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">contraseña</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="contraseña" value="<?= $usu->contraseña; ?>" required>
                                </div>
                            </div>
                            <!-- estudiantes -->

                            <div class="<?= $usu->tipo_usuario_id == "Psicologo" || $usu->tipo_usuario_id =="Administrador" ? 'd-none' : ''  ?>">
                               
                                <div class="mb-4 row">
                                    <label class="col-sm-2 col-form-label">identificacion</label>
                                    <div class="col-sm-9">
                                        <input type="number" value="<?= $usu->identificacion_estudiante ?>" disabled class="form-control" name="id">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label class="col-sm-2 col-form-label">nombres</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?=$usu->nombres_estudiante?>" name="nombresEstudiantes" disabled>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="staticName" class="col-sm-2 col-form-label">apellidos</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="apellidosEstudiante" value="<?=$usu->apellidos_estudiante?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label class="col-sm-2 col-form-label">fecha de nacimiento</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="inputFecha" name="fechaNacimiento" placeholder="dd-mm-yyyy" value="<?=$usu->fecha_nacimiento_estudiante?>" min="1997-01-01" max="2030-12-31" readonly>
                                    </div>
                                </div>

                                <div class="mb-4 row ">
                                    <label class="col-sm-2 col-form-label">curso</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="gradoestudiante" value="<?=$usu->codigo_curso_estudiante?>" readonly>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- psicologo -->
                         
                            <div class="<?= $usu->tipo_usuario_id == "Estudiante" || $usu->tipo_usuario_id =="Administrador"  ? 'd-none' : '' ?>">
                                
                                <div class="mb-4 row">
                                    <label class="col-sm-2 col-form-label">nombres</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nombrespscicologo" value="<?=$usu->nombres_psicologo?>" readonly>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="staticName" class="col-sm-2 col-form-label">apellidos</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="apellidos"  value="<?=$usu->apellidos_psicologo?>"  readonly>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label class="col-sm-2 col-form-label">identificacion</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="idpscicologo"  value="<?=$usu->identificacion_psicologo?>"  readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">tipo de usuario</label>
                                <div class="col-sm-9">

                                    <input type="text" class="form-control" readonly name="tipoUsuario" value="<?=$usu->tipo_usuario_id; ?>">

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">fecha de registro</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="inputFecha" name="fechaRegistro" placeholder="dd-mm-yyyy" value="<?php echo $usu->fech_reg; ?>" min="1997-01-01" max="2030-12-31" readonly>
                                </div>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <footer class="text-center text-white bg-light">
      <!-- Grid container -->

      <div class="container pt-4">

        <nav class="row">
          <a href="inicioAdmin.php" class="col-3 text-reset ">
            <img src="../../img/logo_colegio.png" alt="..." class="col-sm-6 col-lg-6 col-6  rounded float-left" >
          </a>

          <a class="btn btn-link btn-floating btn-lg text-dark text-decoration-none m-1" href="html/contacto.html" role="button"
          data-mdb-ripple-color="dark"><i class="bi bi-person-lines-fill mb-3">Contacto</i><h6 class="m-2">psciologiacontacto@gmail.com</h6></a>
          
        </nav>
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.facebook.com/psicosaludg/" role="button"
            data-mdb-ripple-color="dark"><i class="bi bi-facebook"></i></a>

          <!-- Twitter -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://twitter.com/PS_POSITIVA" role="button"
            data-mdb-ripple-color="dark"><i class="bi bi-twitter"></i></a>

          <!-- Google -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://clinicadelamente.com/?gclid=CjwKCAjwsJ6TBhAIEiwAfl4TWLR19tmeKvY2I5fyTVgTCrHVhO35l2As-zSCr0TFMStM5mHsb8bA_hoC5AsQAvD_BwE" role="button"
            data-mdb-ripple-color="dark"><i class="bi bi-google"></i></a>

          <!-- Instagram -->
          <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/psicologiaconb/" role="button"
            data-mdb-ripple-color="dark"><i class="bi bi-instagram"></i></a>


        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center text-dark p-3 bg-light">
        © 2020 Copyright:
        <a class="text-dark" href="https://www.itsa.edu.co/">ITSA</a>
      </div>
      <!-- Copyright -->
    </footer>