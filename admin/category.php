<?php	//DB CONNECTION
	include("../include/config.php");
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
					<li class="active"><a href="category.php">Add Categore</a></li>
					<li><a href="events.php">Add Event</a></li>
				</ul>
			</div>
			
			<nav class="eventtable">
				<div class="eventfilter">
					<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
						<legend>Add Category</legend>
						<input type="text" name="name" placeholder="Categore Name" required>
						<input type="submit" name="Add" value="Add" class="buttom">
						
					</form>
				</div>	
			</nav>
			
			<?php
				if (isset($_POST['Add'])) {
					$name = $_POST['name'];
					
					if (strlen($name) == 0) {
						echo("<script>alert('You left input fields blank! Try again!');</script>");
					}

					$qry1 = "SELECT * FROM event_category WHERE Cat_Name = '{$name}';";
					$res1 = mysqli_query($conn, $qry1) or die("Query Failed!");

					if (mysqli_num_rows($res1) > 0) {
						echo("<script>alert('Category name already exist! Try again!');</script>");
					}
					else {
						$qry2 = "INSERT INTO event_category(Cat_Name) VALUES('{$name}');";
						mysqli_query($conn, $qry2) or die("Query Failed!");
						echo("<script>alert('Category name insertion succesfull!');</script>");
						header("Location: home.php");
					}
				}
				include("../include/footer.php");
			?>
		</div>
	</body>
</html>