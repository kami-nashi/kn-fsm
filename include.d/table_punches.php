<?php

$skate = skate_total();
$punch = punch_card();
$skate_h = $skate[0] / 30;
$punched = $skate[1];
$diff = $punch[0] - $skate[0];
$conv = $diff / 30;
$card = $punch[0] / 30;

echo '<div> <table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Punch Card Usage </th></tr>';
echo '</thead><tbody>';
echo '<tr class="small"><td class="text-right">' . $punched  . '</td><td class="text-left"> Punches Used Out Of ' . $card . '</td></tr>';
echo '<tr class="small"><td class="text-right">' . $conv  . '</td><td class="text-left"> Punches Remaining</td></tr>';
echo "</tbody></table>"; 
echo  '</div>';

?>
