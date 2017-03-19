<?php
require_once '../include.d/db_connect.php';

$user_date = $_POST['date'];
$user_icetime = $_POST['ice_time'];
$user_icecost = $_POST['ice_cost'];
$user_skate_type = $_POST['skate_type'];
$user_coach_name = $_POST['coach_name'];
$user_coach_time = $_POST['coach_time'];
$use_rink $_POST['rink_id'];

$query = mysql_query("insert into mainresource(resname,price,venname)values('$resname','$ppi','$venname'");
$result = mysql_query($sql_coach, $link);


if($query)
{
echo"<script>alert('Resource inserted! If you want to add more resource     please click on add more resource button');
window.location='http://localhost/project/Miniproject_Final/public_html/php/resadd.php';
</script>";
}
else
{
echo"<script>alert('Resource insertion failed! Please contact the web admin for more details.');
window.location='http://localhost/project/Miniproject_Final/public_html/php/resadd.php';
</script>";
}
?>