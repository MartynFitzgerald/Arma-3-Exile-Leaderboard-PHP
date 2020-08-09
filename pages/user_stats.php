<!doctype html>
<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ .'/php/steamauth/openid.php');
require_once(__ROOT__ .'/php/login.php');
require_once(__ROOT__ .'/php/user_php/user_stats.php');
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
	  <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../styles.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


    <script>
    //window.location.href="?uid=76561198056537470";
    window.onload = function() {
  	    var x = document.getElementById("div_info");
  	    var y = document.getElementById("div_button");
        if (localStorage.getItem("playerName") == null || localStorage.getItem("playerName") == undefined ) {
            x.style.display = "none";
        		y.style.display = "block";
        } else {
            x.style.display = "block";
        		y.style.display = "none";
        }
      };
      function steam_logout() {
        document.cookie = "_uid=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

        localStorage.removeItem("playerID");
        localStorage.removeItem("playerName");
        localStorage.removeItem("playerURL");
        localStorage.removeItem("playerAvatar");
        localStorage.removeItem("playerAvatarFull");

        x.style.display = "block";
        y.style.display = "none";
      };

    </script>
</head>
<body>
<!-- this is the start of navbar -->
<nav class="navbar navbar-expand-md navbar-dark nav-bg-dark">
	<!-- this is the menu button for small screen devices -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuID" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="menudivleft">
		<ul class="navbar-nav mx-auto">
			<li class="nav-item">
				<a href="https://www.spartangaming.co.uk/"><img class="navbar-logo" src="../pictures/logosmall.png" alt="Logo"> </a>
			</li>
		</ul>
	</div>
	<!-- this is they main menu for bigger screen devices -->
	<div class="collapse navbar-collapse" id="menuID">
        <ul class="navbar-nav mx-auto">
			<li class="nav-item">
				<a class="nav-link" href="https://www.spartangaming.co.uk/">HOME</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">STATS</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="../index.php">GENERAL STATS<span class="sr-only">(current)</span></a>
						<a class="dropdown-item" href="../playerstats.php">PLAYER STATS</a>
						<a class="dropdown-item" href="">PLAYER OF THE MONTH</a>
					</div>
			</li>
        </ul>
	</div>
	<div class="menudivright">
		<ul class="navbar-nav mx-auto">
      <div id="div_button">
			<li class="nav-item">
				<?php
					require_once(__ROOT__ .'/php/steamauth/steamLogin_button.php');
				?>
			</li>
      </div>
			<div id="div_info">
          <li class='nav-item dropdown'>
					<a class='nav-link dropdown-toggle' href='http://example.com' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<script type='text/javascript'>
      			  var var_playerAvatar = localStorage.getItem("playerAvatar");
        			document.write('<img src="' + var_playerAvatar + '" >');
						</script>
            <script>
              var var_playerNAME = localStorage.getItem("playerName");
							document.write(var_playerNAME);
						</script>
						</a>
						<div class='dropdown-menu active' aria-labelledby='dropdown01'>
							<a class='dropdown-item active' href='../pages/user_stats.php'>PERSONAL STATS</a>
							<a class='dropdown-item' href=''>MARKET</a>
							<a onclick="steam_logout()" class='dropdown-item' href=''>LOGOUT</a>
						</div>
					</li>
				</div>
		</ul>
	</div>
</nav>

<div class="video-background">
  <div class="video-foreground">
    <!--<iframe src="http://www.youtube.com/embed/GtI7ghY_pqE?&autoplay=1&rel=0&loop=1&start=6&showinfo=0&disablekb=1&controls=1&hd=1&autohide=1&end=200&playlist=" frameborder="0" allowfullscreen frameborder="0" gesture="media" allow="encrypted-media" ></iframe>
  --></div>
</div>
<!-- this is the end of navbar -->
<main>
		<br>
	<div align="middle">
    <script type='text/javascript'>
      var var_playerAvatarFull = localStorage.getItem("playerAvatarFull");
      document.write('<img src="' + var_playerAvatarFull + '" >');
    </script>
		<br><br>
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
				<th colspan="4">LONGEST SHOOTS</th>
  			</tr>
  			<tr>
				<td>KILLER</td>
				<td>VICTIM</td>
				<td>WEAPON</td>
				<td>DISTANCE</td>
  			</tr>
			<?php require_once(__ROOT__ .'/php/user_php/longestShoots_stats.php'); ?>
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
  			<?php require(__ROOT__ .'/php/longestShoots_stats.php'); ?>
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
    			<?php require(__ROOT__ .'/php/longestShoots_stats.php'); ?>
    		</table>
    	</div>
    	</div>

</main>
</body>
</html>

<?php
$conn->close();
?>
