<?php

$ice = add_ICETIME();
$coach = add_COACHTIME();
$no_coach = $ice[1] - $coach[1];

echo '<div class="col-6 col-sm-3 placeholder"><table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Training Hours </th></tr>';
echo '</thead><tbody>';

echo '<tr class="small"><td class="text-right">' . number_format($coach[1], 2, '.', '') . '</td><td class="text-left"> Coached Hours </td></tr>';
echo '<tr class="small"><td class="text-right">' . number_format($no_coach, 2, '.', '') . '</td><td class="text-left"> Uncoached Hours </td></tr>';

$cost = $ice[1] + $coach[1];

echo '</tbody></table>'; 
echo '
              <h4>Total</h4>
              <div class="text-muted">';
echo $ice[1] . ' Hours </div></div>';
?>
