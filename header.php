<?php
error_reporting(0);

session_start();

?>
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

<style>
		.logout-link {
			font-family: "Muli", "Segoe Ui";
		}
	</style>

<body>
	<!--<div class="se-pre-con"></div>-->
	<div class="theme-layout">
		<div class="responsive-header">
			<!--<nav id="menu" class="res-menu">-->
			<ul>
				<li><span>Home</span>
				</li>
			</ul>
			<!--</nav>-->

		</div><!-- responsive header -->

		<div class="topbar stick">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" style="width:90; height:34;"></a>
			</div>

			<div class="top-area">
				<div class="user-img">
					<br>
				</div>
				<a href="index.php" title=""><i class="ti-home"></i> Home</a>
				&nbsp;&nbsp;&nbsp;
				<?php
				include("connection.php");
				$sel1 = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$_SESSION[uid]]'");
				$row1 = mysqli_fetch_array($sel1);
				?>
				<a href="profile.php"><i class="ti-user"> </i>
					<?PHP echo $row1['name']; ?>
				</a>
				&nbsp;&nbsp;&nbsp;
				<a href="logout.php"><i class="ti-power-off"></i> Logout</a>
					
			</div>
		</div><!-- topbar -->