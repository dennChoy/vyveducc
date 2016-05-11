<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Iglesia La Verdad y La Vida</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>Public/estilo/sidebar-plantilla/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>Public/estilo/sidebar-plantilla/simple-sidebar.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>Public/estilo/datepicker.css">

    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url() ?>Public/javascript/js/jquery.js"></script>
    <!-- <script src="js/jquery.js"></script> --->

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="js/bootstrap.min.js"></script>-->
     <script type="text/javascript"src="<?= base_url() ?>Public/javascript/js/bootstrap.min.js"></script>

     <script type="text/javascript"src="<?= base_url() ?>Public/javascript/js/bootstrap-datepicker.js"></script>
    
</head>
<body>
<div  id="toolbar">
    <div class="row">
        <div class="col-sm-4" >
            <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Mostrar/Ocultar Menu</a>
        </div>
        <div class="col-sm-8" align="right">
            <?php echo $username; ?>
            <a href="<?= base_url('login/logout') ?>" class="btn btn-danger" role="button">Cerrar Session</a>
         </div>
    </div>
</div>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=<?= site_url('home')?>>
                        Inicio 
                    </a>
                </li>
                <li>
                   <a href=<?= base_url().'asistentes' ?> > Control de Personas</a>
                </li>
                <li>
                    <a href=<?= base_url().'tipo_personas' ?> >Funciones/Puestos</a>
                </li>
             <?php 
            //echo $this->session->userdata('ROL_USUARIO');
            $privilegio = $this->session->userdata('ROL_USUARIO');
            if ($privilegio < 3)
            {
            echo "
                <li>
                    <a href='#'>Control de Actividades</a>
                </li>
                <li>
                    <a href='#'>Registro de Asistentes</a>
                </li>
                <li>
                    <a href='#' >Pagos</a>";
           }
           if($privilegio == 1){
            echo "
                </li>
                <li>
                    <a  href =".base_url('usuarios').">Gestionar Usuarios</a>
                </li>
                <li>
                    <a href='#'>Historial (Bitacora)</a>
                </li> ";
                      
            }   
                ?>
                  <li>
                    <a href='#'>Agenda</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
                <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">            
                <div class="row">
                    
        
                <section id="contenido_principal" class="container-fluid">
                      <article>
                         <?php
                           $this->load->view($cuerpo);
                         ?>
                       </article>
                 </section>
                   
                </div> <!-- ClassRow -->
            </div> <!-- Container Fluid -->
        </div><!-- Page content wrapper -->
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script >
            // When the document is ready
          /*
            $(document).ready(function () {
                $('#fecha_nac').datepicker({
                    format: "yyyy-mm-dd"
                  
                });  
            });
            */
        $(function() {
            $("#fecha_nac").datepicker({
                format: "dd-mm-yyyy"
            });
            $("#fecha_nac2").datepicker({
                format: "dd-mm-yyyy"
            });
        });
              
    </script>





</body>

</html>