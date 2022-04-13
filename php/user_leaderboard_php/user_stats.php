<?php
$sql_user_stats = "SELECT name, clan_id, kills 'total_kills', deaths 'total_deaths', locker 'locker_money', first_connect_at 'first_connected', exp_level 'exp_level', last_connect_at 'last_connected', total_connections 'total_connections', IFNULL((kills / deaths), kills) 'kd' FROM account where uid='$uid';";

$sql_user_distance = "SELECT AVG(distance) 'average_kill_distance' FROM player_stats  where killer='$uid';";
$sql_vehicle = "SELECT COUNT(id) 'amount_of_vehicle' FROM vehicle where account_uid='$uid';";
$sql_marxet = "SELECT COUNT(listingID) 'amount_of_marxet' FROM marxet where sellerUID='$uid';";

$sql_user_stats_results = $conn->query($sql_user_stats);
$sql_user_distance_results = $conn->query($sql_user_distance);
$sql_result_vehicle = $conn->query($sql_vehicle);
$sql_result_marxet = $conn->query($sql_marxet);

$clan_id = 0;
$clan_name = "None";
$totalKills = 0;
$totalDeaths = 0;
$totalKD_float = 0.00;
$name = "Null";
$first_connected = "Null";
$last_connected = "Null";
$exp_level = 0;
$total_connections = 0;
$avgDistance = 0;
$amount_of_vehicle = 0;
$amount_of_marxet = 0;

if ($sql_user_stats_results->num_rows > 0) {
    if($row = $sql_user_stats_results->fetch_assoc()) {
		$name = $row["name"];
		$clan_id = $row["clan_id"];
		$totalKills = $row["total_kills"];
		$totalDeaths = $row["total_deaths"];
		$totalKD_float = $row["kd"];
		$first_connected = $row["first_connected"];
		$last_connected = $row["last_connected"];
		$total_connections = $row["total_connections"];
		$exp_level = $row["exp_level"];
	}
}
if ($sql_user_distance_results->num_rows > 0) {
    if($row = $sql_user_distance_results->fetch_assoc()) {
		$avgDistance = $row["average_kill_distance"];
	}
}
if ($sql_result_vehicle->num_rows > 0) {
    if($row = $sql_result_vehicle->fetch_assoc()) {
		$amount_of_vehicle = $row["amount_of_vehicle"];
	}
}
if ($sql_result_marxet->num_rows > 0) {
    if($row = $sql_result_marxet->fetch_assoc()) {
		$amount_of_marxet = $row["amount_of_marxet"];
	}
}


$sql_clan = "SELECT name 'clan_name' FROM clan where id='$clan_id';";
$sql_result_clan = $conn->query($sql_clan);
if ($sql_result_clan->num_rows > 0) {
    if($row = $sql_result_clan->fetch_assoc()) {
		$clan_name = $row["clan_name"];
	}
}


$totalKD = number_format($totalKD_float, 2);
$averageKillDistance = number_format($avgDistance, 0);
?>