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
        
	while ($row = mysql_fetch_assoc($result)) {
        $skate_total += $row['ice_time'];
        }
        
	echo '<p>' . $skate_total . ' total minutes</p>';
       return array($skate_total);
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

$diff = $punch[0] - $skate[0];
$conv = $diff / 30;

echo '<p>' . $conv . ' punches remaining';

?>
