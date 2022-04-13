<table>
		<tr>
			<th colspan="4">LONGEST SHOTS</th>
			</tr>
			<tr>
				<td>KILLER</td>
				<td>VICTIM</td>
				<td>WEAPON</td>
				<td>DISTANCE </td>
			</tr>
<?php
$sql_longest = "SELECT a.name 'killer', aa.name 'victim', ps.weaponused 'weaponused', ps.distance 'distance' from player_stats ps inner join account a on a.uid = ps.killer inner join account aa on aa.uid = ps.victim WHERE (weaponused!='Explosive' AND weaponused!='RoadKill') order by distance desc limit 10;";
$sql_result_longest = $conn->query($sql_longest);

if ($sql_result_longest->num_rows > 0) {
	// output data of each row
	while($row = $sql_result_longest->fetch_assoc())  {
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

</table>
