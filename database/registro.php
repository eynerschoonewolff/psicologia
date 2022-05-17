<?php

include("con_db.php");

if(isset($_POST['register'])){
    $name = trim($_POST['nombres']);
    $lastname = trim($_POST['Apellidos']);
    $numid = trim($_POST['nidentificacion']);
    $fech_nac = trim($_POST['inputFecha']);
    $email = trim($_POST['Correo']);
    $pass= trim($_POST['Contraseña']);
    $pass= md5($pass);
    $salon= $_POST['curso'];

    $consulta0 = "INSERT INTO usuarios(correo, contraseña, tip_user, fech_reg) VALUES ('$email','$pass','Estudiante',now())";
    $resultado0 = mysqli_query($conex,$consulta0);

    $consulta1 = "INSERT INTO estudiante(nombres, apellidos, identificacion, fecha_nacimiento, correo, idenn_padre, codigo_curso) VALUES ('$name','$lastname','$numid','$fech_nac','$email',null,'$salon')";    
    $resultado1 = mysqli_query($conex,$consulta1);

    if ($resultado1){
        header("Location: ../html/rgood.html");
    } else {
        header("Location: ../html/rbad.html");
    }    
}

?>