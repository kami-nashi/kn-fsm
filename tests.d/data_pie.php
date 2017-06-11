<?php

$data = array("Date", 14);

#print $data[0] . ", \t" . $data[1];

echo json_encode($data);

$data2 = array("Maint" => 200, "Ice" => 300, "Coaching" => 10);
 
echo json_encode($data2);

?>
