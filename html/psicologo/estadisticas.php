<?php
session_start();
error_reporting(0);

if (!$_SESSION['psicologo']) {
    header("Location: ../login.html");
} else {
    include("../../database/conexion.php");
    $opciones = $_GET['opciones'];
    $consultaGeneral = $_GET['consultaGeneral'];
    $id_ps = $_SESSION['psicologo']['identificacion'];
    if ($opciones === 'Consulta1') {
        $sentencia = $bd->query("select e.nombres, e.apellidos, e.identificacion, o.estado, o.fecha, o.hora 
        from estudiante e 
        inner join orientacion o on e.identificacion = o.id_estudiante
        and o.id_psicologo = '$id_ps'");
        $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    } else if ($opciones === 'Consulta2') {
        
        $sentencia = $bd->query("SELECT e.nombres, e.apellidos, e.identificacion, o.diagnostico, o.estado,o.nota, o.fecha, o.hora from estudiante e
        INNER JOIN orientacion o on e.identificacion = o.id_estudiante
        where e.identificacion = '$consultaGeneral' and o.estado = 'Finalizada';
        ");
        $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    } else if ($opciones === 'Consulta3') {
        $op = 3;
        $sentencia = $bd->query("SELECT e.nombres,e.apellidos,e.codigo_curso, o.estado,o.diagnostico 
        FROM estudiante e
        INNER JOIN orientacion o ON o.id_estudiante = e.identificacion
        WHERE o.estado = 'Finalizada' and o.diagnostico = '$consultaGeneral' and o.id_psicologo = '$id_ps';
        ");
        $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    } else if ($opciones === 'Consulta4') {
        $sentencia = $bd->query("SELECT e.nombres,e.apellidos,o.hora,o.fecha, o.estado 
        FROM estudiante e
        INNER JOIN orientacion o ON o.id_estudiante = e.identificacion
        WHERE o.estado = 'Esperando aprobación';
        ");
        $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    } else if ($opciones === 'Consulta5') {
        $sentencia = $bd->query("SELECT e.nombres,e.apellidos, o.diagnostico, o.nota 
        FROM estudiante e
        INNER JOIN orientacion o ON o.id_estudiante = e.identificacion
        WHERE o.estado = 'Finalizada' and o.id_psicologo = '$id_ps';
        ");
        $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    } else if ($opciones === 'Consulta6') {
        $op = 6;
        $sentencia = $bd->query("SELECT e.nombres,e.apellidos,o.estado,o.fecha,o.hora, e.codigo_curso 
        FROM estudiante e
        INNER JOIN orientacion o ON o.id_estudiante = e.identificacion
        WHERE e.codigo_curso = '$consultaGeneral' and o.id_psicologo = '$id_ps';
        
        ");
        $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    } else if ($opciones === 'Consulta7') {
        $sentencia = $bd->query("SELECT count(*) citas, e.nombres,e.apellidos,e.codigo_curso
        FROM estudiante e
        INNER JOIN orientacion o ON o.id_estudiante = e.identificacion
        WHERE e.identificacion = '$consultaGeneral';        
        ");
        $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    } else if ($opciones === 'Consulta8') {
        // $sentencia = $bd->query("");
        // $estadistica = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
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

    <div class="container shadow-lg my-5 p-5">
        <div class="row justify-content-center ">
            <form id="formularioEstadistica" method="get">
                <div class="mb-4 m-4 row ">
                    <label class="col-sm-2 col-form-label">¿Que desea consultar?</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="opciones" name="opciones" required>
                            <option value="">Seleccione su consulta</option>
                            <option <?= $opciones == 'Consulta1' ? 'selected' : '' ?> value="Consulta1">Mostrar todas las orientaciones</option>
                            <option <?= $opciones == 'Consulta2' ? 'selected' : '' ?> value="Consulta2">Consultar orientaciones finalizadas de estudiante por número de identidad</option>
                            <option <?= $opciones == 'Consulta3' ? 'selected' : '' ?> value="Consulta3">Consultar por diagnóstico</option>
                            <option class="d-none"<?= $opciones == 'Consulta4' ? 'selected' : '' ?> value="Consulta4">#</option>
                            <option <?= $opciones == 'Consulta5' ? 'selected' : '' ?> value="Consulta5">Orientaciones finalizadas</option>
                            <option <?= $opciones == 'Consulta6' ? 'selected' : '' ?> value="Consulta6">Consultar orientaciones por curso</option>
                            <option class="d-none" <?= $opciones == 'Consulta7' ? 'selected' : '' ?> value="Consulta7">Consultar total de citas que tiene un estudiante por identificacion</option>
                            <option class="d-none" <?= $opciones == 'Consulta8' ? 'selected' : '' ?> value="Consulta8">consulta 8</option>
                        </select>
                    </div>
                </div>

                <?php if($op == 6){?>
                
                <div class="mx-5 row d-none" id="cajaConsulta">
                    <label id="ConsultaGene" name="ConsultaGene" class="col-sm-2 p-3 col-form-label">ID</label>

                    <div class="col-sm-9">    
                    <select class="form-select" id="consultaGeneral" name="consultaGeneral" required>
                            <option selected disabled value="">Seleccione curso</option>
                            <option value="11 - A">11 - A</option>
                            <option value="11 - B">11 - B</option>
                            <option value="11 - C">11 - C</option>
                        </select>
                    </div>

                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary m-4 col-xs-12 col-sm-6 col-md-4 ">buscar</button>
                    </div>
                </div>                 
                
                
                <?php }else if($op == 3){?>

                <div class="mx-5 row d-none" id="cajaConsulta">
                    <label id="ConsultaGene" name="ConsultaGene" class="col-sm-2 p-3 col-form-label">ID</label>

                    <div class="col-sm-9">    
                    <select class="form-select" id="consultaGeneral" name="consultaGeneral" required>
                            <option selected disabled value="">Seleccione el diagnostico</option>
                            <option value="Depresión">Depresión </option>
                            <option value="Ansiedad">Ansiedad</option>
                            <option value="Procrastinación">Procrastinación</option>
                        </select>
                    </div>

                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary m-4 col-xs-12 col-sm-6 col-md-4 ">buscar</button>
                    </div>
                </div>    

                <?php }else{?>
                    <div class="mx-5 row d-none" id="cajaConsulta">
                    <label id="ConsultaGene" name="ConsultaGene" class="col-sm-2 p-3 col-form-label">ID</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?= $consultaGeneral ?>" name="consultaGeneral"
                            id="consultaGeneral" required>
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary m-4 col-xs-12 col-sm-6 col-md-4 ">buscar</button>
                    </div>
                </div>    
                <?php }?>        
            </form>

            <div class="m-3">
                <div class="d-none" id="consulta1">
                    <div class="col-md-12">
                        <div class="card mx-5">
                            <div class="card-header fs-4 fw-normal bg-light text-center">
                                Todas las orientaciones 
                            </div>
                            <div class="m-3 my-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table table-hover">
                                        <thead>
                                            <tr class="p-2">
                                                <th scope="col">Estudiante</th>
                                                <th scope="col">Identificación</th>                                                
                                                <th scope="col">Estado</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Hora</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($estadistica)) { ?>
                                                <?php foreach ($estadistica as $info) { ?>
                                                    <tr>
                                                        <td scope="row"><?= $info->nombres." ".$info->apellidos; ?></td>
                                                        <td><?= $info->identificacion; ?></td>                                 
                                                        <td><?= $info->estado; ?></td>
                                                        <td><?= $info->fecha; ?></td>
                                                        <td><?= $info->hora; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        No hay datos que mostrar
                                                    </td>
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

            <div class="d-none" id="consulta2">

                <div class="col-md-12">
                    <div class="card mx-5">
                        <div class="card-header fs-4 fw-normal bg-light text-center">
                            Orientaciones por numero de identificacion
                        </div>
                        <div class="m-3 my-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-hover">
                                    <thead>
                                        <tr class="p-2">
                                            <th scope="col">Estudiante</th>
                                            <th scope="col">Identificación</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Diagnostico</th>
                                            <th scope="col">Nota</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($estadistica)) { ?>
                                            <?php foreach ($estadistica as $info) { ?>
                                                <tr>
                                                    <td scope="row"><?= $info->nombres." ".$info->apellidos; ?></td>
                                                    <td><?= $info->identificacion; ?></td>
                                                    <td><?= $info->fecha; ?></td>
                                                    <td><?= $info->diagnostico; ?></td>
                                                    <td><?= $info->nota; ?></td>                                                    
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    No hay datos que mostrar
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-none" id="consulta3">
                <div class="col-md-12">
                    <div class="card mx-5">
                        <div class="card-header fs-4 fw-normal bg-light text-center">
                             Consultas por diagnostico
                        </div>
                        <div class="m-3 my-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-hover">
                                    <thead>
                                        <tr class="p-2">
                                            <th scope="col">Estudiante</th>                                            
                                            <th scope="col">Curso</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Diagnostico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($estadistica)) { ?>
                                            <?php foreach ($estadistica as $info) { ?>
                                                <tr>
                                                    <td><?= $info->nombres." ".$info->apellidos;?></td>
                                                    <td><?= $info->codigo_curso; ?></td>
                                                    <td><?= $info->estado; ?></td>
                                                    <td><?= $info->diagnostico; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No hay datos que mostrar
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-none" id="consulta4">
                <div class="col-md-12">
                    <div class="card mx-5">
                        <div class="card-header fs-4 fw-normal bg-light text-center">
                            Estudiantes que tienen citas en espera por el psciologo
                        </div>
                        <div class="m-3 my-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-hover">
                                    <thead>
                                        <tr class="p-2">
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">hora</th>
                                            <th scope="col">Estado</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($estadistica)) { ?>
                                            <?php foreach ($estadistica as $info) { ?>
                                                <tr>
                                                    <td scope="row"><?= $info->nombres; ?></td>
                                                    <td><?= $info->apellidos; ?></td>
                                                    <td><?= $info->hora; ?></td>
                                                    <td><?= $info->estado; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No hay datos que mostrar
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-none" id="consulta5">
                <div class="col-md-12">
                    <div class="card mx-5">
                        <div class="card-header fs-4 fw-normal bg-light text-center">
                            Estdudiantes que tienen citas finalizadas
                        </div>
                        <div class="m-3 my-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-hover">
                                    <thead>
                                        <tr class="p-2">
                                            <th scope="col">Estudiante</th>
                                            <th scope="col">Diagnostico</th>
                                            <th scope="col">Nota</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($estadistica)) { ?>
                                            <?php foreach ($estadistica as $info) { ?>
                                                <tr>
                                                    <td scope="row"><?= $info->nombres." ".$info->apellidos; ?></td>
                                                    <td><?= $info->diagnostico; ?></td>
                                                    <td><?= $info->nota; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No hay datos que mostrar
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-none" id="consulta6">
                <div class="col-md-12">
                    <div class="card mx-5">
                        <div class="card-header fs-4 fw-normal bg-light text-center">
                            Orientaciones de un determinado curso
                        </div>
                        <div class="m-3 my-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-hover">
                                    <thead>
                                        <tr class="p-2">
                                            <th scope="col">Estudiante</th>                                        
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora</th>
                                            <th scope="col">Grado</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if (!empty($estadistica)) { ?>
                                            <?php foreach ($estadistica as $info) { ?>
                                                <tr>
                                                    <td><?= $info->nombres." ".$info->apellidos; ?></td>                                                    
                                                    <td><?= $info->estado; ?></td>
                                                    <td><?= $info->fecha; ?></td>
                                                    <td><?= $info->hora; ?></td>
                                                    <td><?= $info->codigo_curso; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    No hay datos que mostrar
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-none" id="consulta7">
                <div class="col-md-12">
                    <div class="card mx-5">
                        <div class="card-header fs-4 fw-normal bg-light text-center">
                            Total de citas que tiene un estudiante por identificacion
                        </div>
                        <div class="m-3 my-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-hover">
                                    <thead>
                                        <tr class="p-2">
                                            <th scope="col">citas</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Curso</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($estadistica) and $info->citas>0) { ?>
                                            <?php foreach ($estadistica as $info) { ?>
                                                <tr>
                                                    <td scope="row"><?= $info->citas; ?></td>
                                                    <td><?= $info->nombres; ?></td>
                                                    <td><?= $info->apellidos; ?></td>
                                                    <td><?= $info->codigo_curso; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No hay datos que mostrar
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-none" id="consulta8">
                <div class="col-md-12">
                    <div class="card mx-5">
                        <div class="card-header fs-4 fw-normal bg-light text-center">
                            consulta 8
                        </div>
                        <div class="m-3 my-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-hover">
                                    <thead>
                                        <tr class="p-2">
                                            <th scope="col">Correo</th>
                                            <th scope="col">Contraseña</th>
                                            <th scope="col">tipo de usuario</th>
                                            <th scope="col">fecha registro</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td scope="row"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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

<script src="../../js/JS property/mostrarVentanasConsultas.js"></script>