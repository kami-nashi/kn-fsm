
<?php

if (!$link = mysql_connect('localhost', '$USER', '$SECRETS')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('kn_fsm', $link)) {
    echo 'Could not select database';
    exit;
}

$sql    = 'select * from ice_time, coaches, locations, ice_type where ice_time.coach_id = ice_time.coach_id and coaches.id = ice_time.coach_id and locations.id = ice_time.rink_id and ice_type.id = ice_time.skate_type';
#$result = mysql_query($sql, $link);

#$sql = 'select * from ice_time';
$result = mysql_query($sql, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

$total_ice = 0;
$total_coaching_cost = 0;

while ($row = mysql_fetch_assoc($result)) {
    $total_ice += $row['ice_time'];
    echo "<p>".$row['date']." ".$row['ice_time']." ".$row['ice_cost']." ".$row['type']." ".$row['coach_time']." ".$row['coach_fname']." ".$row['coach_lname']." ".$row['coach_rate']." ".$row['location_id']." ".$row['location_city']." ".$row['location_state']."</p>";
    echo "\n";
    $total_coaching_cost = $row['coach_rate'];

}

$ice_hours = $total_ice / 60;
$coachingcosts = (($total_coaching_cost * 2) *  $ice_hours);

echo "<p>".$total_ice / 60 ." Hours </p>";
echo "<p>".$coachingcosts." Dollars </p>";
#mysql_free_result($result);

?>

