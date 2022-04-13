<?php
require_once('include/header.php');
?>

<!-- this is the end of navbar -->
<main>
		<br>
	<div align="middle">
    <script type='text/javascript'>
      var var_playerAvatarFull = localStorage.getItem("playerAvatarFull");
      document.write('<img src="' + var_playerAvatarFull + '" >');
    </script>
    <script>
      document.write('<h1>' + var_playerNAME + '</h1>');
    </script>
	</div>

<div class="row">
	<div class="tablediv">
		<table>
			<tr>
      <script>
        document.write("<th colspan='2'>" + var_playerNAME + "'s Stats</th>");
      </script>
			<tr>
				<td>CLAN</td>
				<td><?php echo $clan_id; ?> </td>
			</tr>
			<tr>
				<td>TERRITORY</td>
				<td><?php echo $territory; ?> </td>
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
				<td>MONEY ON PLAYER</td>
				<td><?php echo $money; ?> </td>
  			<tr>
			<tr>
				<td>MONEY IN LOCKER</td>
				<td><?php echo $locker_money; ?> </td>
			</tr>
			<tr>
				<td>MONEY IN CONTAINER</td>
				<td><?php echo $container_money; ?> </td>
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

	<div class="tablediv">
		<table>
			<tr>
				<th colspan="2">FREQUENTLY USED WEAPONS</th>
  			</tr>
  			<tr>
				<td>WEAPONS</td>
				<td>TOTAL KILLS</td>
  			</tr>
			<?php require_once(__ROOT__ .'/php/user_php/usedWeapon_stats.php'); ?>
		</table>
	</div>

  	<div class="tablediv">
  		<table>
  			<tr>
  				<th colspan="2">STOLEN FLAGS</th>
    			</tr>
    			<tr>
  				<td>STOLEN BY</td>
  				<td>STOLEN AT</td>
    			</tr>
  			<?php require(__ROOT__ .'/php/user_php/usedWeapon_stats.php'); ?>
  		</table>
  	</div>
    <div class="tablediv">
    		<table>
    			<tr>
    				<th colspan="2">TOP 10 RIVALRIES</th>
      			</tr>
      			<tr>
    				<td>WEAPONS</td>
    				<td>TOTAL KILLS </td>
      			</tr>
    			<?php require(__ROOT__ .'/php/user_php/usedWeapon_stats.php'); ?>
    		</table>
    	</div>
  <div class="tablediv">
      <table>
        <tr>
          <th colspan="2">LAST 10 SOLD ITEM</th>
          </tr>
          <tr>
          <td>ITEM</td>
          <td>AMOUNT</td>
          </tr>
        <?php require(__ROOT__ .'/php/user_php/usedWeapon_stats.php'); ?>
      </table>
    </div>
  </div>

  <div class="row">
	<div class="tablediv">
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
			<?php require_once(__ROOT__ .'/php/user_php/longestShots_stats.php'); ?>
		</table>
	</div>
	</div>

	<br><br>

  <div class="row">
    <div class="tablediv">
  		<table>
  			<tr>
  				<th colspan="4">KILLS</th>
    			</tr>
    			<tr>
  				<td>KILLER</td> <!-- Remove once made php script -->
  				<td>VICTIM</td>
  				<td>WEAPON</td>
  				<td>DISTANCE</td>
    			</tr>
  			<?php require(__ROOT__ .'/php/longestShots_stats.php'); ?>
  		</table>
  	</div>
  	</div>

  	<br><br>

    <div class="row">
      <div class="tablediv">
    		<table>
    			<tr>
    				<th colspan="4">DEATHS</th>
      			</tr>
      			<tr>
    				<td>KILLER</td>
    				<td>VICTIM</td> <!-- Remove once made php script -->
    				<td>WEAPON</td>
    				<td>DISTANCE</td>
      			</tr>
    			<?php require(__ROOT__ .'/php/longestShots_stats.php'); ?>
    		</table>
    	</div>
    	</div>

</main>
</body>
</html>

<?php
$conn->close();
?>
