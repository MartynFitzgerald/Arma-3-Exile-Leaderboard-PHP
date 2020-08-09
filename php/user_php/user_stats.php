<?php
$uid = $_COOKIE["_uid"];

//$uid == "<script type='text/javascript'>document.write(localStorage.getItem('playerID'));</script>";

$sql_user_stats = "SELECT clan_id 'clan_id', kills 'total_kills', deaths 'total_deaths', locker 'locker_money', first_connect_at 'first_connected', last_connect_at 'last_connected' FROM account where uid='$uid';";
$sql_user_distance = "SELECT AVG(distance) 'average_kill_distance' FROM player_stats  where killer='$uid';";
$sql_player = "SELECT money 'money' FROM player where account_uid='$uid';";
$sql_container = "SELECT money 'container_money' FROM container where account_uid='$uid';";
$sql_territory = "SELECT name 'territory_name' FROM territory where owner_uid='$uid';";

$sql_user_stats_results = $conn->query($sql_user_stats);
$sql_user_distance_results = $conn->query($sql_user_distance);
$sql_result_player = $conn->query($sql_player);
$sql_result_container = $conn->query($sql_container);
$sql_result_territory = $conn->query($sql_territory);

$clan_id = 0;
$totalKills = 0;
$totalDeaths = 0;
$totalKD = 0;
$locker_money = 0;
$first_connected = "Null";
$last_connected = "Null";
$avgDistance = 0;
$money = 0;
$container_money = 0;
$territory = "None";

if ($sql_user_stats_results->num_rows > 0) {
    if($row = $sql_user_stats_results->fetch_assoc()) {
		$clan_id = $row["clan_id"];
		$totalKills = $row["total_kills"];
		$totalDeaths = $row["total_deaths"];
		$totalKD_float = ($totalKills / $totalDeaths);
		$locker_money = $row["locker_money"];
		$first_connected = $row["first_connected"];
		$last_connected = $row["last_connected"];
	}
}
if ($sql_user_distance_results->num_rows > 0) {
    if($row = $sql_user_distance_results->fetch_assoc()) {
		$avgDistance = $row["average_kill_distance"];
	}
}
if ($sql_result_player->num_rows > 0) {
    if($row = $sql_result_player->fetch_assoc()) {
		$money = $row["money"];
	}
}
if ($sql_result_container->num_rows > 0) {
    if($row = $sql_result_container->fetch_assoc()) {
		$container_money = $row["container_money"];
	}
}
if ($sql_result_territory->num_rows > 0) {
    if($row = $sql_result_territory->fetch_assoc()) {
		$territory = $row["territory_name"];
	}
}

$queryNumbers += 4;

$totalKD = number_format($totalKD_float, 1);
$averageKillDistance = number_format($avgDistance, 0);
?>
