<?php
	include("../include/config.php"); 
	$eid = $_GET['id'];
	$qry1 = "SELECT Cat_Name FROM event_category WHERE Cat_Id = '{$eid}';";
	$res1 = mysqli_query($conn ,$qry1);
	while ($row = mysqli_fetch_assoc($res1)) {
		$prev_name = $row['Cat_Name'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Md. Abu Shahan">
		<title>Sports event website</title>
		<link rel="stylesheet" href="../stylesheet.css"/>
	</head>

	<body>
		<div class="wrapper">
			<?php
				include("../include/header.php"); 
			?>
			<div class="subheader">
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="category.php">Add Category</a></li>
					<li><a href="events.php">Add Event</a></li>
				</ul>
			</div>
			
			<nav class="eventtable">
				<div class="eventfilter">
					<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
						
						<legend>Edit Category</legend>
						<input type="text" name="cur_name" value ="<?php echo $prev_name ?>">
						<input type="submit" name="Edit" value="Edit">
						
					</form>
				</div>	

			</nav>
			
			
			<?php
				if (isset($_POST['Edit'])) {
					$cur_name = $_POST['cur_name'];
					
					$qry2 = "UPDATE event_category SET Cat_Name = '{$cur_name}' WHERE Cat_Id = '{$eid}';";
					mysqli_query($conn, $qry2);
					echo("<script>alert('Category name updated succesfull!');</script>");
						header("Location: home.php");
					
				}
				include("../include/footer.php");
			?>
		</div>
	</body>
</html>