
<?php

if (!$link = mysql_connect('localhost', '$USER', '$SECRETS')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('kn_fsm', $link)) {
    echo 'Could not select database';
    exit;
}

$sql    = 'select * from ice_time, coaches, locations, ice_type where ice_time.coach_id = ice_time.coach_id and coaches.id = ice_time.coach_id and locations.id = ice_time.rink_id and ice_type.id = ice_time.skate_type';
$result = mysql_query($sql, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

echo $result;

#while ($row = mysql_fetch_assoc($result)) {
#    echo $row['foo'];
#    echo $sql;
}

mysql_free_result($result);

?>

