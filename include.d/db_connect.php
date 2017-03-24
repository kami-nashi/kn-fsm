<?php

if (!$link = mysql_connect('10.68.100.36', 'kn_fsm', 'WEAK1fail')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('kn_fsm', $link)) {
    echo 'Could not select database';
    exit;
}

?>
