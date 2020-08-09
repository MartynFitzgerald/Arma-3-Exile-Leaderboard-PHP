<?php

$sql_clan_top = "SELECT clan_id 'top_clan' FROM account WHERE clan_id != 'Null' GROUP BY clan_id ORDER BY count(*) DESC LIMIT 1;";
$sql_clan_count= "SELECT COUNT(clan_id) 'avg_clan_members' FROM account;";
$sql_clan = "SELECT COUNT(name) 'total_clans' FROM clan;";

$sql_result_clan_top = $conn->query($sql_clan_top);
$sql_result_clan_count = $conn->query($sql_clan_count);
$sql_result_clan = $conn->query($sql_clan);

$topClan = "";
$avgClanMembers = 0;
$totalClans = 0;

if ($sql_result_clan_top->num_rows > 0) {
    // output data of each row
    if($row = $sql_result_clan_top->fetch_assoc()) {
		$clan = $row["top_clan"];

		$sql_clan = "SELECT name FROM clan WHERE id='$clan';";
		$sql_result_sql_clan = $conn->query($sql_clan);

		if($row = $sql_result_sql_clan->fetch_assoc()) {
			$topClan = $row["name"];
		}
    }
}
if ($sql_result_clan->num_rows > 0) {
    // output data of each row
    if($row = $sql_result_clan->fetch_assoc()) {
		$totalClans = $row["total_clans"];
    }
}
if ($sql_result_clan_count->num_rows > 0) {
    // output data of each row
    if($row = $sql_result_clan_count->fetch_assoc()) {
		$result = $row["avg_clan_members"];
		$ClanMembers_float = ($result / $totalClans);
    }
}

$queryNumbers += 4;


$avgClanMembers = number_format($ClanMembers_float, 0);
?>

<table>
  <tr>
    <th colspan="2">CLAN STATS</th>
    </tr>
    <tr>
    <td>TOP CLAN</td>
    <td><?php echo $topClan;?></td>
  </tr>
  <tr>
    <td>AVG CLAN MEMBERS</td>
    <td><?php echo $avgClanMembers;?></td>
  </tr>
  <tr>
    <td>TOTAL CLANS</td>
    <td><?php echo $totalClans; ?> </td>
    </tr>
</table>
