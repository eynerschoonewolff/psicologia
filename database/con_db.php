<?php
$conex = mysqli_connect("localhost","root","","proyecto");

if ($conex->connect_errno){
    echo "No hay conexión: (" . $conex->connect_errno . ") " . $conex->connect_error;
}

?>