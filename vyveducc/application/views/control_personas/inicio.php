<div class="col-lg-12">
    <div class = 'page-header'> 
        <h1>Control de personas en Educacion Cristiana</h1>
    </div>

    <ul class="nav nav-pills nav-justified">
        <!--<li class="active"><a data-toggle="pill" href="#home">Home</a></li>-->
        <li class="active"><a data-toggle="pill" href="#menu1">Ver todos</a></li>
        <li><a data-toggle="pill" href="#menu2">Buscar</a></li>
        <li><a data-toggle="pill" href="#menu3">Ingresar Alumno</a></li>
        <li><a data-toggle="pill" href="#menu4">Ingresar Coordinador</a></li>
        <!-- <li><a href="<?=base_url() ?>asistentes/agregarnuevo/0" class="external">Agregar nueva persona</a></li> -->
    </ul>

<div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
        <h3>Listado de personal en el Ministerio de Eduacion Cristiana </h3>  
        <div id="table">
            <table align = 'center' class="table">
                <tr>
                    <th>Nombres</th>
                    <th>Sexo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Edad</th>
                    <th>Funcion Educ. Cristiana</th>
                    <th>Grado Escolar</th>
                    <th>Observaciones</th>
                </tr>   
            
                <?php
                if($asistentes)
                {
                    foreach ($asistentes->result() as $asistentes) 
                        {
                ?>
                <tr>              
                    <td><a href=<?= base_url().'asistentes/editarpersona/'.$asistentes->ID_PERSONA ?> ><?php echo $asistentes->NOMBRES." ".$asistentes->APELLIDOS;?></a> </td>
                     <td><?php echo $asistentes->SEXO; ?></td>
                    <td><?php echo $asistentes->FECHA_MODIFICADA; ?></td>
                    <td><?php $edad=date("Y/m/d")-$asistentes->FECHA_NACIMIENTO; echo $edad." años"; ?></td>
                    <td><?php echo $asistentes->NOMBRE_FUNCION; ?></td> 
                    <td><?php echo $asistentes->GRADO_ESCOLAR; ?></td> 
                    <td><?php echo $asistentes->OBSERVACIONES; ?></td>                  
                </tr>
                <?php
                }
                }else
                {
                    "<p>No existe ese registro</p>";
                } 
                ?>
            </table>
        </div> <!-- DIV TABLE -->                        
    </div> <!-- DIV MENU 1 -->

    <?php
        $nombres = array(
                'name' => 'nombres',
                'placeholder' => 'Escriba su nombre',
                'class'=>'form-control'
            );
        $apellidos = array(
                'name' => 'apellidos',
                'placeholder' => 'Escriba su apellido',
                'class'=>'form-control'
            );

         $fecha_nacimiento = array(
                'name' => 'fecha_nacimiento',
                'placeholder' => 'Seleccione la fecha de nacimiento',
                'id'=>'fecha_nac',
                'class'=>'form-control',
                'type'=> 'text'
            );
         $fecha_nacimiento2 = array(
                'name' => 'fecha_nacimiento',
                'placeholder' => 'Seleccione la fecha de nacimiento',
                'id'=>'fecha_nac2',
                'class'=>'form-control',
                'type'=> 'text'
            );

         $sexo = array(
                'Masculino' => 'Masculino',
                'Femenino' => 'Femenino'
            );

         $telefono = array(
                'name' => 'telefono',
                'placeholder' => 'Escriba su direccion actual',
                'class'=>'form-control'
            );
        $direccion = array(
                'name' => 'direccion',
                'placeholder' => 'Escriba su direccion actual',
                'class'=>'form-control'
            );
        $funcion_persona = array(
                'name' => 'funcion_persona',
                'placeholder' => 'Escriba su direccion actual',
                'class'=>'form-control'
            ); 
        $grado_escolar = array(
                'Aún no estudia' => 'Aún no estudia',
                'Parvulos' => 'Parvulos',
                'Primero Primaria' => 'Primero Primaria',
                'Segundo Primaria' => 'Segundo Primaria',
                'Tercero Primaria' => 'Tercero Primaria',
                'Cuarto Primaria' => 'Cuarto Primaria',
                'Quinto Primaria' => 'Quinto Primaria',
                'Sexto Primaria' => 'Sexto Primaria',
                'Primero Basico' => 'Primero Basico',
                'Segundo Basico ' => 'Segundo Basico',
                'Tercero Basico' => 'Tercero Basico',
                'No estudia' => 'No esta estudiando'
            );

  
          $observaciones = array(
                'name' => 'observaciones',
                'placeholder' => 'Escriba observaciones si las hay acerca de la persona',
                'class'=>'form-control'
              
            );    

        $boton = array(
                'onclick'=>"myFunction()",
                'id'=>"submit",
                'name'=>"submit",
                'type'=>"submit",
                'value'=>"Guardar Registro",
                'class'=>"btn btn-primary"
            );
    ?>


    <div id="menu2" class="tab-pane fade">
        <h3>Realizar busqueda </h3>  



    </div> <!-- DIV MENU 2 -->

    <div id="menu3" class="tab-pane fade">
        
        <?= form_open(base_url().'asistentes/guardarpersona'); ?>
            <table align="center" class="table">
                <tr>
                    <td><?= form_label('Nombres: ', 'nombres') ?> </td>
                    <td><?= form_input($nombres) ?> </td>

                </tr>
                <tr>
                    <td><?= form_label('Apellidos ', 'apellidos') ?></td>
                    <td><?= form_input($apellidos) ?></td>
                </tr>
                 <tr>
                    <td><?= form_label('Fecha de Nacimiento: ', 'fechaNac') ?></td>
                    <td>
                        <?= form_input($fecha_nacimiento) ?>
                    </td>
                </tr>
                 <tr>
                    <td><?= form_label('Sexo: ', 'sexo') ?></td>
                    <td><?= form_dropdown('sexo', $sexo, 'Masculino','class=form-control') ?></td>
                    
                </tr>
                <tr>
                    <td><?= form_label('Grado academico actuall: ', 'grado') ?></td>
                    <td><?= form_dropdown('grado_academico', $grado_escolar, 'No esta estudiando','class=form-control') ?></td>  
                </tr>
                <tr>
                    <td><?= form_label('Telefono: ', 'telefono') ?></td>
                    <td><?= form_input($telefono) ?></td>
                </tr>
                <tr>
                    <td><?= form_label('Direccion: ', 'direccion') ?></td>
                    <td><?= form_input($direccion) ?></td>
                </tr>
                 <tr>
                    <td><?= form_label('Grado en Educacion Cristiana: ', 'tipo_persona') ?></td>

                    <td>
                        <select name="funcion_persona" class="form-control">
                        <?php 
                        foreach($funcionAlumno as $row)
                        { 
                          echo '<option value="'.$row->ID_FUNCION.'">'.$row->NOMBRE_FUNCION.'</option>';
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?= form_label('Observaciones: ', 'direccion') ?></td>
                    <td><?= form_textarea($observaciones) ?></td>
                </tr>                           
            </table>
            <br/>
            <div id='botones' align="center">
                    <?php echo form_submit($boton) ?>   
            </div>
        <?= form_close() ?> 
    </div> <!-- DIV MENU 3 -->

    <div id="menu4" class="tab-pane fade">   
        <?= form_open(base_url().'asistentes/guardarpersona'); ?>
                <table align="center" class="table">
                    <tr>
                        <td><?= form_label('Nombres: ', 'nombres') ?> </td>
                        <td><?= form_input($nombres) ?> </td>

                    </tr>
                    <tr>
                        <td><?= form_label('Apellidos ', 'apellidos') ?></td>
                        <td><?= form_input($apellidos) ?></td>
                    </tr>

                    <tr>
                        <td><?= form_label('Sexo: ', 'sexo') ?></td>
                        <td><?= form_dropdown('sexo', $sexo, 'Masculino','class=form-control') ?></td>
                        
                    </tr>

                    <tr>
                        <td><?= form_label('Funcion en campamento: ', 'funcion_persona') ?></td>
                        <td>
                            <select name="funcion_persona" class="form-control">
                            <?php 
                            foreach($funcionEncargado as $row)
                            { 
                              echo '<option value="'.$row->ID_FUNCION.'">'.$row->NOMBRE_FUNCION.'</option>';
                            }
                            ?>
                            </select>
                        </td>
                    </tr>  
                    <tr>
                        <td><?= form_label('Telefono: ', 'telefono') ?></td>
                        <td><?= form_input($telefono) ?></td>
                    </tr>

                    <tr>
                        <td><?= form_label('Direccion: ', 'direccion') ?></td>
                        <td><?= form_input($direccion) ?></td>
                    </tr>

                     <tr>
                        <td><?= form_label('Fecha de Nacimiento: ', 'fechaNac') ?></td>
                        <td><?= form_input($fecha_nacimiento2) ?></td>
                    </tr>  
                    <tr>
                        <td><?= form_label('Observaciones: ', 'direccion') ?></td>
                        <td><?= form_textarea($observaciones) ?></td>
                    </tr>   
                </table>
                <br/>
                <div id='botones' align="center">
                        <?php echo form_submit($boton) ?>   
                </div>
            <?= form_close() ?> 
        </div> <!-- DIV MENU 3 -->
</div> <!--DIV tab CONTENT, despues del menu de arriba -->
</div> <!-- Col-log12, adentro esta todo -->