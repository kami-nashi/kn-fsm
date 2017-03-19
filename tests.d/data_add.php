<?php

require_once '../include.d/db_connect.php';

$sql_coach = 'select * from coaches';
$sql_rink = 'select * from locations';

$result = mysql_query($sql_coach, $link);
$other_result = mysql_query($sql_rink, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

echo "<html>";
echo "<body>";
echo "<p><select name='id'>";

while ($row = mysql_fetch_assoc($result)) {
    unset($id, $name);
    $id = $row['id'];
    $fname = $row['coach_fname'];
    echo '<option value="'.$id.'">'.$fname.'</option>';
}

echo "</select></p>";
echo "<p><select>";

while ($row = mysql_fetch_assoc($other_result)) {
    unset($id, $location_id);
    $id = $row['id'];
    $location_id = $row['location_id'];
    echo '<option value="'.$id.'">'.$location_id.'</option>';
}

echo "</select></p>";
echo "</body>";
echo "</html>";

?>