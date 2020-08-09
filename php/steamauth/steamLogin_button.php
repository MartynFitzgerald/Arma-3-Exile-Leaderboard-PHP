<?php

	require_once('openid.php');
	$test = 0;

	$_STEAMAPI = "9205C3E493148B1E00835AAE010061FF";
	try
	{
		$openid = new LightOpenID('http://localhost:2302/SG_Test/');
		if(!$openid->mode)
		{
			if(isset($_GET['login']))
			{
				$openid->identity = 'http://steamcommunity.com/openid/?l=english';    // This is forcing english because it has a weird habit of selecting a random language otherwise
				header('Location: ' . $openid->authUrl());
			}
			?>
			<form action="?login" method="post">
				<input type="image" src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_small.png">
			</form>
			<?php
		}
		elseif($openid->mode == 'cancel')
		{
			echo 'User has canceled authentication!';
		}
		else
		{
			if($openid->validate())
			{
			$id = $openid->identity;
			// identity is something like: http://steamcommunity.com/openid/id/76561197960435530
			// we only care about the unique account ID at the end of the URL.
			$ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
			preg_match($ptn, $id, $matches);
			//echo "User is logged in (steamID: $matches[1])\n";

			$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$_STEAMAPI&steamids=$matches[1]";
			$json_object= file_get_contents($url);
			$json_decoded = json_decode($json_object);

			foreach ($json_decoded->response->players as $player)
			{
				$test = 0;
				?>
				<script type="text/javascript">
					var player_id = "<?php echo $player->steamid; ?>";
					var player_name = "<?php echo $player->personaname; ?>";
					var player_url = "<?php echo $player->profileurl; ?>";
					var player_avatar = "<?php echo $player->avatar; ?>";
					var player_avatarfull = "<?php echo $player->avatarfull; ?>";

					document.cookie = "_uid=" + player_id + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/"

					localStorage.setItem("playerID", player_id);
					localStorage.setItem("playerName", player_name);
					localStorage.setItem("playerURL", player_url);
					localStorage.setItem("playerAvatar", player_avatar);
					localStorage.setItem("playerAvatarFull", player_avatarfull);

					/*
					document.write("<br><br><br> ID - " + player_id);
					document.write("<br> Name - " + player_name);
					document.write("<br> URL - " + player_url);
					document.write('<br> <img src="' + player_avatar + '">');
					document.write('<br> <img src="' + player_avatarfull + '">');
					*/

				</script>
				<?php
			}
		}
		else
		{
			$test = 1;
		?>
		<script type="text/javascript">
			var var_playerUID = localStorage.getItem("playerID");
			var var_playerNAME = localStorage.getItem("playerName");
			var var_playerURL = localStorage.getItem("playerURL");
			var var_playerAvatar = localStorage.getItem("playerAvatar");
			var var_playerAvatarFull = localStorage.getItem("playerAvatarFull");
			/*
			document.write("<br> ID - " + var_playerUID);
			document.write("<br> Name - " + var_playerNAME);
			document.write("<br> URL - " + var_playerURL);
			document.write('<br> <img src="' + var_playerAvatar + '">');
			document.write('<br> <img src="' + var_playerAvatarFull + '">');
			*/
		</script>

		<?php
		}
	}
}

catch(ErrorException $e)
{
	echo $e->getMessage();
}

?>
