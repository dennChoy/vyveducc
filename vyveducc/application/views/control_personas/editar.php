<div class="col-lg-12">
    <div class = 'page-header'>
        <h1>Control de asistentes</h1>
        <h3>Editar personas</h3>
    </div>
          
    <div id = "formulario">

        <?php
            $validar = $asistentes->result()[0]->ALUMNO;
            $id = $asistentes->result()[0]->ID_PERSONA;

                if (($asistentes->result()[0]->SEXO)=='Masculino')
                { 
                    $sex_option = 'Femenino';
                    $sex_option_default = 'Masculino';
                }
                elseif (($asistentes->result()[0]->SEXO)!='Masculino') 
                {
                    $sex_option = 'Masculino';
                    $sex_option_default = 'Femenino';
                }

                $nombres = array(
                    'name' => 'nombres',
                    'placeholder' => 'Escriba su nombre',
                    'class'=>'form-control',
                    'value' => $asistentes->result()[0]->NOMBRES        
                    );

                $apellidos = array(
                    'name' => 'apellidos',
                    'placeholder' => 'Escriba su apellido',
                    'class'=>'form-control',
                    'value' => $asistentes->result()[0]->APELLIDOS
                    );

                $fecha_nacimiento = array(
                    'name' => 'fecha_nacimiento',
                    'placeholder' => 'Seleccione la fecha de nacimiento',
                    'id'=>'fecha_nac',
                    'class'=>'form-control',
                    'type'=> 'text',
                    'value' => $asistentes->result()[0]->FECHA_MODIFICADA
                    );

                $sexo = array(
                    $sex_option_default => $asistentes->result()[0]->SEXO,
                    $sex_option => $sex_option
                    );

                $direccion = array(
                    'name' => 'direccion',
                    'placeholder' => 'Escriba su direccion actual',
                    'class'=>'form-control',
                    'value' => $asistentes->result()[0]->DIRECCION
                    );
                   
                $telefono = array(
                    'name' => 'telefono',
                    'placeholder' => 'Escriba su direccion actual',
                    'class'=>'form-control',
                    'value' => $asistentes->result()[0]->NUM_TELEFONO
                    );

                 $observaciones = array(
                    'name' => 'observaciones',
                    'placeholder' => 'Escriba observaciones si las hay acerca de la persona',
                    'class'=>'form-control',
                    'value' => $asistentes->result()[0]->OBSERVACIONES

                    );

            
            if ($validar == '1')
            {  
             $encabezado =  "<h3>Modifique la informacion de ALUMNO </h3>";
             $grado_escolar = array(
                    'Aún no estudia' => 'Aún no estudia',
                    'Pre-Primaria' => 'Pre-Primaria',
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

            }elseif($validar == '0')
            { 
                $encabezado = "<h3>Modifique la informacion de ENCARGADO</h3>";           

            }

            $boton = array(
                            'onclick'=>"myFunction()",
                            'id'=>"submit",
                            'name'=>"submit",
                            'type'=>"submit",
                            'value'=>"Guardar Registro",
                            'class'=>"btn btn-primary"
                        );
           
        ?>

             
                                       

        <?= form_open(base_url().'asistentes/guardarpersona/'.$id); 
                echo $encabezado;
                ?>

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
                        <td><?= form_input($fecha_nacimiento) ?></td>
                    </tr>
                     <tr>
                        <td><?= form_label('Sexo: ', 'sexo') ?></td>
                        <td><?= form_dropdown('sexo', $sexo, $sex_option_default,'class=form-control') ?></td>
                        
                    </tr>
                    
                     <tr>
                        <td><?= form_label('Telefono: ', 'telefono') ?></td>
                        <td><?= form_input($telefono) ?></td>
                    </tr>
                    <tr>
                        <td><?= form_label('Direccion: ', 'direccion') ?></td>
                        <td><?= form_input($direccion) ?></td>
                    </tr>
                    <?php 
                    if ($validar == '1')
                    {  
                        echo "<tr> <td>".form_label('Grado Academico: ', 'Grado_Academico')."</td>";
                        echo "<td>".form_dropdown('grado_academico', $grado_escolar, $asistentes->result()[0]->GRADO_ESCOLAR,'class=form-control')."</td></tr>";       
                        
                    }elseif($validar == "Encargado")
                        { 
                            echo "nada";            
                        }
                    ?>
                     <tr>
                        <td><?= form_label('Funcion en campamento: ', 'tipo_persona') ?></td>  
                        <td>
                            <select name="funcion_persona" class="form-control">
                            <?php 
                              if ($validar == '1')
                                {  
                                foreach($funcionAlumno as $row)
                                    {  
                                      echo '<option value="'.$row->ID_FUNCION.'">'.$row->NOMBRE_FUNCION.'</option>';
                                    }

                                }elseif($validar == '0')
                                { 
                                foreach($funcionEncargado as $row)
                                    { 
                                      echo '<option value="'.$row->ID_FUNCION.'">'.$row->NOMBRE_FUNCION.'</option>';
                                    }
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
                        <a href=<?= base_url().'asistentes/eliminarpersona/'.$id?> class="btn btn-danger" role="button">Eliminar Registros
                        </a>       
                </div>
        <?= form_close() ?> 
    </div>
</div>
     