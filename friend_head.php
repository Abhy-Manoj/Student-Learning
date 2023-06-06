<?php
include("connection.php");

$sel = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$_REQUEST[id]'");
$row = mysqli_fetch_array($sel);

?>

<section>
		<div class="feature-photo">
			<?php
			$sel1=mysqli_query($con,"SELECT * FROM `bio` WHERE `uid`='$_REQUEST[id]'");
			$row1=mysqli_fetch_array($sel1);
			$filename = "admin/user_tbl/uploads/" . $row1['cover_image'];

		// Check if the cover image exists and is not empty
		if (!empty($row1['cover_image']) && file_exists($filename)) {
			?>
			<figure><img src="<?php echo $filename; ?>" alt=""></figure>
			<?php
		} else {
			?>
			<figure><img src="admin/user_tbl/uploads/timeline-1.jpg" alt=""></figure>
			<?php
		}
		?>
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>
								<img src="admin/user_tbl/uploads/<?php echo $row['image']; ?>" alt="">
							</figure>
						</div>
					</div>
					<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5><?php echo $row['name']; ?></h5>
								  <span></span>
								</li>
								<!-- <li>
									<a class="" href="fprofile.php" title="" data-ripple="">about</a>
								</li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- top area -->