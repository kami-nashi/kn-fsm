<?php

require 'db_connect.php';

$user = array($_POST['m_date'], $_POST['m_hours_on'], $_POST['m_cost'], $_POST['rink_id']);
$sql = "insert into ice_time(m_date,m_hours_on,m_cost,rink_id)values('$user[0]','$user[1]','$user[2]','$user[3]')";

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
