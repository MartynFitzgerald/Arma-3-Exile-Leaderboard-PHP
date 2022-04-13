<?php
require_once('include/header.php');
?>

<main>
<!--	<br>
<div align="middle">
		  <img src="pictures/logobig.png" alt="Logo">
	<br><br>
	   <h1>CHERNARUS ISLES</h1>
</div> -->
<div class="row">
  <div class="tablediv">

    <?php  require_once('php/server_stats.php'); ?>

	   <br><br><br>

    <?php  require_once('php/money_stats.php'); ?>

  </div>

	<div class="tablediv">

    <?php require_once('php/usedWeapon_stats.php'); ?>

	</div>

	<div class="tablediv">

    <?php   require_once('php/trader_stats.php'); ?>

		<br><br><br>

    <?php   require_once('php/clan_stats.php'); ?>

	</div>

	<div class="tablediv">

    <?php require_once('php/longestShots_stats.php'); ?>

	</div>
</div>
</main>
</body>
</html>

<?php
$conn->close();
?>
