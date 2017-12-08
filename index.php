<?php
require 'include.d/db_connect.php';
require 'include.d/functions.php';

$ice = add_ICETIME();

require 'include.d/html_header.php';

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
require 'include.d/chart_area-12months.php';
echo ' </section><h2>Session Metrics</h2>';
	require 'include.d/data_form.php';
echo ' <div class="table-responsive">';
	require 'include.d/table_sessions-brief.php';

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
