<?php

include "conexion.php";

$correo_viejo = $_POST['correo'];
$correo_nuevo = $_POST['correoNuevo'];
$contraseña = $_POST['contraseña'];


$sentencia = $bd->prepare("UPDATE usuarios SET correo=?,contraseña=MD5(?) WHERE usuarios . correo=?;");
$resul = $sentencia->execute([$correo_nuevo,$contraseña, $correo_viejo]);


if ($resul === TRUE) {
    header('Location: ../html/administrador/inicioAdmin.php?mensaje=ActualizadoCorrectamente');
} else {
    header('location: ../html/administrador/inicioAdmin.php?mensaje=errorCorreo');
}
