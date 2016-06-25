<div class="col-lg-12">
	<div class = 'page-header' align = "center">
    	<div id="container">
		<!-- Countdown dashboard start -->

		<h3 class="subtitle">DIAS PARA CAMPAMENTO DE NIÑOS</h3>
			<div id="countdown_dashboard">
				<div class="dash weeks_dash">
					<span class="dash_title">semanas</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>

				<div class="dash days_dash">
					<span class="dash_title">dias</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>

				<div class="dash hours_dash">
					<span class="dash_title">horas</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>

				<div class="dash minutes_dash">
					<span class="dash_title">minutos</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>

				<div class="dash seconds_dash">
					<span class="dash_title">segundos</span>
					<div class="digit">0</div>
					<div class="digit">0</div>
				</div>

			</div>

		</div>
	</div>
		<h3>Mision y Vision</h3>
		<p aling = 'center'>
			Capacitar a todo el personal involucrado dentro del proceso de planificación y desarrollo del campamento para ofrecer a los niños una mejor atención tanto en el área espiritual, como en el personal.
		</p>

		<!-- Countdown dashboard end -->
		<script language="javascript" type="text/javascript">
			jQuery(document).ready(function() {
				$('#countdown_dashboard').countDown({
					targetDate: {
						'day': 		08,
						'month': 	12,
						'year': 	2016,
						'hour': 	0,
						'min': 		0,
						'sec': 		0
					}
				});
				
				$('#email_field').focus(email_focus).blur(email_blur);
				$('#subscribe_form').bind('submit', function() { return false; });
			});
		</script>
</div>