<?php

require 'db_connect.php';

$user = array($_POST['date'], $_POST['ice_time'], $_POST['ice_cost'], $_POST['skate_type'], $_POST['coach_time'], $_POST['coach_name'], $_POST['rink_id']);
$sql = "insert into ice_time(date,ice_time,ice_cost,skate_type,coach_time,coach_id,rink_id)values('$user[0]','$user[1]','$user[2]','$user[3]','$user[4]','$user[5]','$user[6]')";

	$result = mysql_query($sql, $link);
		if (!$result) {
    		echo "DB Error, could not query the database\n";
    		echo 'MySQL Error: ' . mysql_error();
    		exit;
	 } else {
		echo "<script>alert('Time inserted!');
		window.location='index.php';
		</script>";
	 }

?>
