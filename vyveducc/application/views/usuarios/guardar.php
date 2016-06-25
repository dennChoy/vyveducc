<div class="col-lg-12">
    <div class = 'page-header'>
        <h1>Gestion de usuarios</h1>
    </div>
          
    <div id = "formulario">

        <?php
            $id = $this->uri->segment(3);
            if($id > 0)
            {
                $encabezado = "<h4>Modifique la informacion del usuario</h4>";

                 $username = array(
                    'name' => 'username',
                    'placeholder' => 'Ingrese el nombre de usuario',
                    'class'=>'form-control',
                    'value' => $usuario->result()[0]->NOMBRE_USUARIO,
                    );


                 $password = array(
                    'name' => 'pass',
                    'placeholder' => 'Ingrese la contraseña',
                    'class'=>'form-control',
                    'value' => $usuario->result()[0]->PASSWORD
                    );


                 $asignado = array(
                    'name' => 'asignado',
                    'placeholder' => 'Escriba el nombre de la persona que usará el nuevo usuario',
                    'class'=>'form-control',
                    'value' => $usuario->result()[0]->PERTENECE
                    );
            }else
            {
                $encabezado = "<h4>Ingrese la informacion del nuevo usuario</h4>";

                 $username = array(
                    'name' => 'username',
                    'placeholder' => 'Ingrese el nombre de usuario',
                    'class'=>'form-control',
                    );


                 $password = array(
                    'name' => 'pass',
                    'placeholder' => 'Ingrese la contraseña',
                    'class'=>'form-control',
                    );


                 $asignado = array(
                    'name' => 'asignado',
                    'placeholder' => 'Escriba el nombre de la persona que usará el nuevo usuario',
                    'class'=>'form-control',
                    );
            }

            $boton = array(
            'onclick'=>"myFunction()",
            'id'=>"submit",
            'name'=>"submit",
            'type'=>"submit",
            'value'=>"Guardar Usuario",
            'class'=>"btn btn-primary"
            );

        ?>

        <?= form_open(base_url().'index.php/usuarios/guardarusuario/'.$id); 
                echo $encabezado;
                ?>

                 <table align="center" class="table">
                    <tr>
                        <td><?= form_label('Nombre de Usuario ', 'nombre') ?> </td>
                        <td><?= form_input($username) ?> </td>

                    </tr>
                    <tr>
                        <td><?= form_label('Contrasena ', 'passwd') ?></td>
                        <td><?= form_input($password) ?></td>
                    </tr>
                     <tr>
                        <td><?= form_label('Asignado a: ', 'fechaNac') ?></td>
                        <td><?= form_input($asignado) ?></td>
                    </tr>                    

                     <tr>
                        <td><?= form_label('Rol de usuario: ', 'rol') ?></td>  
                        <td>
                            <select name="rol" class="form-control">
                            <?php 
                     
                                foreach($rol as $row)
                                    {  
                                      echo '<option value="'.$row->ID_TIPO_USUARIO.'">'.$row->NOMBRE_TIPO.'</option>';
                                    }

                            ?>
                            </select>
                        </td>
                    </tr>
                   
                </table>
                <br/>

                <div id='botones' align="center">
               
                        <?php echo form_submit($boton) ?>   
                        <a href=<?= base_url().'usuarios/eliminarUsuario/'.$id?> class="btn btn-danger" role="button">Eliminar Registros
                        </a>       
                </div>
        <?= form_close() ?> 
    </div>
</div>
     