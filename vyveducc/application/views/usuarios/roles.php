<div class="col-lg-12">
    <div class = 'page-header'>
        <h1>Gestion de Roles de Usuarios</h1>
    </div>
          
    <div id = "formulario">

        <?php
            $id = $this->uri->segment(3);
            if($id > 0)
            {
                $encabezado = "<h4>Modifique la informacion del Rol seleccionado</h4>";

                 $nombre = array(
                    'name' => 'nombre_rol',
                    'placeholder' => 'Ingrese el nombre de usuario',
                    'class'=>'form-control',
                    'value' => $rol->result()[0]->NOMBRE_TIPO,
                    );


                 $descripcion = array(
                    'name' => 'descripcion',
                    'placeholder' => 'Ingrese la contraseña',
                    'class'=>'form-control',
                    'value' => $rol->result()[0]->DESCRIPCION
                    );

            }else
            {
                $encabezado = "<h4>Ingrese la informacion del nuevo rol</h4>";

                 $nombre = array(
                    'name' => 'nombre_rol',
                    'placeholder' => 'Ingrese el nombre de usuario',
                    'class'=>'form-control',
                    );


                 $descripcion = array(
                    'name' => 'descripcion',
                    'placeholder' => 'Ingrese la contraseña',
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

        <?= form_open(base_url().'index.php/usuarios/guardaRol/'.$id); 
                echo $encabezado;
                ?>

                 <table align="center" class="table">
                    <tr>
                        <td><?= form_label('Nombre del Rol ', 'nombre') ?> </td>
                        <td><?= form_input($nombre) ?> </td>

                    </tr>
                    <tr>
                        <td><?= form_label('Descripción/ Asignación/ Observaciones ', 'desc') ?></td>
                        <td><?= form_input($descripcion) ?></td>
                    </tr>
                </table>
                <br/>

                <div id='botones' align="center">
               
                        <?php echo form_submit($boton) ?>   
                        <a href=<?= base_url().'usuarios/eliminarRol/'.$id?> class="btn btn-danger" role="button">Eliminar Registros
                        </a>       
                </div>
        <?= form_close() ?> 
    </div>
</div>
     