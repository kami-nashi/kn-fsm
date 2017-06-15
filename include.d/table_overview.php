<?php

require 'data_static.php';

$coach = add_COACHTIME2();
#$m_cost = maintenance();
#$events_c = add_EVENTS_C();
#$events_p = add_EVENTS_P();
#$equip_add = add_EQUIP();
#$club_cost = add_CLUB();
#$class_cost = add_SKATESCHOOL();

$totals = add_costs_total();

echo '<table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Financial Overview </th></tr>';
echo '</thead><tbody>';

echo '<tr class="small"><td class="text-right">$' . number_format($totals[0], 2, '.', '') . '</td><td class="text-left"> Equipment </td></tr>';		#d
echo '<tr class="small"><td class="text-right">$' . number_format($totals[1], 2, '.', '') . '</td><td class="text-left"> Maintenance </td></tr>';		#d
echo '<tr class="small"><td class="text-right">$' . number_format($totals[2], 2, '.', '') . '</td><td class="text-left"> Class Fees </td></tr>';		#
echo '<tr class="small"><td class="text-right">$' . number_format($totals[3], 2, '.', '') . '</td><td class="text-left"> Performance Fees </td></tr>';	#d
echo '<tr class="small"><td class="text-right">$' . number_format($totals[4], 2, '.', '') . '</td><td class="text-left"> Membership Fees </td></tr>';	#
echo '<tr class="small"><td class="text-right">$' . number_format($totals[5], 2, '.', '') . '</td><td class="text-left"> Competition Fees </td></tr>';	#d
echo '<tr class="small"><td class="text-right">$' . number_format($ice[0], 2, '.', '') . '</td><td class="text-left"> Ice Time </td></tr>';			#d
echo '<tr class="small"><td class="text-right">$' . number_format($coach[0], 2, '.', '') . '</td><td class="text-left"> Coaching Cost </td></tr>';		#d

$cost = $totals[0] + $totals[1] + $totals[2] + $totals[3] + $totals[4] + $totals[5] + $ice[0] + $coach[0];

echo '</tbody></table> 

              <h4>Total</h4>
              <div class="text-muted">';

echo '$' . $cost . '</div></div>'; 

?>
