<?php

$m_data = maintenance();

echo '<div class="col-6 col-sm-3 placeholder"><table class="table table" style="width:auto;" align="center"> <thead>';

echo '<table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Maintenance Cost</th></tr>';
echo '</thead><tbody>';
echo '<tr class="small"><td class="text-right">$' . number_format($m_data[1], 2, '.', ',') . '</td><td class="text-left">  </td></tr>';
echo "</tbody></table>";
echo '</div>';

?>
