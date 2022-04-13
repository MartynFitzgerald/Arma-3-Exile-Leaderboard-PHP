

<?php
$amountOfData = 0;
$resultweapon = 'None';
$number = 0;

while ($amountOfData < 10) {
	$sql_weapon1 = "SELECT weaponused, count(*) 'Count' FROM player_stats WHERE killer='$uid' GROUP BY weaponused ORDER BY count(*) DESC LIMIT 1 OFFSET $amountOfData;";
	$sql_result_weapon1 = $conn->query($sql_weapon1);
	$resultweapon = "";
	$amountOfData += 1;

	if ($sql_result_weapon1->num_rows > 0) {
		// output data of each row
		if($row = $sql_result_weapon1->fetch_assoc()) {
			$resultweapon = $row["weaponused"];
			$number = $row['Count'];
				 
	 	}
	}
	?>
	<tr>
			<td><?php echo $resultweapon; ?> </td>
			<td><?php echo $number; ?> </td>
	</tr>
	<?php

	$number = '';
}
?>

