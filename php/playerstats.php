<?php

if(isset($_SESSION['orderby']) && !empty($_SESSION['orderby'])) {
	if (isset($_GET['sort']))
	{
		if ($_GET['sort'] == $_SESSION['orderby'])
		{
			if ($_SESSION['desc_asc'] == 'DESC')
			{
				$_SESSION['desc_asc'] = 'ASC';
				$value_desc_adc = 'ASC';
			}
			else
			{
				$_SESSION['desc_asc'] = 'DESC';
				$value_desc_adc = 'DESC';
			}
		}
		else
		{ 
			$value_desc_adc = 'DESC';
			$_SESSION['desc_asc'] = 'DESC';
		}
	} 
	else
	{
		$value_desc_adc = $_SESSION['desc_asc'];
	}
}
else
{
	$value_desc_adc = 'DESC';
	$_SESSION['desc_asc'] = 'DESC';
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $_SESSION['orderby'] = $sort;
}
else if (isset($_SESSION['orderby']) && !empty($_SESSION['orderby'])) 
{
    $sort =  $_SESSION['orderby'];
}
else
{
    $sort = 'kills';
    $_SESSION['orderby'] = $sort;
}

if (isset($_GET['search'])) {
    $search = 'AND name LIKE "'.$_GET['search'].'%"';
}
else
{
    $search = '';
}


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
}
else
{
    $pageno = 1;
}

$no_of_records_per_page = 30;

$offset = ($pageno-1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*) FROM account  WHERE kills > 0";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT uid, name, kills, deaths, IFNULL(((SELECT SUM(distance) FROM player_stats WHERE killer=uid) / kills), 0) AS AVGD, IFNULL((kills / deaths), kills) as kd, last_connect_at FROM account WHERE kills > 0 $search ORDER BY $sort $value_desc_adc LIMIT $offset, $no_of_records_per_page";


$sql_result_account = mysqli_query($conn,$sql);

$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

//$sql_account = "SELECT uid, name, kills, deaths, last_connect_at FROM account  WHERE kills > 0 ORDER BY name ASC LIMIT $start_from, $limit;";
//$sql_result_account = $conn->query($sql_account);

$resultname = "";
$resultkills = 0;
$resultdeaths = 0;
$resultkd = 0.00;
$date = '';

$uid = 0;
$killer = 0;
  

?>


