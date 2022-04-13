<?php
require_once('include/header.php');

if (isset($_GET['month'])) {
    $month = $_GET['month'];
}
else
{
    $month = "";
}

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
	require_once('php/user_leaderboard_php/user_stats.php');
}
else
{
    $uid = "";
}

?>


<!-- this is the end of navbar -->
<main>
	<br>
	<div align="middle">
    	<h1><?php echo $month ?> - <?php echo $name ?></h1>
    	<h4 style="color:#fff;">WINNER OF 500,000 POPTABS</h4>
	</div>

<div class="container">
	<div class="row">
		<div class="col-xl-4">
			<table>
				<tr>
					<th colspan='2'>GENERAL STATS</th>
				<tr>
					<td>CLAN</td>
					<td><?php echo $clan_name; ?> </td>
				</tr>
				<tr>
					<td>AVG K/D</td>
					<td><?php echo $totalKD; ?></td>
				</tr>
	  			</tr>
					<td>TOTAL KILLS</td>
					<td><?php echo $totalKills; ?> </td>
				</tr>
				<tr>
					<td>TOTAL DEATHS</td>
					<td><?php echo $totalDeaths; ?> </td>
				</tr>
				<tr>
					<td>AVG KILL DISTANCE</td>
					<td><?php echo $averageKillDistance; ?></td>
				</tr>
				<tr>
					<td>EXP LEVEL</td>
					<td><?php echo $exp_level; ?></td>
				</tr>
				<tr>
					<td>TOTAL VEHICLES</td>
					<td><?php echo $amount_of_vehicle; ?> </td>
				</tr>
				<tr>
					<td>TOTAL MARXET ITEMS</td>
					<td><?php echo $amount_of_marxet; ?> </td>
				</tr>
				<tr>
					<td>TOTAL CONNECTIONS</td>
					<td><?php echo $total_connections; ?> </td>
				</tr>
				<tr>
					<td>FIRST CONNECTED</td>
					<td><?php echo $first_connected; ?> </td>
				</tr>
				<tr>
					<td>LAST CONNECTED</td>
					<td><?php echo $last_connected; ?> </td>
				</tr>
			</table>
		</div>

		<div class="col-xl-4">
			<table>
				<tr>
					<th colspan="2">FREQUENTLY KILLED BY</th>
	  			</tr>
	  			<tr>
					<td>WEAPONS</td>
					<td>TOTAL KILLS</td>
	  			</tr>
				<?php require_once('php/user_leaderboard_php/usedWeapon_stats_victim.php'); ?>
			</table>
		</div>

		<div class="col-xl-4">
			<table>
				<tr>
					<th colspan="2">FREQUENTLY USED WEAPONS</th>
	  			</tr>
	  			<tr>
					<td>WEAPONS</td>
					<td>TOTAL KILLS</td>
	  			</tr>
				<?php require_once('php/user_leaderboard_php/usedWeapon_stats.php'); ?>
			</table>
		</div>

		</div>
		<br>
	<div class="row">
		<div class="col-12 col-xl-6">
			<table>
				<tr>
					<th colspan="4">LONGEST SHOTS</th>
	  			</tr>
	  			<tr>
					<td>KILLER</td>
					<td>VICTIM</td>
					<td>WEAPON</td>
					<td>DISTANCE</td>
	  			</tr>
				<?php require_once('php/user_leaderboard_php/longestShots_stats.php'); ?>
			</table>
		</div>
		<div class="col-12 col-xl-6">
			<table>
				<tr>
					<th colspan="4">SHORTEST SHOTS</th>
	  			</tr>
	  			<tr>
					<td>KILLER</td>
					<td>VICTIM</td>
					<td>WEAPON</td>
					<td>DISTANCE</td>
	  			</tr>
				<?php require_once('php/user_leaderboard_php/shortestShots_stats.php'); ?>
			</table>
		</div>
	</div>	
</div>

</main>
	<br>
	<br>
</body>
</html>

<?php
$conn->close();
?>


