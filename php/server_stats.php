<?php
$sql_server_stats = "SELECT COUNT(*) 'total_users', SUM(kills) 'total_kills', SUM(deaths) 'total_deaths', AVG(kills) 'average_kills', (SELECT AVG(distance) from player_stats) 'average_kill_distance' from account;";

$sql_server_stats_results = $conn->query($sql_server_stats);

$totalUsers = 0;
$totalKills = 0;
$totalDeaths = 0;
$averageKills = 0;
$averageKillDistance = 0;

if ($sql_server_stats_results->num_rows > 0) {
    if($row = $sql_server_stats_results->fetch_assoc()) {
		$totalUsers = $row["total_users"];
		$totalKills = $row["total_kills"];
		$totalDeaths = $row["total_deaths"];
		$averageK_float = $row["average_kills"];
		$averageKillD_float = $row["average_kill_distance"];
	}
}

$queryNumbers += 2;

$averageKills = number_format($averageK_float, 0);
$averageKillDistance = number_format($averageKillD_float, 0);
?>
  <table>
    <tr>
      <th colspan="2">SERVER STATS</th>
      </tr>
    <tr>
      <td>TOTAL USERS</td>
      <td><?php echo $totalUsers; ?> </td>
      </tr>
    <tr>
      <td>TOTAL KILLS</td>
      <td><?php echo $totalKills; ?> </td>
    </tr>
    <tr>
      <td>TOTAL DEATHS</td>
      <td><?php echo $totalDeaths; ?> </td>
    </tr>
    <tr>
      <td>AVG K/D</td>
      <td><?php echo $averageKills; ?></td>
    </tr>
    <tr>
      <td>AVG KILL DISTANCE</td>
      <td><?php echo $averageKillDistance; ?></td>
    </tr>
  </table>
