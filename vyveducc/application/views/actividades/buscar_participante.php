 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>

 <div class="jumbotron">
 	<h1>Inscripcion de personas </h1>
 	<h3>Seleccione una actividad para realizar inscripciones </h3>
 </div>
 <div class="container">
	<form action="<?= base_url('index.php/registro/verparticipantes') ?>" method="GET" id="FormBuscar">
		<select name="actividad" class="form-control" >
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
</div>
