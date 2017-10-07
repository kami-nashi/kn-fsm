<?php

function journal_videos() {

        require '../include.d/db_connect.php';
        $get_sql = 'SELECT ice_time.*, j_videos.* FROM ice_time, j_videos WHERE ice_time.has_video = 1 AND ice_time.date = j_videos.date';
        $coach_result = mysql_query($get_sql, $link);
                if (!$coach_result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
         }

	echo "<table>";
	echo "<tr><td> Date </td><td> Sharing Platform </td><td> URL <tr><td>";

        while ($row = mysql_fetch_assoc($coach_result)) {
                $jv_date += $row['date'];
                $jv_url = $row['url'];

    		echo "<tr><td>" . $row['date'] . "</td><td>" . $row['sharing_platform']  . "</td><td>" . "<a href='" . $row['url'] . "'>" . $row['url'] . "</a>"  . "<tr><td>";
    		echo "\n";
        }
	echo "</table>";
        return array($jv_date, $jv_url);
}

journal_videos();

?>
