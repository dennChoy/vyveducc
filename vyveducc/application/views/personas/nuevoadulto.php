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
    
        <?= form_open(base_url().'index.php/personas/guardarpersona'); ?>
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
