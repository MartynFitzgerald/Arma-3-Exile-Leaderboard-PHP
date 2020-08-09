<table>
	<tr>
		<th colspan="2">FREQUENTLY USED WEAPONS</th>
	</tr>
	<tr>
		<td>WEAPONS</td>
		<td>TOTAL KILLS </td>
	</tr>

<?php
$amountOfData = 0;

while ($amountOfData < 10) {
	$sql_weapon1 = "SELECT weaponused FROM player_stats GROUP BY weaponused ORDER BY count(*) DESC LIMIT 1 OFFSET $amountOfData;";
	$sql_result_weapon1 = $conn->query($sql_weapon1);
	$resultweapon = "";
	$amountOfData += 1;

	if ($sql_result_weapon1->num_rows > 0) {
		// output data of each row
		if($row = $sql_result_weapon1->fetch_assoc()) {
			$resultweapon = $row["weaponused"];
			$amount = "SELECT COUNT(weaponused) FROM player_stats WHERE weaponused='$resultweapon';";
			$sql_result_amount = $conn->query($amount);
			$number = 0;

			if ($sql_result_amount->num_rows > 0) {
				if($row = $sql_result_amount->fetch_assoc()) {
					$number = $row['COUNT(weaponused)'];
				}
			}
		}
	}?>
	<tr>
		<td><?php echo $resultweapon; ?> </td>
		<td><?php echo $number; ?> </td>
	</tr><?php

	$queryNumbers += 2;
}
?>

</table>
