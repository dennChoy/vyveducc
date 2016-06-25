<div class="col-lg-12">
    <div class="navbar-collapse collapse" id="navbar-collapse">
    <h4>Buscar persona </h4>
         <form class="navbar-form navbar-left" action="<?= base_url('index.php/personas/buscar') ?>" method="GET" id="FormBuscar">
                    <div class="form-group">
                      <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre">
                    </div>
                    <select class="form-control">
                      <option value="">--</option>
                        <?php
                        if (isset($funcion)) {
                          foreach ($funcion as $row) {
                            echo "<option value='{$row->ID_FUNCION}'>{$row->NOMBRE_FUNCION}</option>";
                          }
                        }
                        ?>
                      </select>

                    <button type="submit" id="button" class="btn btn-info" data-toggle="tooltip" data-placement="right" title="Haga clic aquí para buscar"><i class="glyphicon glyphicon-search"></i></button>
          </form>
    </div>

<br>
<br>

<div class="tab-content">
    <h3>Listado de personal en el Ministerio de Eduacion Cristiana </h3>  
        <div id="table">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Sexo</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Edad</th>
                        <th>Funcion Educ. Cristiana</th>
                        <th>Grado Escolar</th>
                        <th >Observaciones</th>
                        <th >Editar Observaciones</th>
                    </tr>  
                </thead> 
                <tbody>
                    <?php
                    if($personas)
                    {
                        foreach ($personas as $personas) 
                            {
                    ?>
                            <tr>              
                                <td  style="vertical-align:middle;"><a href=<?= base_url().'index.php/personas/editarpersona/'.$personas->ID_PERSONA ?> >
                                        <?php echo $personas->NOMBRES." ".$personas->APELLIDOS;?></a> </td>
                                 <td><?php echo $personas->SEXO; ?></td>
                                <td><?php echo $personas->FECHA_MODIFICADA; ?></td>
                                <td><?php $edad=date("Y/m/d")-$personas->FECHA_NACIMIENTO; echo $edad." años"; ?></td>
                                <td><?php echo $personas->NOMBRE_FUNCION; ?></td> 
                                <td><?php echo $personas->GRADO_ESCOLAR; ?></td> 
                                <td><?php echo $personas->OBSERVACIONES; ?></td> 
                                <td> 
                                    <a href="#menu-toggle"  id="menu-toggle">
                                        <img  src="<?= base_url() ?>public/images/editar.png"  width="42" height="42" > 
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
</div> <!-- Col-log12, adentro esta todo -->