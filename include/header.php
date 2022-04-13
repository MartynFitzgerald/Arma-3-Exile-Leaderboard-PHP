<!DOCTYPE html>
<?php
require_once('php/steamauth/openid.php');
require_once('include/login.php');
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="favicon.ico" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/w3.css">
	<!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/styles.css">
	<!-- Calling the JavaScript file -->
    <script src="javaScript/index.js"></script>
    <script src="javaScript/slideShow.js"></script>
    <script src="javaScript/jquery-3.3.1.slim.min.js"></script>
	<script src="javaScript/popper.min.js"></script>
	<script src="javaScript/bootstrap.min.js"></script>

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
				<a href="https://www.spartangaming.co.uk/"><img class="navbar-logo" src="pictures/logosmall.png" alt="Logo"> </a>
			</li>
		</ul>
	</div>
	<!-- this is they main menu for bigger screen devices -->
	<div class="collapse navbar-collapse" id="menuID">
        <ul class="navbar-nav mx-auto">
			<li class="nav-item">
				<a class="nav-link" href="index.php">SERVER STATS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">|</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="playerStats.php">PLAYER STATS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">|</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PLAYER OF THE MONTH</a>
				<?php  if ($_SESSION['server'] == 'CHERNARUS ISLES' || !isset($_SESSION['server']) || empty($_SESSION['server'])) { ?>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="player_of_the_month.php?month=JANUARY&uid=76561197994820404">JANUARY</a>
						<a class="dropdown-item" href="player_of_the_month.php?month=FEBRUARY&uid=76561198000821607">FEBRUARY</a>
						<a class="dropdown-item" href="player_of_the_month.php?month=MARCH&uid=76561197985925486">MARCH</a>
						<a class="dropdown-item" href="player_of_the_month.php?month=APRIL&uid=76561197994820404">APRIL</a>
						<a class="dropdown-item" href="player_of_the_month.php?month=MAY&uid=76561198250134720">MAY</a>
						<a class="dropdown-item" href="player_of_the_month.php?month=JUNE&uid=76561198118729714">JUNE</a>
						<a class="dropdown-item" href="player_of_the_month.php?month=JULY&uid=76561198075688363">JULY</a>
					</div>
				<?php  } elseif ($_SESSION['server'] == 'ALTIS') {?>
					<div class="dropdown-menu" aria-labelledby="dropdown01">						
						<a class="dropdown-item" href="player_of_the_month.php?month=JULY&uid=76561198448550574">JULY</a>
					</div>
				<?php  }?>
			</li>
        </ul>
	</div>
	<div class="container menudivright">
		<div class="row" style="margin-left: auto;">
			<ul class="navbar-nav mx-auto">
		      	<div id="div_button">
		      		<form action="index.php" method="post">
		      			<select name="server"  id="server" class="form-control" onchange="this.form.submit()">
						<option value="">CHANGE SERVER</option>
						<option value="CHERNARUS ISLES">CHERNARUS ISLES</option>
						<option value="ALTIS">ALTIS</option>
						</select>
					</form>
				</div>
			</ul>
		</div>
		<div class="row" style="display: none;">
			<ul class="navbar-nav mx-auto">
		      	<div id="div_button">
					<li style="padding-top:6px;" class="nav-item">
						<?php
							require_once('php/steamauth/steamLogin_button.php');
						?>
					</li>
		      	</div>
				<div id="div_info">
	         		 <li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle' href='' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<script type='text/javascript'>
		      			 	var var_playerAvatar = localStorage.getItem("playerAvatar");
		        			document.write('<img src="' + var_playerAvatar + '" >');
						</script>
		            	<script>
			          		var var_playerNAME = localStorage.getItem("playerName");
								document.write(var_playerNAME);
						</script>
						</a>
						<div class='dropdown-menu' aria-labelledby='dropdown01'>
							<a class='dropdown-item' href='userStats.php'>PERSONAL STATS</a>
							<a class='dropdown-item' href='playerstats.php'>MARKET</a>
							<a onclick="steam_logout()" class='dropdown-item' href='index.php'>LOGOUT</a>
						</div>
					</li>
				</div>
			</ul>
		</div>
	</div>
</nav>

<!-- This is the start of gallery -->
<?php if ($_SESSION['server'] == 'CHERNARUS ISLES') { ?>
<div class="slider" id="main-slider">
	<div class="slider-wrapper">
		<img src="pictures/chernarus/picture2.jpg" class="slide"/>
		<img src="pictures/chernarus/picture1.jpg" class="slide"/>
		<img src="pictures/chernarus/picture3.jpg" class="slide"/>
		<img src="pictures/chernarus/picture6.jpg" class="slide"/>
		<img src="pictures/chernarus/picture4.jpg" class="slide"/>
		<img src="pictures/chernarus/picture5.jpg" class="slide"/>
		<img src="pictures/chernarus/picture7.jpg" class="slide"/>
		<img src="pictures/chernarus/picture8.jpg" class="slide"/>
	</div>
</div>

<?php } elseif ($_SESSION['server'] == 'ALTIS') { ?>

<div class="slider" id="main-slider">
	<div class="slider-wrapper">
		<img src="pictures/altis/picture2.jpg" class="slide"/>
		<img src="pictures/altis/picture1.jpg" class="slide"/>
		<img src="pictures/altis/picture3.jpg" class="slide"/>
		<img src="pictures/altis/picture6.jpg" class="slide"/>
		<img src="pictures/altis/picture4.jpg" class="slide"/>
		<img src="pictures/altis/picture5.jpg" class="slide"/>
		<img src="pictures/altis/picture7.jpg" class="slide"/>
		<img src="pictures/altis/picture8.jpg" class="slide"/>
	</div>
</div>
<?php } ?>
<!-- This is the end of gallery -->



<!-- Comment This out to disable the video -->
<div class="video-background">
  <div class="video-foreground">
  <!--  <iframe src="http://www.youtube.com/embed/GtI7ghY_pqE?&autoplay=1&rel=0&loop=1&start=6&showinfo=0&disablekb=1&controls=1&hd=1&autohide=1&end=200&playlist=" frameborder="0" allowfullscreen frameborder="0" gesture="media" allow="encrypted-media" ></iframe>
  --></div>
</div>
<!-- this is the end of navbar -->