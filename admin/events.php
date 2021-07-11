<?php		//DB CONNECTION
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
					<li><a href="category.php">Add Categore</a></li>
					<li class="active"><a href="events.php">Add Event</a></li>
				</ul>
			</div>
			
			<nav class="eventtable">
				<div class="eventfilter">
					<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
						<fieldset>
							<legend>Add Event</legend>
							<input type="text" name="name" placeholder="Event Name" required><br><br>
							<textarea type="text" name="desc" placeholder="Event Describtion" required></textarea><br><br>
							<input type="date" name="dat" placeholder="Event Date" ><br><br>
							<input type="text" name="stat" placeholder="enable / disable" required><br><br>
							<label for="Category">Choose a Category:</label>
								<select name="cat">
									<?php

									$q1 = "SELECT * FROM event_category;";
									$r1 = mysqli_query($conn, $q1);
									while ($row = mysqli_fetch_assoc($r1)) {
										$cat = $row['Cat_Name'];
										echo '<option value="'.$cat.'">'.$cat.'</option>';
									}
									?>
								</select>
							<br><br>
							<label for="img">Select pic:</label>
							<input type="file" name="pic" placeholder="Event pic" ><br><br>
							<input type="submit" name="add" value="Submit"><br><br>
						</fieldset>
					</form>
				</div>	
			</nav>
			<?php
				if (isset($_POST['add'])) {
		        	$name = $_POST['name'];
		        	$desc = $_POST['desc'];
		        	$dat = $_POST['dat'];
		        	$stat = $_POST['stat'];
		        	$cat = $_POST['cat'];

		        	if(isset($_FILES['pic'])){
		        		echo 'dddd';
				      $errors= array();
				      $file_name = $_FILES['pic']['name'];
				      $file_tmp =$_FILES['pic']['tmp_name'];
				      $file_type=$_FILES['pic']['type'];
				      $file_ext = strtolower(substr($file_name, strrpos($file_name, '.')  + 1));
				      
				      $extensions= array("jpeg","jpg","png");
				      
				      if(in_array($file_ext,$extensions)=== false){
				         echo '<script>extension not allowed, please choose a JPEG or PNG file.</script>';
				      }
				      
				      if(empty($errors)==true){
				         move_uploaded_file($file_tmp,"../img/".$file_name);
				         echo "Success";
				      }
				   }
				   $qin = "INSERT INTO event_details(Name, Description, Date, Image, Category, Status) VALUES('{$name}', '{$desc}', '{$dat}', '{$file_name}', '{$cat}', '{$stat}');";
				   mysqli_query($conn, $qin) or die('Query failed!');
				   header("Location: home.php");
		        }


				include("../include/footer.php");
			?>
		</div>
	</body>
</html>