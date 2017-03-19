<?php

if (!$link = mysql_connect('localhost', '$user', '$pass')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('kn_fsm', $link)) {
    echo 'Could not select database';
    exit;
}

?>
