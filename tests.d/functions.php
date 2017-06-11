<?php

function add_COACHTIME() {
	require '../include.d/db_connect.php';
	$sql = 'SELECT ice_time.*, coaches.* FROM ice_time, coaches WHERE ice_time.coach_id = coaches.id';
	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

    	$coach_time = 0;
	$coach_rate = 0;
	$coach_conversion = 0;
	$coach_cost = 0;
	$coach_minutes = 0;

	while ($row = mysql_fetch_assoc($result)) {
    		$coach_minutes += $row['coach_time'];
    		$coach_time = $row['coach_time'];
		$coach_rate = $row['coach_rate'];
		$coach_conversion = $coach_rate / 30;
		$coach_cost += $coach_time * coach_conversion;
	}
	
#	$rounded_minutes = ceiling($coach_minutely, 0.05);  

	$coach_hours = $coach_minutes / 60;
	$coach_total = $coach_minutes * $coach_minutely; 

	return array($coach_cost, $coach_hours);

	# diag stuff
	echo "<p>" . number_format($coach_cost, 2, '.', '') . " in Coached Hours </p>";
	#echo "<p>$" . number_format($coach_total, 2, '.', '') . " in Coach Costs </p>";

}

add_COACHTIME();

echo 'numbers ' . $add_COACHTIME[0];

?>