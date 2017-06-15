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

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>

  <body>';

  	require 'include.d/menu_side.php';
        require 'include.d/table_overview.php';
        require 'include.d/chart_ratio-coach.php';
	require 'include.d/list_maintenance-hours.php';
echo '
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
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
<script>
jQuery(document).ready(function () {

    jQuery('.datepicker').datetimepicker({ format: 'DD/MM/YYYY' });
    jQuery('.datetimepicker').datetimepicker();

});
</script>
  </body>
</html>

';
?>
