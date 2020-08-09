<?php include 'login.php';

$sql_account = "SELECT uid, name, kills, deaths, last_connect_at FROM account  WHERE kills > 0 ORDER BY name ASC;";
$sql_result_account = $conn->query($sql_account);

$resultname = "";
$resultkills = 0;
$resultdeaths = 0;
$resultkd = 0.00;
$date = '';

$uid = 0;
$killer = 0;

$queryNumbers = 0;
?>
