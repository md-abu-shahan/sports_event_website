<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sports event website</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Md. Abu Shahan">
		<link rel="stylesheet"  href="mystylesheet.css">
	</head>
	
	<body>
		<div class="full-height">
			<?php
				include("../include/config.php");
				if(isset($_REQUEST['go']))
				{
					$username=$_REQUEST['username'];
					$password=$_REQUEST['password'];
					$loginQuery="SELECT * FROM login WHERE user='$username' AND pass='$password'";
					$res1=mysqli_query($conn,$loginQuery);
					$f1=mysqli_num_rows($res1);
					if($f1==0)
					{
					?>
						<?php echo "<script type='text/javascript'>alert(\"Wrong username OR password!!\");</script>"; ?>
						header("Location:index.php");
					<?php
					}
					else 
					{
						header("Location:home.php");
					}
					
				}
			?>
			<div class="header_side">
				<header >
					<h2 class="welcome">WELCOME!</h2>
					<h5 style="color: white;">to Sports Event Website</h5>
				</header>
			</div>
			
			<div class="middle">
				<div class="loginBox">
					<img src="image\\loginlogo.jpg" alt="" class="circle">
					<h1 style="text-align:center;">Login Here</h1>
					<form action="index.php" method="post" enctype="multipart/form-data">
						<p> Name : </p>
						<input type="text" placeholder="Enter name" name="username" required="" style="width:90%;">
						<p> Passward : </p>				
						<input type="password" placeholder="Enter password" name="password" required="">
						<a ><input type="submit" name="go" value="Login"></a>
						</br></br></br></br>
					</form>
				</div>
			</div>
			
			<div class="footer" >
				<div  class="footer_right">
					<img src="img\\Picture.jpg" alt="" class="circle"><br><br>
					<h6 style="text-align:right;color:white; padding-right:5px;">Developed by Md Abu Shahan</h6>
				</div>
				<div class="footer_left">
					<h2 style="color:#6AE545; text-align:center;">
						Contact
					</h2>
					<h5 style="color:white; text-align:center;">
						Phone: 0170384436
					</h5>
					<h5 style="color:white; text-align:center;">
						Email: shahanahmed668@gmail.com
					</h5>
					
				</div>	
			</div>
		</div>
	</body>
</html>