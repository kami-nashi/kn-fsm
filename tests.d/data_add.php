<?php

require_once '../include.d/db_connect.php';

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

echo "<html>";
echo "<body>";

echo "<form action='data_submit.php' method='POST'>";
echo "<p>Date: <input type='text' name='date' id='date'/> ";
echo "Ice Time: <input type='text' name='ice_time' id='ice_time'/> ";
echo "Ice Cost: <input type='text' name='ice_cost' id='ice_cost'/> ";
echo '<select name="skate_type">';
while ($row = mysql_fetch_assoc($ice_type)) {
    unset($id, $type);
    $id = $row['id'];
    $type = $row['type'];
    echo "<option value=".$id.">".$type."</option>";
}
echo "</select> ";
echo "Coach Time: <input type='text' name='coach_time' id='coach_time'/> ";
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
echo "</select></p>";
echo '<center><input type="submit" value="ADD">
<input type="reset" value="ADD MORE RESOURCE"></center></form>';

echo "</body>";
echo "</html>";

?>
