<div class="modal fade" id="editsModal<?php echo $mostrar['codigo']; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-light bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Empezar reunión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../database/asigSala.php" method="POST">

          <?php 

              $ocode = $mostrar['codigo'];
              
              $consulta2 = "SELECT e.nombres, e.apellidos, o.codigo, o.fecha, o.hora, o.estado from estudiante e, orientacion o where e.identificacion = o.id_estudiante and o.codigo = '$ocode';";
              $resultado2 = mysqli_query($conex,$consulta2);

              while($mostrar2 = mysqli_fetch_array($resultado2)){
              ?>

          <div class="mb-3">
            <label for="recipient-codigo" class="col-form-label">Codigo</label>
            <input type="text" class="form-control" id="recipient-codigo" name="rec-codigo" value="<?php echo $mostrar2['codigo'] ?>"
            readonly>
          </div>

          <div class="mb-3">
            <label for="recipient-hora" class="col-form-label">Hora de inicio</label>
            <input type="time" class="form-control" id="recipient-hora" name="rec-hora" value="<?php echo $mostrar2['hora'] ?>" readonly>
          </div>

          <div class="mb-3">
            <label for="recipient-estado" class="col-form-label">Estado</label>
            <select class="form-select" id="recipient-estado" name="sel-sala" required>
              <option selected disabled value="">Elegir Sala</option>
              <option value="1">Sala 1</option>
              <option value="2">Sala 2</option>
            </select>
          </div>

          <?php 
              } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" name="upsala">Empezar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->