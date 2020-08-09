<?php
$uid = $_COOKIE["_uid"];
$sql_uid = "SELECT uid, name FROM account;";
$sql_longest = "SELECT killer, victim, weaponused, distance FROM player_stats WHERE (weaponused!='Explosive' AND weaponused!='RoadKill' AND killer='$uid') GROUP BY distance ORDER BY distance DESC LIMIT 10;";

$sql_result_uid = $conn->query($sql_uid);
$sql_result_longest = $conn->query($sql_longest);

while($row = $sql_result_longest->fetch_assoc())  {
	$killer = $row["killer"];
	$victim = $row["victim"];
	$weaponused = $row["weaponused"];
	$distance = $row["distance"];

	$sql_killer = "SELECT name FROM account WHERE uid='$killer';";
	$sql_victim = "SELECT name FROM account WHERE uid='$victim';";

	$sql_result_uid = $conn->query($sql_killer);
	$sql_result_victim = $conn->query($sql_victim);

	if($row = $sql_result_uid->fetch_assoc()) {
		$resultkiller = $row["name"];
	}
	if($row = $sql_result_victim->fetch_assoc()) {
		$resultname = $row["name"];
	}
	?><tr><td><?php echo $resultkiller; ?> </td>
	<td><?php echo $resultname; ?> </td>
	<td><?php echo $weaponused; ?> </td>
	<td><?php echo $distance; ?> </td></tr><?php

	$queryNumbers += 2;
}
?>
