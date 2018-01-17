<?php
require 'include.d/db_connect.php';
$ice = add_ICETIME();
$sql_rink = 'select * from locations';


$result = mysql_query($sql_coach, $link);
$other_result = mysql_query($sql_rink, $link);
$ice_type = mysql_query($sql_itype, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

echo "<form action='include.d/data_submit_maintenance.php' method='POST'>";
echo "<p>Date: <input size='8' type='text' name='m_date' id='m_date'/> ";
echo "Hours On: <input size='4' type='text' name='m_hours_on' id='m_hours_on'/> ";
echo "Maintenance Cost: <input size='6' type='text' name='m_cost' id='m_cost'/> ";
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
