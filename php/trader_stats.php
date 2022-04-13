<?php

$sql_trader_stats = "SELECT COUNT(playerid) 'total_trades', SUM(poptabs) 'total_money_spent', AVG(poptabs) 'avg_money_spent', (SELECT item_sold FROM trader_log GROUP BY item_sold ORDER BY count(*) DESC LIMIT 1) 'top_item_sold', (SELECT account.name FROM trader_log INNER JOIN account ON trader_log.playerid = account.uid GROUP BY trader_log.playerid ORDER BY count(*) DESC LIMIT 1) 'top_player' FROM trader_log";


$sql_result_trader = $conn->query($sql_trader_stats);

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
		$topItemBought = $row["top_item_sold"];
		$topPlayer = $row["top_player"];

    }
}
$totalTrades = number_format($Trades_float, 0);
$totalMoneySpent = number_format($MoneySpent_float, 0);
$avgMoneySpent = number_format($MoneySpentAVG_float, 0);
?>

<table>
  <tr>
    <th colspan="2">TRADER STATS (WEEKLY)</th>
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
