<?php
	include("../include/config.php"); 
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
		$prev_featured = $row['Featured'];
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
					<li><a href="category.php">Add Categore</a></li>
					<li><a href="events.php">Add Event</a></li>
				</ul>
			</div>
			
			<nav class="eventtable">
				<div class="eventfilter">
					<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
						<fieldset>
							<legend>Edit Event</legend>
							<input type="text" name="name" value ="<?php echo $prev_name ?>" placeholder="Event Name" required><br><br>
							<input type="text" name="desc" value ="<?php echo $prev_description ?>" placeholder="Event Describtion" required><br><br>
							<input type="date" name="dat" value ="<?php echo $prev_date ?>" placeholder="Event Date" ><br><br>
							<input type="text" name="stat" value ="<?php echo $prev_status ?>" placeholder="enable / disable" required><br><br>
							<label for="Category">Choose a Category:</label>
								<select name="cat">
									<?php
										$q1 = "SELECT * FROM event_category;";
										$r1 = mysqli_query($conn, $q1);
										while ($row = mysqli_fetch_assoc($r1)) {
											$cat = $row['Cat_Name'];
											if($cat==$prev_category){
												echo '<option value="'.$cat.'" selected>'.$cat.'</option>';
											}else {
												echo '<option value="'.$cat.'">'.$cat.'</option>';
											}
										}
									?>
								</select>
								<br><br>
							<label for="img">Selected pic:</label>
							<?php echo'<img src="../img/'.$prev_image.'" alt="" width=100 height=100>';?>
							<input type="file" name="pic" value = <?php $prev_image; ?> required><br><br>
							<input type="submit" name="Edit" value="Edit"><br><br>
						</fieldset>
					</form>
				</div>	
			</nav>
			<?php
				if (isset($_POST['Edit'])) {
		        	$name = $_POST['name'];
		        	$desc = $_POST['desc'];
		        	$dat = $_POST['dat'];
		        	$stat = $_POST['stat'];
		        	$cat = $_POST['cat'];
		        	if(isset($_FILES['pic'])){
		        		
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
					  if($file_name==""){
						  $file_name=$prev_image;
					  }else{
						$img="../img/".$prev_image;
						unlink($img);
					  }
				   }
				   echo $file_name;
				   
					$qry2 = "UPDATE event_details SET Name = '{$name}', Description = '{$desc}', Date = '{$dat}', Category = '{$cat}', Image = '{$file_name}', Status = '{$stat}' WHERE Id = '{$eid}';";
					mysqli_query($conn, $qry2);
					echo("<script>alert('Event updated succesfull!');</script>");
					header("Location: home.php");
					
		        }
				include("../include/footer.php");
			?>
		</div>
	</body>
</html>