<?php

$sql_trader_stats = "SELECT COUNT(playerid) 'total_trades', SUM(poptabs) 'total_money_spent', AVG(poptabs) 'avg_money_spent' FROM trader_log;";
$sql_trader_most = "SELECT item_sold 'top_item_sold' FROM trader_log GROUP BY item_sold ORDER BY count(*) DESC LIMIT 1;";
$sql_trader_player = "SELECT playerid 'top_player' FROM trader_log GROUP BY playerid ORDER BY count(*) DESC LIMIT 1;";

$sql_result_trader = $conn->query($sql_trader_stats);
$sql_result_trader_most = $conn->query($sql_trader_most);
$sql_result_trader_player = $conn->query($sql_trader_player);

$totalTrades = 0;
$totalMoneySpent = 0;
$avgMoneySpent = 0;
$topItemBought = "";
$topPlayer = "";

if ($sql_result_trader->num_rows > 0) {
    // output data of each row
    if($row = $sql_result_trader->fetch_assoc()) {
		$Trades_float = $row["total_trades"];
		$MoneySpent_float = $row["total_money_spent"];
		$MoneySpentAVG_float = $row["avg_money_spent"];
    }
}
if ($sql_result_trader_most->num_rows > 0) {
    // output data of each row
    if($row = $sql_result_trader_most->fetch_assoc()) {
		$topItemBought = $row["top_item_sold"];
    }
}
if ($sql_result_trader_player->num_rows > 0) {
    // output data of each row
    if($row = $sql_result_trader_player->fetch_assoc()) {
		$player = $row["top_player"];

		$sql_player = "SELECT name FROM account WHERE uid='$player';";
		$sql_result_uid = $conn->query($sql_player);

		if($row = $sql_result_uid->fetch_assoc()) {
			$topPlayer = $row["name"];
		}
    }
}


$queryNumbers += 4;


$totalTrades = number_format($Trades_float, 0);
$totalMoneySpent = number_format($MoneySpent_float, 0);
$avgMoneySpent = number_format($MoneySpentAVG_float, 0);
?>

<table>
  <tr>
    <th colspan="2">TRADER STATS</th>
    </tr>
  <tr>
    <td>TOTAL TRADES</td>
    <td><?php echo $totalTrades; ?> </td>
    </tr>
    <tr>
    <td>TOTAL MONEY SPENT</td>
    <td><?php echo $totalMoneySpent;?></td>
  </tr>
  <tr>
    <td>AVG MONEY SPENT</td>
    <td><?php echo $avgMoneySpent;?></td>
  </tr>
  <tr>
    <td>TOP ITEM SOLD</td>
    <td><?php echo $topItemBought; ?> </td>
  </tr>
  <tr>
    <td>TOP PLAYER</td>
    <td><?php echo $topPlayer; ?> </td>
  </tr>
</table>
