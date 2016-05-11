        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Mostrar/Ocultar Menu</a>
                <div class="row">
                    <div class="col-lg-12">
                   		<div class = 'page-header'>
							<h1>Control de pagos</h1>
						</div>
                
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url() ?>javascript/js/jquery.js"></script>
    <!-- <script src="js/jquery.js"></script> --->

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="js/bootstrap.min.js"></script>-->
     <script type="text/javascript"src="<?= base_url() ?>javascript/js/bootstrap.min.js"></script>
     

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>


</body>

</html>