<div class="container-fluid">
<?php $this->load->view($buscar) ?>

Haga click en el icono de la dereccha para inscribir a alguan persona

<div class="tab-content">
        <div id="table">
            <table align = 'center' class="table table-striped table-bordered" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Edad</th>
                        <th>Funcion Educ. Cristiana</th>
                        <th>Grado Escolar</th>
                        <th>Inscripcion</th>
                    </tr> 
                </thead>  
                <tbody>
                    <?php
                    if($asistentes)
                    {
                        foreach ($asistentes as $personas) 
                            {
                    ?>
                            <tr>              
                                <td><a href=<?= base_url().'index.php/personas/editarpersona/'.$personas->ID_PERSONA ?> >
                                        <?php echo $personas->NOMBRES." ".$personas->APELLIDOS;?></a> </td>
                                <td><?php echo $personas->FECHA_MODIFICADA; ?></td>
                                <td><?php $edad=date("Y/m/d")-$personas->FECHA_NACIMIENTO; echo $edad." años"; ?></td>
                                <td><?php echo $personas->NOMBRE_FUNCION; ?></td> 
                                <td><?php echo $personas->GRADO_ESCOLAR; ?></td> 
                                <td>     
                                	<a href=<?= base_url().'index.php/registro/inscripcion/'.$personas->ID_PERSONA.'?actividad='.$nactividad[0]['ID_ACTIVIDAD']?>>
				                        <img  src="<?= base_url() ?>public/images/inscribir.png"  width="42" height="42" > 
				                    </a>
                    			</td>
                            </tr>
                    <?php
                    }
                    }else
                    {
                        echo "<p>No existe ese registro</p>";
                    } 
                    ?>
                </tbody>
            </table>
        </div> <!-- DIV TABLE -->                        
</div> <!--DIV tab CONTENT, despues del menu de arriba -->
    
</div>