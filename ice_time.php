<?php
require_once 'include.d/db_connect.php';
require_once 'include.d/data_static.php';

$sql = 'select * from ice_time, coaches, locations, ice_type where ice_time.coach_id = ice_time.coach_id and coaches.id = ice_time.coach_id and locations.id = ice_time.rink_id and ice_type.id = ice_time.skate_type ORDER BY date DESC';
$result = mysql_query($sql, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

$total_ice = 0;
$ice_cost = 0;
$sum_coach_time = 0;
$final_coach_rate = 0;

#Basic Math
$ti_time = $total_ice / 60;
$tc_time = $sum_coach_time / 60;

echo '

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>

  <body>';

	require 'include.d/menu_side.php';
	require 'include.d/table_ice-coach.php';	

	echo '</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">';

require 'include.d/chart_ratio-coach.php';	

        echo'
          </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </section>

          <h2>Session Metrics</h2>
          <div class="table-responsive">';

require_once 'include.d/table_sessions.php';

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
