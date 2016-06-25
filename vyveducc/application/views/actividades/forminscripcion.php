<div class="panel panel-default">
  <div class="panel-heading">
    <h3>Ingrese los datos para la inscripcion de 
      <?php echo " {$datopersonal[0]->NOMBRES}  {$datopersonal[0]->APELLIDOS}<br>
                   a {$nactividad[0]['NOMBRE_ACTIVIDAD']}"; 
      ?>
    </h3>
  </div>
<div class="panel-body">
  <form action=<?php echo $accion; ?> method="post" class="form-horizontal" role="form">
      <input class="form-control" type="hidden" name="id_persona" value=<?php echo $datopersonal[0]->ID_PERSONA ?> >
      <input class="form-control" type="hidden" name="id_actividad" value=<?php echo $nactividad[0]['ID_ACTIVIDAD']?> >
    <div class="row">
    <div class="col-sm-6">
      <!-- INFORMACION ENCARGADO UNO-->
        <div class="panel panel-info">
          <div class="panel-heading"><strong>Ingrese la informacion del primer encargado</strong></div>
          <div class="panel-body">
              
              <div class="form-group">
                <label class="control-label col-sm-2" for="encargado1">Nombres y Apellidos:</label>
                <div class="col-sm-10">
                  <input class="form-control" name="encargado1" id="encargado1" placeholder="Ingrese los nombres y apellidos del encargado" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="telefono1">Telefonos:</label>
                <div class="col-sm-10">          
                  <input class="form-control" name="telefono1" id="telefono1" placeholder="Ingrese el (los) numero(s) del encargado"  required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="dpi1">DPI:</label>
                <div class="col-sm-10">
                  <input class="form-control" id="dpi1" name="dpi1"  title="Solo puede ingresar numeros" placeholder="Ingrese el DPI del encargado" required>
                </div>
              </div>

          </div>
        </div>
        </div>


     <!-- INFORMACION ENCARGADO DOS-->
      <div class="col-sm-6">
        <div class="panel panel-info">
          <div class="panel-heading"><strong>Ingrese la informacion del segundo encargado</strong></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="control-label col-sm-2" for="encargado2">Nombres y Apellidos:</label>
              <div class="col-sm-10">
                <input class="form-control" name="encargado2" id="encargado1" placeholder="Ingrese los nombres y apellidos del encargado">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="telefono2">Telefonos:</label>
              <div class="col-sm-10">          
                <input class="form-control" name="telefono2" id="telefono2" placeholder="Ingrese el (los) numero(s) del encargado">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="dpi2">DPI:</label>
              <div class="col-sm-10">
                <input class="form-control" name="dpi2" id="email" placeholder="Ingrese el DPI del encargado">
              </div>
            </div>

          </div>
        </div>
        </div> <!-- columna -->
      </div><!-- row -->

        <div class="form-group">
            <label class="control-label col-sm-2" for="observaciones">Observaciones:</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="observaciones" name="observaciones"></textarea>
            </div>
        </div>

        <div class="form-group" align="center">        
            <button type="submit" class="btn btn-primary">Realizar Inscripcion</button>
        </div>
      
    </form>
  
</div>
</div>


 

