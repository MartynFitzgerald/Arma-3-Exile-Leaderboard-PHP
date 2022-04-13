<?php
require_once('include/header.php');
require_once('php/playerStats.php');
?>

<!-- this is the end of navbar -->
<main>
	<br>
	<div class="container">
	<div class="row">
		<h1 style="margin:auto;">PLAYER LEADERBOARDS</h1>
	</div>
	<br>
	<div class="row">
		<div class="input-group mb-3" style="margin:auto; width:300px; margin-bottom: auto!important;">
			<form action="playerStats.php" method="get" style="display: flex;">
				<input type="text" class="form-control" name="search" style="width:100%;" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary"  type="submit">Search</button>
				</div>
			</form>
		</div>
		<!--<div class="input-group mb-3" style="margin:auto; width:300px; margin-bottom: auto!important;">
			<form action="playerStats.php" method="get" style="display: flex;">
				<label> From:
				<input id="today2" type="date" name="from"></input> </label> 
				<label> To:
				<input id="today1" type="date" name="to"></input> </label> 
				<input type="submit"></input> 
			</form>
		</div>-->
	</div>
	</div>
	
<script>
var today1 = new Date().toISOString().substr(0, 10);
document.querySelector("#today1").value = today1;
</script>

<script>
var d = new Date();
d.setMonth(d.getMonth() - 1);
var today2 = d.toISOString().substr(0, 10);
document.querySelector("#today2").value = today2;
</script>

<div class="row">
	<div class="tablediv2">
		<table class="sortable">
			<thead>
					<tr align="center" class="top_table horizontalLine">
						<th style="padding: 0; width:25%;"><a href="?sort=name" class="btn btn-primary">NAME</a></th>
						<th style="padding: 0; width:10%;"><a href="?sort=kills" class="btn btn-primary">KILLS</a></th>
						<th style="padding: 0; width:10%;"><a href="?sort=deaths" class="btn btn-primary">DEATHS</a></th>
						<th style="padding: 0; width:15%;"><a href="?sort=AVGD" class="btn btn-primary">AVERAGE DISTANCE</a></th>
						<th style="padding: 0; width:15%;"><a href="?sort=kd" class="btn btn-primary">K/D</a></th>
						<th style="padding: 0; width:25%;"><a href="?sort=last_connect_at" class="btn btn-primary">LAST ONLINE</a></th>
					</tr>
			</thead>
			<tbody>
				<!--Use a while loop to make a table row for every DB row-->
				<?php while($row = $sql_result_account->fetch_assoc()) : ?>
				<tr align="center">
					<!--Each table column is echoed in to a td cell-->
					<td><a href="userLeaderboard.php?uid=<?php echo $row["uid"];?>"><?php echo $row["name"]; ?></a></td>

					<td><?php $resultkills = $row["kills"]; echo $resultkills; ?></td>

					<td><?php $resultdeaths = $row["deaths"]; echo $resultdeaths; ?></td>
					<td>
						<?php $resultdistance = number_format($row["AVGD"], 0); echo $resultdistance; ?>
					</td>

					<td>
						<?php $resultkd = number_format($row["kd"], 2); echo $resultkd; ?>
					</td>

					<td>
						<?php echo date("d F Y", strtotime($row["last_connect_at"]));?>
					</td>
				</tr>
				<?php endwhile ?>
			</tbody>
		</table>
		<br>
		<div class="d-flex justify-content-center">
			<nav aria-label="Page navigation example">
			  <ul class="pagination">

				<?php if (!isset($_GET['search']) || ($_GET['search'] == NULL)) {?>
			    <li class="page-item">
			    	<a class="page-link" href="?pageno=1">First</a>
			    </li>

			    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
			        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
			    </li>


				<?php if ($pageno <= 1){?>

				<li class="page-item active">
					<a class="page-link" href="#"><?php echo $pageno ?></a>
				</li>
				<li class="page-item">
					<a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><?php echo $pageno + 1 ?></a>
				</li>
				<li class="page-item">
					<a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 2); } ?>"><?php echo $pageno + 2 ?></a>
				</li>

				<?php } elseif ($pageno == $total_pages) {?>

				<li class="page-item">
					<a class="page-link" href="<?php if($pageno >= $total_pages){ echo "?pageno=".($pageno - 2); } ?>"><?php echo $pageno - 2 ?></a>
				</li>
				<li class="page-item">
					<a class="page-link" href="<?php if($pageno >= $total_pages){ echo "?pageno=".($pageno - 1); } ?>"><?php echo $pageno - 1 ?></a>
				</li>
				<li class="page-item active">
					<a class="page-link" href="#"><?php echo $pageno ?></a>
				</li>

				<?php } elseif ($pageno > 1) {?>

				<li class="page-item">
					<a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><?php echo $pageno - 1 ?></a>
				</li>
				<li class="page-item active">
					<a class="page-link" href="#"><?php echo $pageno ?></a>
				</li>
				<li class="page-item">
					<a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><?php echo $pageno + 1 ?></a>
				</li>

				<?php }?>


			    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
			        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
			    </li>

			   	<li class="page-item">
			   		<a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a>
			   	</li>
			   	
				<?php }?>
			 	</ul>
			</nav>
		</div>
	</div>
</div>



<br>
<br>

</main>
</body>
</html>

<?php
$conn->close();
?>


