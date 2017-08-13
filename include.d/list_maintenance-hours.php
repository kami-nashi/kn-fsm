<?php

$m_data = maintenance();

echo '<div class="col-6 col-sm-3 placeholder"><table class="table table" style="width:auto;" align="center"> <thead>';
echo '<tr><th colspan="2" class="text-center"> Maintenance </th></tr>';
echo '</thead><tbody>';
echo '<tr class="small"><td class="text-right">' . number_format($m_data[2], 2, '.', ',') . '</td><td class="text-left"> Current Hours </td></tr>';
echo '<tr class="small"><td class="text-right">' . number_format($m_data[3], 2, '.', ',') . '</td><td class="text-left"> Hours Remaining </td></tr>';
echo "</tbody></table>"; 
echo '</div>';

?>
