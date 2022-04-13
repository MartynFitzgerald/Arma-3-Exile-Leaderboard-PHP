<table>
	<tr>
		<th colspan="2">FREQUENTLY USED WEAPONS</th>
	</tr>
	<tr>
		<td>WEAPONS</td>
		<td>TOTAL KILLS </td>
	</tr>

<?php
$sql_weapon1 = "SELECT weaponused, count(*) 'Count' FROM player_stats GROUP BY weaponused ORDER BY count(*) DESC LIMIT 10";
$sql_result_weapon1 = $conn->query($sql_weapon1);
$resultweapon = "";

if ($sql_result_weapon1->num_rows > 0) {
	// output data of each row
	while($row = $sql_result_weapon1->fetch_assoc()) {
		?>
		<tr>
			<td><?php echo $row["weaponused"]; ?> </td>
			<td><?php echo $row['Count']; ?> </td>
		</tr>
		<?php	 
 	}
}
?>
</table>
