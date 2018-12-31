<?php

################################################################################
# import the db stuff, get the sql string, return the data
################################################################################
function db_stuff($sql){
  require 'db_connect.php';
  $result = mysql_query($sql, $link);
  if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
  }

  return $result;
  }

################################################################################
# almost every time we get ice time, we need to convert the minutes to hours
################################################################################
function basicmath($icem){
	$hours = $icem / 60;
	return $hours;
  }

################################################################################
# total time spent on ice in current month
################################################################################
function diff_icetime_current(){
  $month_current = 0;
  $sql = 'SELECT ice_time FROM ice_time WHERE MONTH(CURDATE()) = MONTH(date) AND YEAR(CURDATE()) = YEAR(date)';
  $result = db_stuff($sql);

  while ($row = mysql_fetch_assoc($result)) {
    $month_current += $row['ice_time'];
  }
  $ice_hours = basicmath($month_current);
  return array($ice_hours);
  }

################################################################################
# total time spent on ice in previous month
################################################################################
function diff_icetime_last(){
	$month_current = 0;
	$sql = 'SELECT ice_time FROM ice_time WHERE MONTH(CURDATE()) - 1= MONTH(date) AND YEAR(CURDATE()) = YEAR(date)';
	$result = db_stuff($sql);

				while ($row = mysql_fetch_assoc($result)) {
			    		$month_current += $row['ice_time'];
				 }
				$ice_hours = basicmath($month_current);
				return array($ice_hours);
}

##
# just give us an array of the values from the functions telling
# us about the time spent on ice this month and last
##
function diff_icetime(){
	$current = diff_icetime_current();
	$previous = diff_icetime_last();

	return array($current[0], $previous[0]);
}

###
# this function is our money maker
# get all the things from the ice_time table
# also add up the cost and the time as minutes
# then convert the minutes to hours
###
function add_ICETIME() {
	$ice = 0;
	$ice_cost = 0;
	$sql = 'select * from ice_time';
	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
    		$ice += $row['ice_time'];
    		$ice_cost += $row['ice_cost'];
	 }

	$ice_time = basicmath($ice);
	return array($ice_cost, $ice_time);
}


function add_COACHTIME2() {
  $coach_time = 0;
  $coach_rate = 0;
	$coach_conversion = 0;
	$coach_cost = 0;
	$coach_minutes = 0;
	$sql = 'SELECT ice_time.*, coaches.* FROM ice_time, coaches WHERE ice_time.coach_id = coaches.id';
	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
    		$coach_minutes += $row['coach_time'];
    		$coach_time = $row['coach_time'];
    		$coach_rate = $row['coach_rate'];
		    $coach_conversion = $coach_rate / 30;
		    $coach_cost += $coach_time * $coach_conversion;
	}

	$coach_hours = basicmath($coach_minutes);
	$coach_total = $coach_minutes * $coach_conversion;

	return array($coach_cost, $coach_hours, $coach_minutes, $coach_rate, $coach_time, $coach_conversion);
  }

###############################################################
#  Maintenance Stuff
###############################################################
function maintenance(){
	$m_hours = 0;
	$m_cost = 0;
	$sql = 'select * from maintenance';
	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
    		$m_hours += $row['m_hours_on'];
    		$m_cost += $row['m_cost'];
	 }

	$ice_time_total = add_ICETIME();
	$m_on = $ice_time_total[1] - $m_hours;
	$m_remaining = 21 - $m_on;
	return array($m_hours, $m_cost, $m_on, $m_remaining);
}

###
# build maintenance data and print the rows
###
function maintenance_table(){
	$sql = 'select * from maintenance, locations where maintenance.m_location = locations.id order by m_date desc';
	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
	  if (isset($_GET['ice_time']))
	  {	  $total_ice += $_GET['ice_time'];	}
	  if (isset($_GET['ice_cost']))
	  {	  $ice_cost += $_GET['ice_cost'];	  }
    echo "<tr><td>" . $row['m_date'] . "</td><td>" . $row['m_hours_on'] . "</td><td>$" . $row['m_cost'] . "</td><td>" . $row['location_id'] . "</td><td>" . $row['location_city'] . "</td><td>" . $row['location_state'] . "</td></tr>";
	  }
}

###
# total the cost of time on ice, with coach, maintenance, dump it into an array
###
function add_TOTALS(){
	$ice = add_ICETIME();
	$coach = add_COACHTIME2();
	$maintenance = maintenance();
	$cost = $ice[0] + $coach[0] + $maintenance[1];
	return $cost;
}

###
# add up data for competitions
###
function add_EVENTS_C(){
	$c_cost = 0;
  $sql = 'SELECT * FROM events_c';
  $result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
		$c_cost += $row['e_cost'];
	 }

	return array($c_cost);
}

###
# add up performances data
###
function add_EVENTS_P(){
	$p_cost = 0;
	$sql = 'SELECT * FROM events_p';
	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)){
		$p_cost += $row['e_cost'];
	}

	return array($p_cost);
}

###
# add up data for equipment
###
function add_EQUIP(){
	$e_cost = 0;
	$sql = 'SELECT * FROM equip_manifest';
	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
		$e_cost += $row['cost_actual'];
	 }

	return array($e_cost);
}
###
# add up data for cost of clubs
###
function add_CLUB(){
	$club_cost = 0;
	$sql = 'SELECT * FROM club_membership';
	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
		$club_cost += $row['club_cost'];
	 }

	return array($club_cost);
}

###
# add up data for cost of skating schools
###
function add_SKATESCHOOL(){
	$class_cost = 0;
	$sql = 'SELECT * FROM class_skate_school';
 	$result = db_stuff($sql);

	while ($row = mysql_fetch_assoc($result)) {
		$class_cost += $row['class_cost'];
	 }

	return array($class_cost);
}

###
# total all the things
###
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
##						Calculate Punch Cards					                                                                  ##
################################################################################################################
function skate_total() {
	$skate_total = 0;
	$punch_total = 0;
	$punches_total = 0;
	$sql = 'SELECT * FROM ice_time WHERE skate_type = 8';
 	$result = db_stuff($sql);

        while ($row = mysql_fetch_assoc($result)) {
        $skate_total += $row['ice_time'];
        $punch_down = $row['ice_time'] / 30;
        $punches_total += $punch_down;
       }
       return array($skate_total, $punches_total);
}



function punch_card(){
	$punch_total = 0;
	$sql = 'SELECT * FROM ice_punch';
 	$result = db_stuff($sql);

        while ($row = mysql_fetch_assoc($result)) {
        $punch_total += $row['punch_time'];
        }
        return array($punch_total);
}

################################################################################################################
##                                              Journal/Video Handling                                        ##
################################################################################################################
function journal_videos() {
					if (isset($_GET['date']))
				{ $jv_date = $_GET['date'];	} if (empty($jv_date)){
		      $sql = 'SELECT ice_time.*, j_videos.* FROM ice_time, j_videos WHERE ice_time.has_video = 1 AND ice_time.date = j_videos.date order by ice_time.date desc';
	      } else {
	        $sql = "SELECT * FROM j_videos WHERE date = '" . $jv_date . "'";
      	}
        $result = db_stuff($sql);

        echo "<table class='table table-striped'> <thead>";
        echo "<tr><td> Date </td><td> Description </td><td> Video URL </td><td> Sharing Platform </tr></td>";
	      echo "</thead><tbody>";
        while ($row = mysql_fetch_assoc($result)) {
          echo "<tr><td>" . $row['date'] . "</td><td>" . $row['name']  . "</td><td><a target='_blank' href='" . $row['url'] . "'>" . $row['url'] . "</a></td><td>" . $row['sharing_platform']  . "</tr></td>";
          }
        echo "</tbody></table>";
}

###
# build the table for sessions
###
function table_sessions(){
  $sql = 'select * from ice_time, coaches, locations, ice_type where ice_time.coach_id = ice_time.coach_id and coaches.id = ice_time.coach_id and locations.id = ice_time.rink_id and ice_type.id = ice_time.skate_type and ice_time.date order by date desc';
  $result = db_stuff($sql);

  while ($row = mysql_fetch_assoc($result)) {
      $total_ice = 0;
      $ice_cost = 0;

      $total_ice += $row['ice_time'];
      $ice_cost += $row['ice_cost'];
      $jv = '--';
      $jv_url = urlencode($row['date']) . "\n";

      if ($row['has_video'] == 1)
  	  $jv = '<a href="journal.php?date=' . $jv_url . '" ><img src="images/filmreel.png" style="width:32px;height:32px;"></a>';

      echo "<tr><td>" . $row['date'] . "</td><td>" . $row['ice_time'] . "</td><td>" . $row['ice_cost'] . "</td><td>" .$row['type'] . "</td><td>" . $row['coach_time'] . "</td><td>" . $row['coach_fname'] . " " . $row['coach_lname'] . "</td><td>" . $row['coach_rate'] . "</td><td>" . $jv . "</td><td>" . $row['location_id'] . "</td><td>" . $row['location_city'] ."</td><td>" .  $row['location_state'] . "</td></tr>";

      $sum_coach_time = 0;
      $final_coach_rate = 0;

      $sum_coach_time += $row['coach_time'];
      $converted_coach_rate = $row['coach_rate'] / 30;
      $final_coach_rate += $row['coach_time'] * $converted_coach_rate;
      }
   }

function punches_tables(){
sql = 'SELECT * FROM ice_punch, locations WHERE ice_punch.punch_location = locations.id AND ice_punch.id IN (SELECT MAX(id) FROM ice_punch GROUP BY punch_location)'
$result = db_stuff($sql);

      while ($row = mysql_fetch_assoc($result)) {
        print_r($row);
        echo $row['location_id']." ".$row['location_city']." ".$row['location_state']." ";
 }
}
?>
