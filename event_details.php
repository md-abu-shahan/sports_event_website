<?php
include("include/config.php"); 
$eid = $_GET['id'];
$qry1 = "SELECT * FROM event_details WHERE Id = '{$eid}';";
$res1 = mysqli_query($conn ,$qry1);
while ($row = mysqli_fetch_assoc($res1)) {
	$prev_name = $row['Name'];
	$prev_description = $row['Description'];
	$prev_date = $row['Date'];
	$prev_image = $row['Image'];
	$prev_category = $row['Category'];
	$prev_status = $row['Status'];
}
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
					<li><a href="event.php">EVENT</a></li>
				</ul>
			</div>
			<nav class="eventtable">
				<ul>
					<li> <h1><i><u>Event Name</u>:</i> <?php echo $prev_name?> </h1>  </li><br>
					<li> <h3><i><u>Event Date</u>: </i><?php echo $prev_date?> </h3>  </li><br>
					<li> <h3><i><u>Event Category</u>: </i><?php echo $prev_category?> </h3></li><br>
					<li> <h3><i><u>Event Status</u>: </i><?php echo $prev_status?> </h3>  </li><br>
					<li> <h3><i><u>Event Description</u>: </i><?php echo $prev_description?> </h3>  </li><br><br>
					<li> 
						<h5>Event Image:</h5>
						<img src="img/<?php echo $prev_image;?>" width=600 height=400>  
					</li>
				</ul>
			</nav>
			<?php
				include("include/footer.php");
			?>
		</div>
	</body>
</html>