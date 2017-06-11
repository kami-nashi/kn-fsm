<?php

require_once '../include.d/db_connect.php';
require_once '../include.d/functions.php';
require_once '../include.d/data_static.php';

#print "E \t" . $total_equipment . "\r\n" . $total_maintenance;
#print "\r\n";
#print "M \t" . $total_maintenance;
#print $total_class_fees;
#print $total_perf_fees;
#print $total_membership;
#print $total_comp_fees;
#
#print $ice_cost;
#print $final_coach_rate;

$array = array(
  array(1, 'Apple', 'Green'),
  array(2, 'Banana', 'Yellow'),
  array(3, 'Orange', 'Orange'),
);

$data = array(something, 100);
$out = fopen('php://output', 'w');
fputcsv($out, $data);

fclose($out);

?>
