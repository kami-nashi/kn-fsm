<?php

function add_ICETIME() {

	require 'db_connect.php';

	$ice = 0;
	$ice_cost = 0;

	$sql = 'select * from ice_time';
	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	while ($row = mysql_fetch_assoc($result)) {
    		$ice += $row['ice_time'];
    		$ice_cost += $row['ice_cost']; 
	 }

	# basic math
	$ice_time = $ice / 60;

	# diag stuff
	echo "<p>" . $ice_time . " Hours </p>";
	echo "<p>$" . $ice_cost . " in Ice</p>";

}

function add_COACHTIME() {

	require 'db_connect.php';

	$coach_minutes = 0;
	$coach_cost = 0;
	$coach_hours = 0;
	$coach_total= 0;

	$sql = 'SELECT ice_time.*, coaches.* FROM ice_time, coaches WHERE ice_time.coach_id = coaches.id';

	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	while ($row = mysql_fetch_assoc($result)) {
    		$coach_cost = $row['coach_rate'];
    		$coach_minutes += $row['coach_time'];
		$coach_hours += $coach_minutes / 60;
		$coach_minutely = $row['coach_rate'] / 30;
	}

	$coach_total = $coach_minutes * $coach_minutely; 

	# diag stuff
	echo "<p>" . number_format($coach_hours, 2, '.', '') . " Hours </p>";
	echo "<p>$" . number_format($coach_total, 2, '.', '') . " in Coach Costs </p>";
}

?>