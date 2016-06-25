<div class="panel panel-info">
	<div class="panel-heading">
		  	<h3>Esta realizando el pago de 
		      <?php echo " {$datopersonal[0]->NOMBRES}  {$datopersonal[0]->APELLIDOS}<br>
		                   para {$nactividad[0]['NOMBRE_ACTIVIDAD']}"; 


		      ?>
	    	</h3>
	</div>
	
	  	<div class="panel-body">  
  		    <div class="row">
	  		    <div class="col-sm-6">
		  		    <form action=<?php echo $accion; ?> method="post" class="form-horizontal" role="form">
		  		   	<input name="permiso" type='hidden' value= <?php echo $permiso[0]->ID_PERMISO; ?> >

						  <div class='form-group' align="center">
						  	<label class="radio-inline"><input type="radio" name="pago">Pago Completo</label>
						  	<label class="radio-inline"><input type="radio" name="pago">Pagos </label>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="recibo">Numero del recibo:</label>
						    <div class="col-sm-10">
						      <input class="form-control" id="recibo" name="recibo" placeholder="Ingrese el numero de recibo">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="cantidad">Cantidad:</label>
						    <div class="col-sm-10">          
								<div class="input-group">
							  		<span class="input-group-addon">Q</span>
							    	<input type="text" class="form-control" name="cantidad" placeholder="Cantidad"/>
								</div>
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="fecha">Fecha de pago:</label>
						    <div class="col-sm-10">
						      <input class="form-control" id="fecha_nac" name="fecha" placeholder="Seleccione la fecha de pago">
						    </div>
						  </div>

						   <div class="form-group" align="center">        
					            <button type="submit" class="btn btn-primary">Realizar Pago</button>
					       </div>
					</form>

				</div> <!--  DIV DEL COLUMNA -->

	  		    <div class="col-sm-6"> <!--  HISTORIAL DE PAGO -->
	  		    	<div class="tab-content">
		  		    	<table class="table table-striped table-bordered table-hover">
		  		    		<thead>
		  		    			<tr>
		  		    				<th colspan="3" align="center"> HISTORIAL DE PAGOS</th>
		  		    			</tr>
		  		    			<tr>
		  		    				<th># de Recibo </th>
			  		    			<th>Fecha de pago</th>
			  		    			<th>Cantidad</th>
			  		    		</tr>
		  		    		</thead>
		  		    		<tbody>
		  		    		<?php 
		  		    			$total = 0;
		  		    			if($historial)
		  		    			{
		  		    				foreach ($historial as $row)
		  		    				{
		  		    					echo "<tr>
		  		    						<td>{$row->REF_FISICA}</td>
		  		    						<td>{$row->FECHA_PAGO}</td>
		  		    						<td>{$row->CANTIDAD} </td>
		  		    					</tr> ";
		  		    					$total = $total + $row->CANTIDAD;
		  		    				}
		  		    				echo "	<tr>
					  		    				<td colspan='2'>Total</td>
						  		    			<td>{$total}</td>
	  		    							</tr>";
		  		    			}

		  		    		?>
		  		    		</tbody>
		  		    	</table>
		  		    </div>

	  		    </div> <!--  FIN HISTORIAL DE PAGO -->


		</div> <!--  DIV ROW -->

	</div> <!--  DIV DEL BODY PANEL -->

</div><!--  DIV DEL PANEL -->


<pre>
<?php print_r($historial); ?>
</pre>