<?php
	//DB CONNECTION
	include("include/config.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Md. Abu Shahan">
		<title>Sports event website</title>
		<link rel="stylesheet" href="stylesheet.css"/>
		
	</head>
	
	<body>
		<div class="wrapper">
			<?php
				include("include/header.php");
			?>
			<div class="subheader">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="event.php">EVENT</a></li>
				</ul>
			</div>
			<nav class="eventtable">
				<div class="eventfilter">	
					<legend>Search</legend>
					<input type="text" placeholder="Search Event Name.." id="myInput" onkeyup="search()"><br><br>
					<table border="2" class="center" id="myTable">
						<caption>
							<h3 style="text-align:center; ">Event</h3>
						</caption>
						<tr>
							<th>
								Name
							</th>
							<th>
								Date
							</th>
							<th>
								Action
							</th>
						</tr>
						<?php
							$qry_up1 = "SELECT * FROM event_details;";
							$res_up1 = mysqli_query($conn, $qry_up1) or die("Query Failed!");
							
							if (mysqli_num_rows($res_up1) > 0) {
								while ($row = mysqli_fetch_assoc($res_up1)) {
									$id1 = $row['Id'];
									$name = $row['Name'];
									$date = $row['Date'];
									echo '<tr>';
										echo'<td>'.$name.'</td>';
										echo'<td>'.$date.'</td>';
										echo '<td><a href="event_details.php?id='.$id1.'">Details</td>';
									echo '</tr>';
								}
							}
						?>
					</table>
				</div>
			</nav>
			<?php
				include("include/footer.php");
			?>
			<script src="javascript.js"></script>
		</div>
	</body>
</html>