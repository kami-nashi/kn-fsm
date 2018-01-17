<?php

function db_stuff(){
	require 'db_connect.php';
	$sql = $sql_query;
	$result = mysql_query($sql, $link);
		if (!$result) {
				echo "DB Error, could not query the database\n";
				echo 'MySQL Error: ' . mysql_error();
				exit;
			}
}

################################################################################
#
# total monthly time spent on ice
#
################################################################################

function diff_icetime_current(){
	$month_current = 0;

	require 'db_connect.php';
	$sql = 'SELECT ice_time FROM ice_time WHERE MONTH(CURDATE()) = MONTH(date) AND YEAR(CURDATE()) = YEAR(date)';
	$result = mysql_query($sql, $link);

		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
			}
				while ($row = mysql_fetch_assoc($result)) {
			    		$month_current += $row['ice_time'];
				 }

				# basic math
				$ice_hours = $month_current / 60;
				return array($ice_hours);
}

function diff_icetime_last(){
	$month_current = 0;
	require 'db_connect.php';

	$sql = 'SELECT ice_time FROM ice_time WHERE MONTH(CURDATE()) - 1= MONTH(date) AND YEAR(CURDATE()) = YEAR(date)';
	$result = mysql_query($sql, $link);

		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
			}

				while ($row = mysql_fetch_assoc($result)) {
			    		$month_current += $row['ice_time'];
				 }

				# basic math
				$ice_hours = $month_current / 60;
				return array($ice_hours);
}

function diff_icetime(){
	$current = diff_icetime_current();
	$previous = diff_icetime_last();

	return array($current[0], $previous[0]);
}

function add_ICETIME() {
	$ice = 0;
	$ice_cost = 0;

	require 'db_connect.php';
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

	return array($ice_cost, $ice_time);
}

function add_COACHTIME2() {
  $coach_time = 0;
  $coach_rate = 0;
	$coach_conversion = 0;
	$coach_cost = 0;
	$coach_minutes = 0;
	require 'db_connect.php';

	$get_sql = 'SELECT ice_time.*, coaches.* FROM ice_time, coaches WHERE ice_time.coach_id = coaches.id';
	$coach_result = mysql_query($get_sql, $link);
		if (!$coach_result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

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
		$m_hours = 0;
		$m_cost = 0;
	  require 'db_connect.php';

	$sql = 'select * from maintenance';
	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

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

function add_EVENTS_C(){
	$c_cost = 0;
	require 'db_connect.php';

	$get_sql = 'SELECT * FROM events_c';
	$result = mysql_query($get_sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	while ($row = mysql_fetch_assoc($result)) {
		$c_cost += $row['e_cost'];
	 }

	return array($c_cost);
}

function add_EVENTS_P(){
		$p_cost = 0;
		require 'db_connect.php';

	$get_sql = 'SELECT * FROM events_p';
	$result = mysql_query($get_sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	while ($row = mysql_fetch_assoc($result)){
		$p_cost += $row['e_cost'];
	}

	return array($p_cost);
}

function add_EQUIP(){
		$e_cost = 0;
		require 'db_connect.php';

	$get_sql = 'SELECT * FROM equip_manifest';
	$result = mysql_query($get_sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	while ($row = mysql_fetch_assoc($result)) {
		$e_cost += $row['cost_actual'];
	 }

	return array($e_cost);
}

function add_CLUB(){
	$club_cost = 0;
	require 'db_connect.php';

	$get_sql = 'SELECT * FROM club_membership';
	$result = mysql_query($get_sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	while ($row = mysql_fetch_assoc($result)) {
		$club_cost += $row['club_cost'];
	 }

	return array($club_cost);
}

function add_SKATESCHOOL(){
	$class_cost = 0;
	require 'db_connect.php';

	$get_sql = 'SELECT * FROM class_skate_school';
	$result = mysql_query($get_sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 }

	while ($row = mysql_fetch_assoc($result)) {
		$class_cost += $row['class_cost'];
	 }

	return array($class_cost);
}

function add_costs_total(){

	$time_coach = add_COACHTIME2();
	$cost_maint = maintenance();
	$events_c = add_EVENTS_C();
	$events_p = add_EVENTS_P();
	$cost_equip = add_EQUIP();
	$cost_club = add_CLUB();
	$cost_class = add_SKATESCHOOL();

	return array($cost_equip[0], $cost_maint[1], $cost_class[0], $events_p[0], $cost_club[0], $events_c[0]);

}

################################################################################################################
##						Calculate Punch Cards					      ##
################################################################################################################

function skate_total() {
	$skate_total = 0;
	$punch_total = 0;
	$punches_total = 0;
	require 'db_connect.php';

        $sql = 'SELECT * FROM ice_time WHERE skate_type = 8';
        $result = mysql_query($sql, $link);
                if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
        }
        while ($row = mysql_fetch_assoc($result)) {
        $skate_total += $row['ice_time'];
        $punch_down = $row['ice_time'] / 30;
        $punches_total += $punch_down;
       }
       return array($skate_total, $punches_total);
}

function punch_card(){
	$punch_total = 0;
	require 'db_connect.php';

        $sql = 'SELECT * FROM ice_punch';
        $result = mysql_query($sql, $link);
                if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
         }

        while ($row = mysql_fetch_assoc($result)) {
        $punch_total += $row['punch_time'];
        }
        return array($punch_total);

}


################################################################################################################
##                                              Journal/Video Handling                                        ##
################################################################################################################

function journal_videos() {
        require 'db_connect.php';

				if (isset($_GET['date']))
				{
				$jv_date = $_GET['date'];
				}

        if (empty($jv_date)){
		$get_sql = 'SELECT ice_time.*, j_videos.* FROM ice_time, j_videos WHERE ice_time.has_video = 1 AND ice_time.date = j_videos.date order by ice_time.date desc';
	} else {
	        $get_sql = "SELECT * FROM j_videos WHERE date = '" . $jv_date . "'";

	}
        $video_result = mysql_query($get_sql, $link);
                if (!$video_result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
         }

        echo "<table class='table table-striped'> <thead>";
        echo "<tr><td> Date </td><td> Description </td><td> Video URL </td><td> Sharing Platform </tr></td>";
	echo "</thead><tbody>";
        while ($row = mysql_fetch_assoc($video_result)) {

        echo "<tr><td>" . $row['date'] . "</td><td>" . $row['name']  . "</td><td><a target='_blank' href='" . $row['url'] . "'>" . $row['url'] . "</a></td><td>" . $row['sharing_platform']  . "</tr></td>";
        }
        echo "</tbody></table>";
}


?>
