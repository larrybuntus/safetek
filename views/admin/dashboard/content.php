<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Days', 'Number'],
          <?php  
            foreach ($graph as $gph) {
              echo "['".$gph['dateCreated']."',".$gph['count']."],";
            }
          ?>
        ]);

        var options = {
          	chart: {
	            title: 'Groups Created',
	            subtitle: 'Groups created between date selected',
          	},
      		legend: { position: 'none' }

        };

        var chart = new google.charts.Bar(document.getElementById('graph-column'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

	<div class="graph-container">
		<div class="row">
			<div class="col s12">
				<div class="card z-depth-2">
					<div class="card-content">
						<div id="graph-column">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>