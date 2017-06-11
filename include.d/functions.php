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
		$coach_cost += $coach_time * $coach_conversion;
	}
	
	$coach_hours = $coach_minutes / 60;
	$coach_total = $coach_minutes * $coach_conversion; 

	return array($coach_cost, $coach_hours, $coach_minutes, $coach_rate, $coach_time, $coach_conversion);
}

function maintenance(){
	require 'db_connect.php';
	$sql = 'select * from maintenance';
	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	$m_hours = 0;
	while ($row = mysql_fetch_assoc($result)) {
    		$m_hours += $row['m_hours_on'];
    		$m_cost += $row['m_cost']; 
	 }

	$ice_time_total = add_ICETIME();
	$m_on = $ice_time_total[1] - $m_hours;
	$m_remaining = 21 - $m_on;
	return array($m_hours, $m_cost, $m_on, $m_remaining);
}


function add_TOTALS(){
	$ice = add_ICETIME();
	$coach = add_COACHTIME2();
	$maintenance = maintenance();

	$cost = $ice[0] + $coach[0] + $maintenance[1];

	return $cost;

}

?>