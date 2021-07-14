<?php
	//DB CONNECTION
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
					<li class="active"><a href="home.php">Home</a></li>
					<li><a href="category.php">Add Categore</a></li>
					<li><a href="events.php">Add Event</a></li>
				</ul>
			</div>
			<nav class="eventtable">
				<table border="2" class="center">
					<caption>
						<h3 style="text-align:center; ">Event Categories</h3>
					</caption>
					<tr>
						<th>
							Name
						</th>
						<th colspan="2">
							<a href="category.php">Add Categore</a>
						</th>
					</tr>
					<tr>
						<?php
							$qry_up = "SELECT * FROM event_category;";
							$res_up = mysqli_query($conn, $qry_up) or die("Query Failed!");
							if (mysqli_num_rows($res_up) > 0) {
								while ($row = mysqli_fetch_assoc($res_up)) {
									$id = $row['Cat_Id'];
									$name = $row['Cat_Name'];
									echo '<tr>';
										echo'<td>'.$name.'</td>';
										echo '<td><a href="edit_category.php?id='.$id.'">Edit</td>';
						?>
										<td>
											<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
												<input type="hidden" name="eid" value ="<?php echo $id ?>">
												<input type="submit" name="del" value="Delete" class="delete_button">
											</form>
										</td>
						<?php
									echo '</tr>';
								}
							}
							if (isset($_POST['del'])) {
								$eid = $_POST['eid'];
								$qry1 = "DELETE FROM event_category WHERE Cat_Id = '{$eid}';";
								mysqli_query($conn, $qry1);
								echo("<script>alert('Event category deleted successfully!');</script>");
								echo '<script>
								if (window.history.replaceState) {
									window.history.replaceState(null, null, window.location.href);
								}
								window.location.reload();
								</script>';
							}
	                    ?>
					</tr>
				</table>
				<br><hr>	
				<table border="2" class="center" id="myTable">
					<caption>
						<h3 style="text-align:center; ">Events</h3>
					</caption>
					<tr>
						<th>
							Name
						</th>
						<th>
							description
						</th>
						<th>
							date
						</th>
						<th>
							category
						</th>
						<th>
							image
						</th>
						<th>
							Status
						</th>
						<th>
							Mark
						</th>
						<th colspan="2">
							<a href="events.php">Add Event</a>
						</th>
					</tr>
					<?php
						$qry_up1 = "SELECT * FROM event_details;";
						$res_up1 = mysqli_query($conn, $qry_up1) or die("Query Failed!");
						if (mysqli_num_rows($res_up1) > 0) {
							$row_num=1;
							while ($row = mysqli_fetch_assoc($res_up1)) {
								$id1 = $row['Id'];
								$name = $row['Name'];
								$description = $row['Description'];
								$date = $row['Date'];
								$image = $row['Image'];
								$category = $row['Category'];
								$status = $row['Status'];
								$featured = $row['Featured'];
								if($featured=="YES"){
									$color="yellow";
								}else{
									$color="#CCFFFF";
								}
								echo '<tr id='.$id1.' style="background:'.$color.';">';
									echo'<td>'.$name.'</td>';
									echo'<td>'.$description.'</td>';
									echo'<td>'.$date.'</td>';
									echo'<td>'.$category.'</td>';
									echo'<td> <img src="../img/'.$image.'" alt="" width=300 height=250></td>';
									echo'<td>'.$status.'</td>';
									if($featured=="YES"){
					?>					<td>
											<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
												<input type="hidden" name="check1" value ="<?php echo $id1 ?>" id="p">
												<input type="submit" name="check" value="Unark" class="delete_button">
											</form>		
										</td>
					<?php			
									}else{
										
					?>					<td>
											<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
												<input type="hidden" name="check1" value ="<?php echo $id1 ?>" id="p">
												<input type="submit" name="check" value="Mark" class="mark_button">
											</form>		
										</td>
					<?php			
										
									}
										$row_num += 1;
										echo '<td><a href="edit_events.php?id='.$id1.'">Edit</td>';
					?>
									<td>
										<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
											<input type="hidden" name="eid1" value ="<?php echo $id1 ?>">
											<input type="submit" name="del1" value="Delete" class="delete_button">
										</form>
									</td>
					<?php
								echo '</tr>';
							}
						}
						if (isset($_POST['del1'])) {
	                    	$eid1 = $_POST['eid1'];
	                    	echo $eid1;
							$find_img = "select * from event_details WHERE Id = '{$eid1}';";
							$res_up2 = mysqli_query($conn, $find_img);
							$row1 = mysqli_fetch_assoc($res_up2);
							$prev_img = $row1['Image'];
							$prev_img1 = "../img/".$prev_img;
							unlink($prev_img1);
	                    	$qry2 = "DELETE FROM event_details WHERE Id = '{$eid1}';";
	                    	mysqli_query($conn, $qry2);

	                    	echo("<script>alert('Event deleted successfully!');</script>");
			        		echo '<script>
							if (window.history.replaceState) {
								window.history.replaceState(null, null, window.location.href);
							}
							window.location.reload();
							</script>';
	                    }
						if(isset($_POST['check'])){
							$check = $_POST['check1'];
							$find_ft = "select * from event_details WHERE Id = '{$check}';";
							$res_up3 = mysqli_query($conn, $find_ft);
							$row1 = mysqli_fetch_assoc($res_up3);
							$prev_ft = $row1['Featured'];
							if($prev_ft=="YES"){
								$find_check = "Update event_details SET Featured = 'No' WHERE Id = '{$check}';";
							} else {
								$find_check = "Update event_details SET Featured = 'YES' WHERE Id = '{$check}';";
							}
							mysqli_query($conn, $find_check);
							echo '<script>
							if (window.history.replaceState) {
								window.history.replaceState(null, null, window.location.href);
							}
							window.location.reload();
							</script>';
						}
					?>
				</table>
			</nav>
			<?php
				include("../include/footer.php");
			?>
			<script src="../javascript.js"></script>
		</div>
	</body>
</html>