	<form class="navbar-form navbar-left" action="<?= base_url('index.php/registro/verasistentes') ?>" method="GET" id="FormBuscar">
		Seleccione una actividad para ver las personas inscritas
		<br>
		<select name="actividad" class="form-control">
	        <?php 
	        foreach($actividad as $row)
	        { 
	          echo '<option value="'.$row->ID_ACTIVIDAD.'">'.$row->NOMBRE_ACTIVIDAD.'</option>';
	        }
	        ?>
	    </select>
	    <button type="submit" id="button" class="btn btn-info" data-toggle="tooltip" data-placement="right" title="Haga clic aquí para buscar">
	    <i class="glyphicon glyphicon-search"></i> BUSCAR</button>
	</form>
 