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
    <title>Educacion Cristiana</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/estilo/bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/estilo/simple-sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/estilo/countdown.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/estilo/general.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/estilo/datepicker.css">

    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url() ?>public/javascript/js/jquery.js"></script>
    <!-- <script src="js/jquery.js"></script> --->

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="js/bootstrap.min.js"></script>-->
     <script type="text/javascript" src="<?= base_url() ?>public/javascript/js/bootstrap.min.js"></script>

     <script type="text/javascript" src="<?= base_url() ?>public/javascript/js/bootstrap-datepicker.js"></script>
     <script type="text/javascript" src="<?= base_url() ?>public/javascript/js/misc.js"></script>
     <script type="text/javascript" src="<?= base_url() ?>public/javascript/js/jquery.lwtCountdown-1.0.js"></script>

     <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/estilo/font-awesome/css/font-awesome.min.css">

     
    
</head>
<body>

<nav id="header-body"  role="navigation" >  
       
        <div class="col-xs-3 col-sm-3 col-lg-3" id="hide-menu">
            <a href="#menu-toggle"  id="menu-toggle">
                <img  src="<?= base_url() ?>public/images/list-mini-128.png"  width="42" height="42" > 
            </a>  Menu
        </div>
       
        <div class="col-xs-6 col-sm-6 col-lg-6" align='center' id='titulo' >
            <font size="4"> Ministerio de Educacion Cristiana <br>y Discipulado</font>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-lg-3" align="right" id='user'>
            <div class="nav navbar-top-links navbar-right"   >
                <div class="dropdown" id='user1'>
                <?php echo $username; ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="hola">
                        <img  src="<?= base_url() ?>public/images/uuser.png"  width="42" height="42" > 
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= base_url() ?>index.php/login/logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
</nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=<?= site_url('login/home')?>>
                        Inicio 
                    </a>
                </li>
                <li>
                   <a href=<?= base_url().'index.php/personas' ?> > Control de Personas</a>
                    <ul class="submenu">
                        <li><a href=<?= base_url().'index.php/personas/nuevoalumno' ?>>Agregar Alumno</a></li>
                        <li><a href=<?= base_url().'index.php/personas/nuevoadulto' ?>>Agregar Maestro/Encargado</a></li>
                    </ul>
                </li>
                <li>
                    <a href=<?= base_url().'index.php/tipo_personas' ?> >Funciones/Puestos</a>
                     <ul class="submenu">
                        <li><a href='#'>Agregar nueva funcion</a></li>
                    </ul>
                </li>
                     <?php 
                    //echo $this->session->userdata('ROL_USUARIO');
                    $privilegio = $this->session->userdata('ROL_USUARIO');
                    if ($privilegio < 3)
                    {
                    echo "
                        <li>
                            <a href='#'>Control de Actividades</a>
                                <ul class='submenu'>
                                    <li><a href='#' >Actividades</a> </li>
                                    <li><a href =".base_url('index.php/registro/inscribir').">Realizar inscripciones</a> </li>
                                    <li><a href =".base_url('index.php/registro/buscarinscritos').">Ver Asistentes / Pagos</a> </li>
                                </ul>
                        </li>
                        ";
                   }
                   if($privilegio == 1){
                    echo "
                        </li>
                        <li>
                            <a  href =".base_url('index.php/usuarios').">Gestionar Usuarios</a>
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
            <div class="col-lg-12">

                 <?php
                   $this->load->view($cuerpo);
                 ?>
            </div>
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