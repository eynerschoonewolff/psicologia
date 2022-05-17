<?php 

include("con_db.php");

if(isset($_POST['upsol'])){

    $codigo = $_POST['rec-codigo'];
    $fecha = $_POST['rec-fecha'];
    $hora = $_POST['rec-hora'];
    $estado = $_POST['rec-estado'];

    $consulta = "UPDATE orientacion SET fecha = '$fecha', hora = '$hora', estado = '$estado' WHERE orientacion.codigo = $codigo;";
    $resultado = mysqli_query($conex,$consulta);

    header("Location: ../html/psicologo/inicio.php");

}

?>