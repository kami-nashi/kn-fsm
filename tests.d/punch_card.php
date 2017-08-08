<?php

function skate_total() {
require '../include.d/db_connect.php';

        $sql = 'SELECT * FROM ice_time WHERE skate_type = 8';
	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	}
	echo "<table>";       
	echo "<tr><td> Date </td><td> Time </td><td> Cost </td><td> Punches </td></tr>";
	while ($row = mysql_fetch_assoc($result)) {
        $skate_total += $row['ice_time'];
	$punch_down = $row['ice_time'] / 30;
        echo "<tr><td>" . $row['date'] . "</td><td>" . $row['ice_time'] . "</td><td>" . $row['ice_cost'] . "</td><td>" . $punch_down  . "</td></tr>";
 	$punches_total += $punch_down;

       }
        echo "</table>";
	echo '<p>' . $skate_total . ' total minutes</p>';
       return array($skate_total, $punches_total);
}

function punch_card(){
require '../include.d/db_connect.php';

        $sql = 'SELECT * FROM ice_punch WHERE punch_location = 1';
	$result = mysql_query($sql, $link);
                if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
         }

	while ($row = mysql_fetch_assoc($result)) {
        $punch_total += $row['punch_time'];
        }

	echo '<p>' . $punch_total . ' on card';
	return array($punch_total);

}

$skate = skate_total();
$punch = punch_card();
$skate_h = $skate[0] / 30;
$punched = $skate[1];
$diff = $punch[0] - $skate[0];
$conv = $diff / 30;
$card = $punch[0] / 30;

echo '<p>' . $punched . ' used punches';
echo '<p>' . $conv . ' punches remaining';
echo '<p>' . $card . ' total on card';
?>
