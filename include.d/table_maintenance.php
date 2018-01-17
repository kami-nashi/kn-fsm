<?php

echo '<table class="table table-striped"> <thead>
<tr><td>Date</td><td>Hours On</td><td>Maintenance Cost</td><td> Shop Name </td><td>City</td><td>State</td></tr>

</thead>
<tbody>';

$m_sql = 'select * from maintenance, locations where maintenance.m_location = locations.id order by m_date desc';

$result = mysql_query($m_sql, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}



while ($row = mysql_fetch_assoc($result)) {

  if (isset($_GET['ice_time']))
  {
  $total_ice += $_GET['ice_time'];
  }

  if (isset($_GET['ice_cost']))
  {
  $ice_cost += $_GET['ice_cost'];
  }

    echo "<tr><td>" . $row['m_date'] . "</td><td>" . $row['m_hours_on'] . "</td><td>$" . $row['m_cost'] . "</td><td>" . $row['location_id'] . "</td><td>" . $row['location_city'] . "</td><td>" . $row['location_state'] . "</td></tr>";
}

echo '</tbody></table>';

?>
