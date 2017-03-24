<?php

require_once '../include.d/db_connect.php';

$sql = 'select * from ice_time, coaches, locations, ice_type where ice_time.coach_id = ice_time.coach_id and coaches.id = ice_time.coach_id and locations.id = ice_time.rink_id and ice_type.id = ice_time.skate_type ORDER BY date DESC';

$result = mysql_query($sql, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

$total_ice = 0;
$ice_cost = 0;
$sum_coach_time = 0;
$final_coach_rate = 0;
echo "<table>";
echo "<tr><td> Date </td><td> Skate Time </td><td> Ice Cost </td><td> Skate Type </td><td> Coach Time </td><td> Coach Name </td><td> Coach Rate </td><td> Rink Name </td><td> City </td><td> State <tr><td>";


while ($row = mysql_fetch_assoc($result)) {
    $total_ice += $row['ice_time'];
    $ice_cost += $row['ice_cost'];
    echo "<tr><td>" . $row['date'] . "</td><td>" . $row['ice_time'] . "</td><td>" . $row['ice_cost'] . "</td><td>" .$row['type'] . "</td><td>" . $row['coach_time'] . "</td><td>" . $row['coach_fname'] . " " . $row['coach_lname'] . "</td><td>" . $row['coach_rate'] . "</td><td>" . $row['location_id'] . "</td><td>" . $row['location_city'] ."</td><td>" .  $row['location_state'] . "<tr><td>";
    echo "\n";
    $sum_coach_time += $row['coach_time'];
    $converted_coach_rate = $row['coach_rate'] / 30;
    $final_coach_rate += $row['coach_time'] * $converted_coach_rate;

}

$ice_hours = $total_ice / 60;

echo "</table>";

#Basic Math
$ti_time = $total_ice / 60;
$tc_time = $sum_coach_time / 60;

echo "<p>" . $ti_time . " Total Hours <span>" . $ice_cost  . " Ice Cost</span> </p>";
echo "<p>" . $tc_time . " Coached Hours <span>" . $final_coach_rate . " Dollars </span></p>";

?>
