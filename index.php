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
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="event.php">EVENT</a></li>
				</ul>
			</div>
			<hr><br>

			<div class="slideshow-container">
				<?php
					$dir = "img/";
					$count= 0;
					// Open a directory, and read its contents
					if (is_dir($dir)){
					  if ($dh = opendir($dir)){
						while (($file = readdir($dh)) !== false){
							if($count<2){
								$count+=1;
								continue;
							}
							echo "<div class=\"mySlides\">";
								echo "<img src=\"img/$file\" width=500 height=270>";
							echo "</div>";
						  $count+=1;
						}
						closedir($dh);
					  }
					}
				?>
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
			
			<?php
				$dir = "img/";
				$count1= 0;
				// Open a directory, and read its contents
				if (is_dir($dir)){
				  if ($dh = opendir($dir)){
					echo "<div style=\"text-align:center\">";
					while (($file = readdir($dh)) !== false){
						if($count1<2){
							$count1+=1;
							continue;
						}
						echo "<span class=\"dot\" onclick=\"currentSlide($count1-1)\"></span>";
					  $count1+=1;
					}
					echo "</div>";
					closedir($dh);
				  }
				}
			?>
			<br>
			<script src="javascript.js"></script>
			
			<?php
				include("include/footer.php");
			?>
		</div>
	</body>
</html>