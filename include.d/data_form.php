<?php

$sql_coach = 'select * from coaches';
$sql_rink = 'select * from locations';
$sql_itype = 'select * from ice_type';

$result = mysql_query($sql_coach, $link);
$other_result = mysql_query($sql_rink, $link);
$ice_type = mysql_query($sql_itype, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

echo "<form action='include.d/data_submit.php' method='POST'>";
echo "<p>Date: <input size='8' type='text' name='date' id='date'/> ";
echo "Ice Time: <input size='4' type='text' name='ice_time' id='ice_time'/> ";
echo "Ice Cost: <input size='6' type='text' name='ice_cost' id='ice_cost'/> ";
echo '<select name="skate_type">';
while ($row = mysql_fetch_assoc($ice_type)) {
    unset($id, $type);
    $id = $row['id'];
    $type = $row['type'];
    echo "<option value=".$id.">".$type."</option>";
}
echo "</select> ";
echo "Coach Time: <input size='4' type='text' name='coach_time' id='coach_time'/> ";
echo '<select name="coach_name">';
while ($row = mysql_fetch_assoc($result)) {
    unset($id, $name);
    $id = $row['id'];
    $fname = $row['coach_fname'];
    echo "<option value=".$id.">".$fname."</option>";
}
echo "</select> ";
echo '<select name="rink_id">';
while ($row = mysql_fetch_assoc($other_result)) {
    unset($id, $location_id);
    $id = $row['id'];
    $location_id = $row['location_id'];
    echo "<option value=".$id.">".$location_id."</option>";
}
echo "</select>";
echo '<input type="submit" value="Add Time"></p></form>';

?>