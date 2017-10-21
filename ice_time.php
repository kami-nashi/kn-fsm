<?php

require 'include.d/functions.php';

$ice = add_ICETIME();

require 'include.d/html_header.php';

	require 'include.d/menu_side.php';
	require 'include.d/table_ice-coach.php';
	require 'include.d/table_hours.php';
	require 'include.d/table_punches.php';
	require 'include.d/chart_ratio-coach.php';
  require 'include.d/chart_coach-ratio.php';

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
