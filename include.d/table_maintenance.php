<?php

echo '<table class="table table-striped"> <thead>
<tr><td>Date</td><td>Hours On</td><td>Maintenance Cost</td></tr>

</thead>
<tbody>';

while ($row = mysql_fetch_assoc($result)) {
    $total_ice += $row['ice_time'];
    $ice_cost += $row['ice_cost'];

    echo "<tr><td>" . $row['m_date'] . "</td><td>" . $row['m_hours_on'] . "</td><td>" . $row['m_cost'] . "</td></tr>";
}

echo '</tbody></table>';

?>