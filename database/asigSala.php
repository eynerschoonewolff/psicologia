<?php 

include("con_db.php");

if(isset($_POST['upsala'])){

    $salaElegida = $_POST['sel-sala'];
    $codeOrient = $_POST['rec-codigo'];
    $horainicio = $_POST['rec-hora'];

    $consulta = "SELECT * FROM salas WHERE id = '$salaElegida';";
    $resultado = mysqli_query($conex,$consulta);

    $mostrar = mysqli_fetch_array($resultado);

    if($mostrar['estado'] == 'disponible'){        

        $consulta2 = "UPDATE orientacion SET sala='$salaElegida' WHERE codigo = '$codeOrient';";
        $resultado2 = mysqli_query($conex,$consulta2); 
        
        $consulta3 = "UPDATE salas SET estado='usando' WHERE id = '$salaElegida';";
        $resultado3 = mysqli_query($conex,$consulta3);

        session_start();
        $_SESSION['psicologo']['id_reunion'] = $codeOrient;

        if($mostrar['id'] == '1'){
            //echo '<script>window.open("../html/psicologo/sala1.php","_blank")</script>';
            echo '<script>window.location.href = "../html/psicologo/sala1.php"</script>';
        }elseif($mostrar['id'] == '2'){
            //echo '<script>window.open("../html/psicologo/sala2.php","_blank")</script>';
            echo '<script>window.location.href = "../html/psicologo/sala2.php"</script>';
        }elseif($mostrar['id'] == '3'){
            echo '<script>window.open("../html/psicologo/sala3.php","_blank")</script>';
            echo '<script>window.location.href = "../html/psicologo/charlemos.php"</script>';
        }elseif($mostrar['id'] == '4'){
            echo '<script>window.open("../html/psicologo/sala4.php","_blank")</script>';
            echo '<script>window.location.href = "../html/psicologo/charlemos.php"</script>';
        }

                 
           
    }else{
        header("Location: ../html/psicologo/charlemos.php");
    }

        

}

?>