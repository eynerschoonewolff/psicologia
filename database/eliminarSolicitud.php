<?php 

include("con_db.php");

if(isset($_POST['upsol'])){

    $codigo = $_POST['rec-codigo'];

    $consulta = "DELETE FROM orientacion WHERE codigo = $codigo;";
    $resultado = mysqli_query($conex,$consulta);

    session_start();
    
    if($_SESSION['psicologo']){
        header("Location: ../html/psicologo/inicio.php");
    }else if($_SESSION['estudiante']){
        header("Location: ../html/estudiante/inicioEstudiante.php");
    }    
}

?>