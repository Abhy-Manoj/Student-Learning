<?php
include("connection.php");
include("header.php");

$sel=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$_SESSION[uid]'");
$row=mysqli_fetch_array($sel);


?>
	
	<?php
	include("profile-head.php");
	$sel1=mysqli_query($con,"SELECT * FROM `bio` WHERE `uid`='$_SESSION[uid]'");
$row1=mysqli_fetch_array($sel1);
	?>
		
	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<?php
								include("profile-sidebar.php")
								?>
								
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="about">
									<?php
error_reporting(0);
include("connection.php");


$sel=mysqli_query($con,"SELECT * FROM `project` where uid='$_SESSION[uid]'");
while($row=mysqli_fetch_array($sel))
{
//echo $row['title'];
	$sel1=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$row[uid]]'");
	$row1=mysqli_fetch_array($sel1);

?>	
	
		<div class="central-meta item">
			<div class="user-post">
				<div class="friend-info">
					<figure>
						<img src="admin/user_tbl/uploads/<?php echo $row1['image']; ?>" alt="">
					</figure>
					<div class="friend-name">
						<ins><a href="" title=""><?php echo $row1['name'] ?></a></ins>
						<span>published: <?php echo $row['date'] ?></span>
					</div>
					<div class="post-meta">
						<h5><?php echo $row['title'] ?></h5>
						<div class="description">
							<p><?php echo $row['keywords'] ?></p>
							Abstract
							<p><?php echo $row['abstract'] ?></p>

						</div>
						<div class="we-video-info">
							<ul>
								<!--<li>
									<span class="like" data-toggle="tooltip" title="like">
										<i class="ti-heart"></i>
										<ins>2.2k</ins>
									</span>
								</li>
								<li>
									<span class="dislike" data-toggle="tooltip" title="dislike">
										<i class="ti-heart-broken"></i>
										<ins>200</ins>
									</span>
								</li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
<?php
}
?>
								</div>	
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

<?php
include("footer.php");
?>