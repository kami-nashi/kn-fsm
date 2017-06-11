<?php

require 'data_static.php';

$coach = add_COACHTIME2();
$m_cost = maintenance();

echo '<table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Financial Overview </th></tr>';
echo '</thead><tbody>';

echo '<tr class="small"><td class="text-right">$' . number_format($total_equipment, 2, '.', '') . '</td><td class="text-left"> Equipment </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($m_cost[1], 2, '.', '') . '</td><td class="text-left"> Maintenance </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($total_class_fees, 2, '.', '') . '</td><td class="text-left"> Class Fees </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($total_perf_fees, 2, '.', '') . '</td><td class="text-left"> Performance Fees </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($total_membership, 2, '.', '') . '</td><td class="text-left"> Membership Fees </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($total_comp_fees, 2, '.', '') . '</td><td class="text-left"> Competition Fees </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($ice[0], 2, '.', '') . '</td><td class="text-left"> Ice Time </td></tr>';
echo '<tr class="small"><td class="text-right">$' . number_format($coach[0], 2, '.', '') . '</td><td class="text-left"> Coaching Cost </td></tr>';

$cost = $ice[0] + $coach[0] + $total_equipment + $m_cost[1] + $total_class_fees + $total_perf_fees + $total_membership + $total_comp_fees;

echo '</tbody></table> 

              <h4>Total</h4>
              <div class="text-muted">';

echo '$' . $cost . '</div></div>'; 

?>
