<?php

$admins =[
	'76561198133325593', // Sean
	'76561198040665952', // Conzole
	'76561198007829103', // Kristian
	'76561198007383859', // Alec/SupaFly
	'76561198101179592', // Demples
	'76561198014913978', // Rosco
	'76561198066056917', // Nick
	'76561198114930329', // EwanC
	'76561198134546798', // Killian
	'76561198052435413', // SUPRA
	'76561197986892873', // I'm Trash/Carnah
	'76561197966640844', // Jukka-Pekka
	'76561198304385238', // Dexter
	'76561198002441369', // Don Vito
	'76561198137087943'  // Dazhy
];


session_start();

if(!isset($_SESSION['orderby']) && empty($_SESSION['orderby'])) {
	$_SESSION['orderby'] = '';
}
if(!isset($_SESSION['desc_asc']) && empty($_SESSION['desc_asc'])) {
	$_SESSION['desc_asc'] = 'DESC';
}

if (isset($_POST['server'])) {
	if(!isset($_SESSION['server']) && empty($_SESSION['server'])) {

		// IF SESSION IS EMPTY THEN GO TO CHERNAURUS
		$_SESSION['server'] = 'CHERNARUS ISLES';
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "exile_chernarus_isles_x64";

	} 
	elseif ($_POST['server'] == 'CHERNARUS ISLES')
	{
		$_SESSION['server'] = 'CHERNARUS ISLES';
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "exile_chernarus_isles_x64";
	}
	elseif ($_POST['server'] == 'ALTIS')
	{
		$_SESSION['server'] = 'ALTIS';
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "exile_isla_abramia_x64";
	}
}
else
{
	if(!isset($_SESSION['server']) && empty($_SESSION['server'])) 
	{
		// IF SESSION IS EMPTY THEN GO TO CHERNAURUS
		$_SESSION['server'] = 'CHERNARUS ISLES';
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "exile_chernarus_isles_x64";
	}
	elseif ($_SESSION['server'] == 'CHERNARUS ISLES')
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "exile_chernarus_isles_x64";
	}
	elseif ($_SESSION['server'] == 'ALTIS')
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "exile_isla_abramia_x64";
	}
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset($conn,"utf8");

// Check connection
if ($conn->connect_error) {
	echo "<br><h1>Error : Can't Connect To Database</h1><br>";
	die("Connection failed: " . $conn->connect_error);
} 
?>