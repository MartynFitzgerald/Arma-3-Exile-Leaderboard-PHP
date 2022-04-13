<?php
$sql_player = "SELECT SUM(player.money) 'total_users_money', SUM(account.locker) 'total_locker_money', (SELECT SUM(money) FROM container) 'total_container_money' FROM player
RIGHT JOIN account ON player.account_uid = account.uid";

$sql_result_player = $conn->query($sql_player);

$totalUserMoney = 0;
$totalLockerMoney = 0;
$totalContainerMoney = 0;

if ($sql_result_player->num_rows > 0) {
    if($row = $sql_result_player->fetch_assoc()) {
		$UserMoney_float = $row["total_users_money"];
    $LockerMoney_float = $row["total_locker_money"];
    $ContainerMoney_float = $row["total_container_money"];
	}
}

$totalUserMoney = number_format($UserMoney_float, 0);
$totalLockerMoney = number_format($LockerMoney_float, 0);
$totalContainerMoney = number_format($ContainerMoney_float, 0);
?>


<table>
  <tr>
    <th colspan="2">MONEY STATS</th>
    </tr>
  <tr>
    <td>TOTAL ON PLAYERS</td>
    <td><?php echo $totalUserMoney; ?> </td>
  </tr>
  <tr>
    <td>TOTAL IN LOCKERS</td>
    <td><?php echo $totalLockerMoney; ?> </td>
  </tr>
  <tr>
    <td>TOTAL IN CONTAINERS</td>
    <td><?php echo $totalContainerMoney; ?> </td>
  </tr>
</table>
