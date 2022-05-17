<?php 

include("con_db.php");

if(isset($_POST['upfinal'])){

    $codigo = $_POST['codeOr'];
    $notaOr = $_POST['notaOrientacion'];
    $diagnosticOr = $_POST['diagnostico'];

    $consulta1 = "UPDATE salas SET estado = 'disponible' WHERE salas.id = (SELECT sala as 's' FROM orientacion WHERE codigo = '$codigo');";
    $resultado1 = mysqli_query($conex,$consulta1);
    
    $consulta = "UPDATE orientacion SET estado='Finalizada',sala=null,diagnostico='$diagnosticOr',nota='$notaOr' WHERE codigo ='$codigo';";
    $resultado = mysqli_query($conex,$consulta);

    header("Location: ../html/psicologo/charlemos.php");    

}
?>