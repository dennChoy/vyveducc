
<div class="col-lg-12">
	<div class = 'page-header'>
		<h1>Control de funciones</h1>
        <h4>Tipos de funciones de las personas dentro del campamento</h4>
	</div>
      
    <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="pill" href="#menu1">Ver todos</a></li>
        <li><a data-toggle="pill" href="#menu2">Agregar nueva funcion</a></li>
        <li><a data-toggle="pill" href="#menu3">Editar nueva funcion</a></li>
   </ul>

    <?php
            $validar = $this->uri->segment(3);
            if ($validar > 0)
            {    
                //echo "Edite la informacion del cliente";
                $id = $funcion->result()[0]->ID_FUNCION;
                $tipo = $funcion->result()[0]->NOMBRE_FUNCION;
                $descripcion = $funcion->result()[0]->DESCRIPCION_FUNCION;
                $encabezado =  "<h3>Modifique la informacion de ".$funcion->result()[0]->NOMBRE_FUNCION." </h3>";
            }elseif($validar == 0)
            {
             $encabezado = "<div class='alert alert-danger'>
                              <strong>NO HA SELECCIONADO NINGUN DATO!</strong> Por favor, regrese al listado general y elija algun valor
                            </div>";
            $tipo = "No ha seleccinado ningun valor";
            $descripcion = "No ha seleccinado ningun valor";
               
               // echo "Ingrese la informacion del nuevo cliente";
                $id = '0';
            }
    ?>

    <!-- <?=base_url() ?>asistentes/agregarnuevo/0 -->
   <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <h3>Listado de asistentes al campamento 2016 </h3>  

                <div id="table">
                    <table align = 'center' class="table">
                    <tr>
                        <th>Codigo </th>
                        <th>Funcion dentro del campamento</th>
                        <th>Descripcion de la funcion</th>
                        <th>Corresponde a </th>
                    </tr>  

                        <?php
                           if($funcion)
                            {
                                foreach ($funcion->result() as $funcion) 
                                {
                                ?>
                                    <tr> 
                                        <td><?php echo $funcion->ID_FUNCION; ?></td>
                                        <td>
                                        <a href=<?= base_url().'tipo_personas/editar/'.$funcion->ID_FUNCION ?> >
                                        <?php echo $funcion->NOMBRE_FUNCION; ?>
                                        </a></td>
                                        <td><?php echo $funcion->DESCRIPCION_FUNCION; ?></td>
                                        <td><?php if($funcion->ALUMNO==1)
                                                {
                                                    echo "Alumno";
                                                }elseif($funcion->ALUMNO==0)
                                                {
                                                    echo "Encargado";
                                                }
                                            ?>
                                        </td>  

                                     </tr>
                                <?php
                                }
                            }else
                            {
                                echo "<p>No existe ese registro</p>";
                            } 
                        ?>
                    </table>
                </div> 
       </div>


        <div id="menu2" class="tab-pane fade">
          <h3>Ingrese los siguientes datos</h3>
             <?= form_open(base_url().'tipo_personas/guardartipopersona/');
                    $tipo_persona = array(
                            'name' => 'tipo_nuevo',
                            'placeholder' => 'Escriba la nueva funcion que desea ingresar',
                            'class'=>'form-control'
                        );
                    $descripcion_tipo = array(
                            'name' => 'descripcion_nuevo',
                            'placeholder' => 'Escriba la descripcion, observaciones, etc.',
                            'class'=>'form-control'
                        );       
                    $corresponde = array(
                            '1' => 'Alumno',
                            '0' => 'Encargado.'
                        );                                

                    $boton = array(
                            'id'=>"submit",
                            'name'=>"submit",
                            'type'=>"submit",
                            'value'=>"Guardar Registro",
                            'class'=>"btn btn-primary"
                        );
            ?>
                <table align="center" class="table">
                    <tr>
                        <td><?= form_label('Nueva funcion del asistente: ', 'tipo_persona') ?> </td>
                        <td><?= form_input($tipo_persona) ?> </td>

                    </tr>
                    <tr>
                        <td><?= form_label('Descripcion: ', 'descripcion') ?></td>
                        <td><?= form_input($descripcion_tipo) ?></td>
                    </tr>
                    <tr>
                        <td><?= form_label('Corresponde a: ', 'corresponde') ?></td>
                        <td><?= form_dropdown('corresponde', $corresponde, 'Alumno','class=form-control') ?></td>  
                    </tr>
                                                         
                </table>
                <br/>

                <div id='botones' align="center">
                        <?php echo form_submit($boton) ?>            
                </div>
          <?= form_close() ?>
        </div>


        <div id="menu3" class="tab-pane fade">
             <?= form_open(base_url().'tipo_personas/editartipopersona/'.$id); 
                  echo $encabezado;                                       
                    $tipo_persona = array(
                            'value' => $tipo,
                            'name' => 'NOMBRE_FUNCION',
                            'placeholder' => 'Escriba la nueva funcion que desea ingresar',
                            'class'=>'form-control'
                        );
                    $descripcion_tipo = array(
                            'value' => $descripcion,
                            'name' => 'DESCRIPCION_FUNCION',
                            'placeholder' => 'Escriba la descripcion, observaciones, etc.',
                            'class'=>'form-control'
                        );                                      

                    $boton = array(
                            'id'=>"submit",
                            'name'=>"submit",
                            'type'=>"submit",
                            'value'=>"Guardar Registro",
                            'class'=>"btn btn-primary"
                            
                        );
                     ?>
                <table align="center" class="table">
                    <tr>
                        <td><?= form_label('Funcion del asistente: ', 'tipo_persona') ?> </td>
                        <td><?= form_input($tipo_persona) ?> </td>

                    </tr>
                    <tr>
                        <td><?= form_label('Descripcion: ', 'descripcion') ?></td>
                        <td><?= form_input($descripcion_tipo) ?></td>
                    </tr>
                    <tr>
                        <td><?= form_label('Corresponde a: ', 'corresponde') ?></td>
                        <td><?= form_dropdown('corresponde', $corresponde, $funcion->ALUMNO,'class=form-control') ?></td>  
                    </tr>                               
                </table>
                <br/>

                <div id='botones' align="center">
                        <?php echo form_submit($boton) ?>   
                        <a href=<?= base_url().'tipo_personas/eliminar/'.$id?> class="btn btn-danger" role="button">Eliminar Registros
                        </a>           
                </div>
                <?= form_close() ?>
        </div>
   </div>
    
</div>

