<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Student Learning</title>
    <link rel="icon" href="images/adi.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>STUDENT LEARNING</h1>
						<p>
							An Exclusive Learning Platform For ASIET Students.
						</p>
						<div class="">
							<span><img src="images/adi.png" alt=""></span>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign" style="border-radius: 10px;">
						<h2 class="log-title">Forgot Password</h2>
							
						<form method="post" >
							<div class="form-group">	
							  <input type="email" id="input" name="email" required="required"/>
							  <label class="control-label" for="input" >Email</label><i class="mtrl-select"></i>
							</div>
							<a href="login.php" title="" class="forgot-pwd">Login</a>
							<div class="submit-btns">
								<input type="submit" class="btn btn-primary" name="submit" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="js/script.js"></script>

</body>	

</html>

<?php 
include('connection.php');
if(isset($_POST['submit']))
{
	
	$email=$_POST['email'];
	$sel="select * from student where email='$_POST[email]'";
	$result = mysqli_query($con,$sel) or die(mysql_error());
	$row=mysqli_fetch_array($result);
	$email=$row['email'];
	$subject="Welcome To Student Learning";
	$title="Your Password";
	$msg="Greetings from Student Learning ASIET. \nYour Username is: $row[username] \nYour password is: $row[password]";
	include('mail.php');
}


?>