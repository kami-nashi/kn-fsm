<?php

require 'include.d/functions.php';

$ice = add_ICETIME();

require 'include.d/html_header.php';

	require 'include.d/menu_side.php';
	require 'include.d/table_ice-coach.php';	
	require 'include.d/chart_ratio-coach.php';	
        require 'include.d/chart_coach-ratio.php';

	echo'
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
