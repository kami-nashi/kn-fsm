<?php

require 'include.d/functions.php';

$ice = add_ICETIME();
$coach = add_COACHTIME();

echo '<table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Financial Overview </th></tr>';
echo '</thead><tbody>';

echo '<tr class="small"><td class="text-right">$' . number_format($total_class_fees, 2, '.', '') . '</td><td class="text-left"> Class Fees </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($ice[0], 2, '.', '') . '</td><td class="text-left"> Ice Time </td></tr>';

$cost = $ice[0] + $coach[0] + $total_class_fees;

echo "</tbody></table>"; 

echo '

              <h4>Total</h4>
              <div class="text-muted">';

echo "$" . $cost;

?>