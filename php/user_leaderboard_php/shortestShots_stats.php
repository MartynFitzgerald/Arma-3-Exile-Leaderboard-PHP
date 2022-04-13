<?php
$sql_longest = "SELECT account.name 'killer', A2.name 'victim', player_stats.weaponused, player_stats.distance FROM player_stats INNER JOIN account ON player_stats.killer = account.uid INNER JOIN account A2 ON player_stats.victim = A2.uid WHERE (weaponused!='Explosive' AND player_stats.weaponused!='RoadKill' AND player_stats.killer='$uid') GROUP BY player_stats.distance ORDER BY player_stats.distance ASC LIMIT 10";

	$sql_result_longest = $conn->query($sql_longest);

if ($sql_result_longest->num_rows > 0) {
	// output data of each row
	while($row = $sql_result_longest->fetch_assoc()) {
	?>
	<tr>
		<td><?php echo $row["killer"]; ?> </td>
		<td><?php echo $row["victim"]; ?> </td>
		<td><?php echo $row["weaponused"]; ?> </td>
		<td><?php echo $row["distance"]; ?> </td>
	</tr>
	<?php	 
 	}
}
?>
