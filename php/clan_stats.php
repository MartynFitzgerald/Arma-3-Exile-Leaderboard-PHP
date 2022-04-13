<?php

$sql_clan_top = "SELECT clan.name 'top_clan', (SELECT COUNT(name) FROM clan) 'total_clans', (SELECT COUNT(clan_id) FROM account) 'avg_clan_members' FROM account INNER JOIN clan ON account.clan_id = clan.id WHERE clan_id != 'Null' GROUP BY clan_id ORDER BY count(*) DESC LIMIT 1";

$sql_result_clan_top = $conn->query($sql_clan_top);

$topClan = "";
$avgClanMembers = 0;
$totalClans = 0;

if ($sql_result_clan_top->num_rows > 0) {
    // output data of each row
    if($row = $sql_result_clan_top->fetch_assoc()) {
		$topClan = $row["top_clan"];
		$totalClans = $row["total_clans"];
		$result = $row["avg_clan_members"];
		$ClanMembers_float = ($result / $totalClans);
    }
}
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
