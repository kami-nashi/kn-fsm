<?php

require 'include.d/data_static.php';
require 'include.d/functions.php';

$ice = add_ICETIME();

echo '

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Figure Skating Metrics</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  </head>

  <body>';

  	require 'include.d/menu_side.php';
        require 'include.d/table_overview.php';
        require 'include.d/chart_ratio-coach.php';
	require 'include.d/list_maintenance-hours.php';
echo '
		<canvas id="pie-chart" width="200" height="125"></canvas>
		<script>
	new Chart(document.getElementById("pie-chart"), {
    type: "pie",
    data: {
      labels: ["Equipment", "Maintenance", "Class Fees", "Performance", "Membership Fees", "Competition Fees", "Ice Time", "Coaching Cost"],
      datasets: [{
        label: "Totals",
backgroundColor: ["#3e95cd","#8e5ea2","#3cba9f","#e8c3b9","#c45850","#4cc5b7","#d816e0","#3d86e8"],';
print '       data: ['.$totals[0].','.$totals[1].','.$totals[2].','.$totals[3].','.$totals[4].','.$totals[5].','.$ice[0].','.$coach[0].']';
print '        
      }]
    },
    options: {
      title: {
        display: true,
        text: "Totals"
      },
     legend: {
	display: false,
	}
    }
});
</script>
            <div class="col-6 col-sm-3 placeholder">            </div>
          </section>
    <div class="input-append date form_datetime">
        <input size="16" type="text" value="" readonly>
        <span class="add-on"><i class="icon-th"></i></span>
    </div>
     
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "dd/MM/yyyy",
            autoclose: true,
            todayBtn: true,
            pickerPosition: "bottom-left"
        });
    </script>            
          <h2>Session Metrics</h2>
          <div class="table-responsive">';

require 'include.d/table_sessions.php';

echo '
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
</script>
  </body>
</html>

';
?>
