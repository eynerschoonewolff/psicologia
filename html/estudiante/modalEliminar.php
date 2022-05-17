<!-- modal -->
<div class="modal fade" id="eliModal<?php echo $mostrar['codigo']; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar solicitud</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../database/eliminarSolicitud.php" method="POST">

          <?php 

              $ocode = $mostrar['codigo'];
              
              $consulta2 = "SELECT ps.nombres, ps.apellidos, o.codigo, o.fecha, o.hora, o.estado from psicologo ps, orientacion o where ps.identificacion = o.id_psicologo and o.codigo = '$ocode';";
              $resultado2 = mysqli_query($conex,$consulta2);

              while($mostrar2 = mysqli_fetch_array($resultado2)){
              ?>

          <div class="mb-3">
            <label for="recipient-ps" class="col-form-label">Psicólogo encargado</label>
            <input type="text" class="form-control" id="recipient-ps"
              value="<?php echo $mostrar2['nombres']." ".$mostrar2['apellidos'] ?>" disabled>
          </div>
          <div class="mb-3">
            <label for="recipient-codigo" class="col-form-label">Codigo</label>
            <input type="text" class="form-control" id="recipient-codigo" name="rec-codigo" value="<?php echo $mostrar2['codigo'] ?>"
            readonly>
          </div>
          <div class="mb-3">
            <label for="recipient-fecha" class="col-form-label">Fecha</label>
            <input type="date" class="form-control" id="recipient-fecha" name="rec-fecha" value="<?php echo $mostrar2['fecha'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="recipient-hora" class="col-form-label">Hora</label>
            <input type="time" class="form-control" id="recipient-hora" name="rec-hora" value="<?php echo $mostrar2['hora'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="recipient-estado" class="col-form-label">Estado</label>
            <input type="text" class="form-control" id="recipient-estado" name="rec-estado" value="<?php echo $mostrar2['estado'] ?>" readonly>
          </div>

          <?php 
              } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger" name="upsol">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->