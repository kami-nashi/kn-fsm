<?php

$hours = diff_icetime();

$diff = '';
if ( $hours[0] > $hours[1]){
  $diff = 'text-success';
} elseif ( $hours[1] > $hours[0]){
  $diff = 'text-danger';
} else {
  $diff = '';
}

echo '<div class="placeholder"> <table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Monthly Overview </th></tr>';
echo '</thead><tbody>';
echo '<tr class="small"><td class="text-right '. $diff .'">' . $hours[0] . '</td><td class="text-left"> Hours This Month</td></tr>';
echo '<tr class="small"><td class="text-right">' . $hours[1]  . '</td><td class="text-left"> Hours Last Month</td></tr>';
echo "</tbody></table>";
echo  '</div>';

?>
