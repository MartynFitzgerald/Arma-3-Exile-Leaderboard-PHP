<?php

$sql_player = "SELECT SUM(money) 'total_users_money' FROM player;";
$sql_account = "SELECT SUM(locker) 'total_locker_money' FROM account;";
$sql_container = "SELECT SUM(money) 'total_container_money' FROM container;";

$sql_result_player = $conn->query($sql_player);
$sql_result_account = $conn->query($sql_account);
$sql_result_container = $conn->query($sql_container);

$totalUserMoney = 0;
$totalLockerMoney = 0;
$totalContainerMoney = 0;

if ($sql_result_player->num_rows > 0) {
    if($row = $sql_result_player->fetch_assoc()) {
		$UserMoney_float = $row["total_users_money"];
	}
}
if ($sql_result_account->num_rows > 0) {
    if($row = $sql_result_account->fetch_assoc()) {
		$LockerMoney_float = $row["total_locker_money"];
	}
}
if ($sql_result_container->num_rows > 0) {
    if($row = $sql_result_container->fetch_assoc()) {
		$ContainerMoney_float = $row["total_container_money"];
	}
}


$queryNumbers += 3;


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
