<?php

require 'db_connect.php';

echo '<table class="table table-striped"> <thead>
<tr><td>Date</td><td>Skate Time</td><td>Ice Cost</td><td>Skate Type</td><td>Coach Time</td><td>Coach Name</td><td>Coach Rate</td><td>Rink Name</td><td>City</td><td>State</td></tr>

</thead>
<tbody>';

$sql = 'select * from ice_time, coaches, locations, ice_type where ice_time.coach_id = ice_time.coach_id and coaches.id = ice_time.coach_id and locations.id = ice_time.rink_id and ice_type.id = ice_time.skate_type and ice_time.date > (NOW() - INTERVAL 14 DAY) ORDER BY date DESC';
$result = mysql_query($sql, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_assoc($result)) {
    $total_ice += $row['ice_time'];
    $ice_cost += $row['ice_cost'];

    echo "<tr><td>" . $row['date'] . "</td><td>" . $row['ice_time'] . "</td><td>" . $row['ice_cost'] . "</td><td>" .$row['type'] . "</td><td>" . $row['coach_time'] . "</td><td>" . $row['coach_fname'] . " " . $row['coach_lname'] . "</td><td>" . $row['coach_rate'] . "</td><td>" . $row['location_id'] . "</td><td>" . $row['location_city'] ."</td><td>" .  $row['location_state'] . "</td></tr>";
    
    $sum_coach_time += $row['coach_time'];
    $converted_coach_rate = $row['coach_rate'] / 30;
    $final_coach_rate += $row['coach_time'] * $converted_coach_rate;
}

echo '</tbody></table>';

?>