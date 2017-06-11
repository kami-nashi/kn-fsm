<?php

function add_ICETIME() {

	require 'db_connect.php';
	$sql = 'select * from ice_time';
	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	$ice = 0;
	$ice_cost = 0;

	while ($row = mysql_fetch_assoc($result)) {
    		$ice += $row['ice_time'];
    		$ice_cost += $row['ice_cost']; 
	 }

	# basic math
	$ice_time = $ice / 60;

	return array($ice_cost, $ice_time);

}

function add_COACHTIME() {

	require 'db_connect.php';
	$sql = 'SELECT ice_time.*, coaches.* FROM ice_time, coaches WHERE ice_time.coach_id = coaches.id';
	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	$coach_minutes = 0;
	$coach_cost = 0;
	$coach_hours = 0;
	$coach_total= 0;

	while ($row = mysql_fetch_assoc($result)) {
    		$coach_cost = $row['coach_rate'];
    		$coach_minutes += $row['coach_time'];
		$coach_minutely = $row['coach_rate'] / 60;
	}
	
	$coach_hours = $coach_minutes / 60;
	$coach_total = $coach_minutes * $coach_minutely; 

	return array($coach_total, $coach_hours);
}

function add_TOTALS(){
	
	$ice = add_ICETIME();
	$coach = add_COACHTIME();
	$cost = $ice[0] + $coach[0];

	echo $cost;

}

function add_COACHTIME2() {

	require 'db_connect.php';
	$get_sql = 'SELECT ice_time.*, coaches.* FROM ice_time, coaches WHERE ice_time.coach_id = coaches.id';
	$coach_result = mysql_query($get_sql, $link);
		if (!$coach_result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

    	$coach_time = 0;
	$coach_rate = 0;
	$coach_conversion = 0;
	$coach_cost = 0;
	$coach_minutes = 0;

	while ($row = mysql_fetch_assoc($coach_result)) {
    		$coach_minutes += $row['coach_time'];
    		$coach_time = $row['coach_time'];
		$coach_rate = $row['coach_rate'];
		$coach_conversion = $coach_rate / 30;
		$coach_cost += $coach_time * coach_conversion;
	}
	
	$coach_hours = $coach_minutes / 60;
	$coach_total = $coach_minutes * $coach_minutely; 

	return array($coach_cost, $coach_hours);
}

?>
