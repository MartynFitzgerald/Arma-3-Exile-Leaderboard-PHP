<!doctype html>
<?php
require_once('php/steamauth/openid.php');
require_once('php/login.php');
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
    <link rel="stylesheet" href="styles.css">
	   <!-- Calling the JavaScript file -->
    <script src="javaScript/index.js"></script>
    <script src="javaScript/slideShow.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

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
				<a class="nav-link" href="https://www.spartangaming.co.uk/">HOME</a>
			</li>
			<li class="nav-item active dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">STATS</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item active" href="index.php">GENERAL STATS<span class="sr-only">(current)</span></a>
						<a class="dropdown-item" href="pages/playerstats.php">PLAYER STATS</a>
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
					require_once('php/steamauth/steamLogin_button.php');
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
						<div class='dropdown-menu' aria-labelledby='dropdown01'>
							<a class='dropdown-item' href='pages/user_stats.php'>PERSONAL STATS</a>
							<a class='dropdown-item' href='playerstats.php'>MARKET</a>
							<a onclick="steam_logout()" class='dropdown-item' href='index.php'>LOGOUT</a>
						</div>
					</li>
				</div>
		</ul>
	</div>
</nav>

<!-- This is the start of gallery -->
<div class="slider" id="main-slider">
	<div class="slider-wrapper">
		<img src="pictures/picture2.jpg" class="slide"/>
		<img src="pictures/picture1.jpg" class="slide"/>
		<img src="pictures/picture3.jpg" class="slide"/>
		<img src="pictures/picture4.jpg" class="slide"/>
		<img src="pictures/picture5.jpg" class="slide"/>
		<img src="pictures/picture6.jpg" class="slide"/>
		<img src="pictures/picture7.jpg" class="slide"/>
		<img src="pictures/picture8.jpg" class="slide"/>
	</div>
</div>
<!-- This is the end of gallery -->
<!-- Comment This out to disable the video -->
<div class="video-background">
  <div class="video-foreground">
  <!--  <iframe src="http://www.youtube.com/embed/GtI7ghY_pqE?&autoplay=1&rel=0&loop=1&start=6&showinfo=0&disablekb=1&controls=1&hd=1&autohide=1&end=200&playlist=" frameborder="0" allowfullscreen frameborder="0" gesture="media" allow="encrypted-media" ></iframe>
  --></div>
</div>
<!-- this is the end of navbar -->

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

    <?php require_once('php/longestShoots_stats.php'); ?>

	</div>
</div>
</main>
</body>
</html>

<?php
$conn->close();
?>
