<table>
		<tr>
			<th colspan="4">LONGEST SHOOTS</th>
			</tr>
			<tr>
				<td>KILLER</td>
				<td>VICTIM</td>
				<td>WEAPON</td>
				<td>DISTANCE </td>
			</tr>
<?php
$sql_longest = "SELECT a.name 'killer', aa.name 'victim', ps.weaponused 'weaponused', ps.distance 'distance' from player_stats ps inner join account a on a.uid = ps.killer inner join account aa on aa.uid = ps.victim
								WHERE (weaponused!='Explosive' AND weaponused!='RoadKill') order by distance desc limit 10;";

$sql_result_longest = $conn->query($sql_longest);

while($row = $sql_result_longest->fetch_assoc())  {
	$killer = $row["killer"];
	$victim = $row["victim"];
	$weaponused = $row["weaponused"];
	$distance = $row["distance"];

	?><tr><td><?php echo $killer; ?> </td>
	<td><?php echo $victim; ?> </td>
	<td><?php echo $weaponused; ?> </td>
	<td><?php echo $distance; ?> </td></tr><?php
}

	$queryNumbers += 1;
?>

</table>
