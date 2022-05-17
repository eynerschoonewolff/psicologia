<?php

$correo = trim($_POST['email']);
$contra = trim($_POST['passw']);
$contra= md5($contra);

include("con_db.php");

$consulta = "SELECT * FROM usuarios WHERE correo = '$correo' and contraseña = '$contra';";
$resultado = mysqli_query($conex,$consulta);

$filas = mysqli_fetch_array($resultado);

if($filas){
    session_start();

    if($filas['tip_user']==='Estudiante'){
        $consulta1 = "SELECT * FROM estudiante WHERE correo = '$correo';";
        $resultado1 = mysqli_query($conex,$consulta1);
        $_SESSION['estudiante'] = mysqli_fetch_array($resultado1);

        header("location: ../html/estudiante/inicioEstudiante.php");
    }else if($filas['tip_user']==='Psicologo'){
        $consulta1 = "SELECT * FROM psicologo WHERE correo = '$correo';";
        $resultado1 = mysqli_query($conex,$consulta1);
        $_SESSION['psicologo'] = mysqli_fetch_array($resultado1);

        header("location: ../html/psicologo/inicio.php");
    }else if($filas['tip_user']==='Administrador'){
        $_SESSION['administrador'] = $filas;
        header("location: ../html/administrador/inicioAdmin.php");
    }
}else{    
    echo "<script> alert('Usuario o contraseña incorrecto.');window.location= '../html/login.html' </script>";
}

mysqli_free_result($resultado);
mysqli_close($conex);

?>