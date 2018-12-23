<?php
require 'include.d/functions.php';
require 'include.d/html_header.php';

        require 'include.d/menu_side.php';
        require 'include.d/list_maintenance-hours.php';
        echo '</div><div>';
        require 'include.d/chart_maintenance.php';
        echo '</div><div>';
        require 'include.d/list_maintenance-cost.php';
        echo ' </div>';

	require 'include.d/table_maintenance.php';

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
