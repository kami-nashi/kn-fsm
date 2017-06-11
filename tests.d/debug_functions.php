<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once '../include.d/functions.php';

#add_ICETIME();
#add_COACHTIME();
#add_TOTALS();
$debug = add_COACHTIME();

echo 'Coach Cost-' . $debug[0] . '-Coach Cost<br>';
echo 'Coach Hours-' . $debug[1] . '-Coach Hours<br>';
echo 'Coach Minutes-' . $debug[2] . '-Coach Minutes<br>';
echo 'Coach Rate-' . $debug[3] . '-Coach Rate<br>';
echo 'Coach Time-' . $debug[4] . '-Coach Time<br>';
echo 'Coach Conversion-' . $debug[5] . '-Coach Conversion<br>';

?>
