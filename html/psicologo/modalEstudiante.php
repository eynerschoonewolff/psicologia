<div class="modal fade" id="studentModal<?php echo $mostrar['identificacion']; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Información del estudiante <i class="bi-person-fill text-primary"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../database/actualizarSolicitud.php" method="POST">

          <?php 

              $estid = $mostrar['identificacion'];
              
              $consultaest = "SELECT *, TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad FROM estudiante WHERE identificacion = '$estid';";
              $resultadoest = mysqli_query($conex,$consultaest);

              while($mostrarest = mysqli_fetch_array($resultadoest)){
              ?>

        <div class="row">
          <div class="col-6 mb-3">
            <label class="col-form-label">Nombre(s)</label>
            <input type="text" class="form-control" value="<?php echo $mostrarest['nombres'] ?>" disabled>
          </div>

          <div class="col-6 mb-3">
            <label class="col-form-label">Apellido(s)</label>
            <input type="text" class="form-control" value="<?php echo $mostrarest['apellidos'] ?>" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-6 mb-3">
            <label class="col-form-label">identificacion</label>
            <input type="text" class="form-control" value="<?php echo $mostrarest['identificacion'] ?>" disabled>
          </div>

          <div class="col-6 mb-3">
            <label class="col-form-label">Curso</label>
            <input type="text" class="form-control" value="<?php echo $mostrarest['codigo_curso'] ?>" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-6 mb-3">
            <label class="col-form-label">Edad</label>
            <input type="text" class="form-control" value="<?php echo $mostrarest['edad'] ?>" disabled>
          </div>

          <div class="col-6 mb-3">
            <label class="col-form-label">Correo electronico</label>
            <input type="text" class="form-control" value="<?php echo $mostrarest['correo'] ?>" disabled>
          </div>
        </div>
          
          

          <?php 
              } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>