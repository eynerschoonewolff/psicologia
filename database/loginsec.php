<?php

if(isset($_POST['iniciar'])){

    include("con_db.php");

    $email = print_r($_POST['email']);
    $password = print_r($_POST['passw']);

}

?>