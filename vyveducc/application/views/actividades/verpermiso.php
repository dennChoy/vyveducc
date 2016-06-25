<div class = 'page-header' align = "center">
		<?php echo "
			<h2>Permiso de {$datopersonal[0]->NOMBRES} {$datopersonal[0]->APELLIDOS}</h2>
			"; ?>
</div>
<div class="tab-content" id="ajuste">
	<?php echo "
		<table class='table table-striped'>
			<tr>
				<td align='center' colspan='2'>
					<strong><font size = '4' >Informacion Personal</font></strong>
					 <a href='{$frmeditp}'>
                        <img  src= ". base_url('public/images/green-user-icon.png') . " width='42' height='42' > 
                    </a>
				</td>
			</tr>
			<tr>
			     <td><strong>Nombres y Apellidos</strong> </td>
			     <td>{$datopersonal[0]->NOMBRES} {$datopersonal[0]->APELLIDOS}</td>
			</tr>
			<tr>
			   	<td><strong>Fecha de Nacimiento </strong></td>
			   	<td> {$datopersonal[0]->FECHA_MODIFICADA}</td>
			</tr>
			<tr>
			   <td><strong>Direccion</strong></td>
			   <td>{$datopersonal[0]->DIRECCION}</td>
			</tr>
			<tr>
			   <td><strong>Grado Academico</strong></td>
			   <td>{$datopersonal[0]->GRADO_ESCOLAR}</td>
			</tr>
			<tr>
			   <td><strong>Grado en Educacion Cristiana</strong></td>
			   <td>{$datopersonal[0]->NOMBRE_FUNCION} </td>
			</tr>
		    	<td><strong>Observaciones (Permiso)</strong></td>
		    	<td> {$datopersonal[0]->OBSERVACIONES_PERMISO} </td>
			<tr>
				<td align='center' colspan='2'>
					<strong><font size = '4' >Informacion del(los) Encargado(s)</font></strong>
					<a href='{$frmeditp}'>
                        <img  src= ". base_url('public/images/inscripcion.png') . " width='42' height='42' > 
                    </a>
				</td>
			</tr>
			<tr>
			   <td><strong>Nombre del Padre o Encargado</strong></td>
			   <td> {$datopersonal[0]->ENCARGADO1} </td>
			</tr>
			<tr>
			   <td><strong>Numero de DPI</strong> {$datopersonal[0]->DPI1} </td>
			   <td><strong>Numero de Telefono</strong> {$datopersonal[0]->TELEFONO1} </td>
			</tr>
			<tr>
			   <td><strong>Nombre del Padre o Encargado</strong></td>
			   <td> {$datopersonal[0]->ENCARGADO2} </td>
			</tr>
			<tr>
			   <td><strong>Numero de DPI</strong> {$datopersonal[0]->DPI2} </td>
		   	   <td><strong>Numero de Telefono</strong>{$datopersonal[0]->TELEFONO2} </td>
		   	</tr>
		    <tr>
				<td align='center' colspan='2'><strong><font size = '4' >Activividad</font></strong></td>
		   	</tr>
		   	<tr>
		   	   <td><strong>Nombre de la Actividad</strong></td>
		   	   <td>{$datopersonal[0]->NOMBRE_ACTIVIDAD} </td>
		   	</tr>
		   	<tr>
		   		<td><strong>Fecha</strong></td>
		   		<td> {$datopersonal[0]->FECHA} </td>
		   	</tr>
		   	<tr>
		   		<td> <strong>Lugar</strong> </td>
		   		<td>{$datopersonal[0]->LUGAR} </td>
		   	</tr>
		</table>

	"; ?>

</div>

<pre>
<?php// print_r($datopersonal); ?>
</pre>
 