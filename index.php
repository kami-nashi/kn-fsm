<?php
require 'include.d/db_connect.php';
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
        require 'include.d/chart_overview.php';
echo ' <div>';
        require 'include.d/chart_coach-ratio.php'; 
	require 'include.d/chart_ratio-coach.php';
echo ' </div>';
echo ' <div>';
	require 'include.d/chart_maintenance.php';
	require 'include.d/list_maintenance-hours.php';
echo ' </div>';
echo ' </section><h2>Session Metrics</h2>';
	require 'include.d/data_form.php';
echo ' <div class="table-responsive">';

	require 'include.d/table_sessions.php';

echo '
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>

';
?>
