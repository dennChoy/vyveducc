
<div class="col-lg-12">
    <div class = 'page-header'>
        <h1>Control de usuarios</h1>
    </div>
      
    <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="pill" href="#menu1">Ver todos</a></li>
        <li><a data-toggle="pill" href="#ROL">Tipos de Usuarios</a></li>
   </ul>


    <!-- <?=base_url() ?>asistentes/agregarnuevo/0 -->
   <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <br>
            <a href="<?= base_url('index.php/usuarios/gestion') ?>" class="btn btn-success" role="button">Agregar Nuevo Usuario</a>
            <br>
            <h3>USUARIOS DEL SISTEMA </h3>  

                <div id="table">
                    <table align = 'center' class="table">
                    <tr>
                        <th>ID USUARIO </th>
                        <th>NOMBRE DE USUARIO</th>
                        <th>CONTRASENA</th>
                        <th>ROL DE USUARIO</th>
                        <th>PERSONA ASIGNADA</th>
                    </tr>  

                        <?php
                           if($usuario)
                            {
                                foreach ($usuario->result() as $usuario) 
                                {
                                ?>
                                    <tr> 
                                        <td><?php echo $usuario->ID_USUARIO; ?></td>
                                        <td>
                                            <a href="<?= base_url('index.php/usuarios/gestion/'
                                             .$usuario->ID_USUARIO.'') ?>" >
                                            <?php echo $usuario->NOMBRE_USUARIO; ?>
                                        </a>
                                        </td>
                                        <td><?php echo $usuario->PASSWORD; ?></td>
                                        <td><?php echo $usuario->NOMBRE_TIPO; ?></td>
                                        <td><?php echo $usuario->PERTENECE; ?></td>
                           
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

            <div id="ROL" class="tab-pane fade">

            <br>
            <a href="<?= base_url('index.php/usuarios/roles') ?>" class="btn btn-success" role="button">Agregar Nuevo Rol de Usuario</a>
            <br>

            <h3>ROLES DE USUARIOS</h3>  
                <div id="table">
                    <table align = 'center' class="table">
                    <tr>
                        <th>ID ROL </th>
                        <th>ROL</th>
                        <th>DESCRIPCION/FUNCIOIN</th>
                    </tr>  

                        <?php
                           if($rol)
                            {
                                foreach ($rol as $roll) 
                                {
                                ?>
                                    <tr> 
                                        <td><?php echo $roll->ID_TIPO_USUARIO; ?></td>
                                        <td>
                                            <a href="<?= base_url('index.php/usuarios/roles/'
                                             .$roll->ID_TIPO_USUARIO.'') ?>" >
                                            <?php echo $roll->NOMBRE_TIPO; ?> </a>
                                        </td>
                                        <td><?php echo $roll->DESCRIPCION; ?></td>
                           
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


        </div>
</div>
    


