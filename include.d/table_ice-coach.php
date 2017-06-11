<?php

$coach = add_COACHTIME2();

echo '<table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Financial Overview </th></tr>';
echo '</thead><tbody>';
echo '<tr class="small"><td class="text-right">$' . number_format($coach[0], 2, '.', '') . '</td><td class="text-left"> Coach Time </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($ice[0], 2, '.', '') . '</td><td class="text-left"> Ice Time </td></tr>';

$cost = $ice[0] + $coach[0];

echo "</tbody></table>"; 
echo '
              <h4>Total</h4>
              <div class="text-muted">';

echo "$" . number_format($cost, 2, '.', '') . '</div></div>';

?>
