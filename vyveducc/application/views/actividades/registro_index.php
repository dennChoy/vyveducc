<div class="jumbotron">
    <?php echo "<h2>{$nactividad [0]['NOMBRE_ACTIVIDAD']} </h2>
                <h4>Total de personas inscritas: {$totalPersonas[0]->total}<br>
                 Fecha: {$nactividad [0]['FECHA']}<br>
                 Lugar: {$nactividad [0]['LUGAR']} </h4>";
    ?>
 </div>
<div class="col-lg-12">
    <div class="tab-content">
            <div id="table">
                <table align = 'center' class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Funcion Educ. Cristiana</th>
                            <th>Primer Encargado </th>
                            <th>Segundo Encargado </th>
                            <th>Saldo Actual</th>
                            <th>Pago</th>
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
                                    <td><a href=<?= base_url().'index.php/registro/verpermiso/'.$personas->ID_PERSONA.'?actividad='.$nactividad[0]['ID_ACTIVIDAD']?>>
                                            <?php echo $personas->NOMBRES." ".$personas->APELLIDOS;?></a> </td>
                                    <td><?php echo $personas->NOMBRE_FUNCION; ?></td> 
                                    <td><?php echo $personas->ENCARGADO1; ?></td> 
                                    <td><?php echo $personas->ENCARGADO2; ?></td> 

                                    <td><?php echo $personas->SALDO_ACTUAL; ?> </td>
                                    <td>   
                                    <a href=<?= base_url().'index.php/registro/pago/'.$personas->ID_PERSONA.'?actividad='.$nactividad[0]['ID_ACTIVIDAD']?>>
                                        <img  src="<?= base_url() ?>public/images/pagardos.png"  width="42" height="42" > 
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