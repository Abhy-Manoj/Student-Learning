<?php
include("connection.php");

$sel = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$_REQUEST[id]'");
$row = mysqli_fetch_array($sel);

?>

<style>
  .message-container {
    display: flex; /* Set the container to use flexbox */
    align-items: center; /* Center the items vertically */
  }

  .message-sticker {
    margin-right: 7px; /* Add some margin between the sticker and text */
  }

  .timeline-info ul li {
    margin-right: 15x; /* Adjust the margin to reduce horizontal space */
  }
</style>

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
								<li>
								<div class="message-container">
  								<div class="message-sticker">
								<i class="ti-comment"></i>
								</div>
									<a class="" href="chat.php?id=<?php echo $row['id'] ?>" title="" data-ripple="">Message</a>
								</div>
								</li>
								<li>
								<div class="message-container">
								<div class="message-sticker">
								<i class="ti-desktop"></i>
								</div>
									<a class="" href="frnd-prof.php?id=<?php echo $row['id']; ?>" title="" data-ripple="">Timeline</a>
								</div>
								</li>
								<li>
								<div class="message-container">
								<div class="message-sticker">
								<i class="ti-user"></i>
								</div>
									<a class="" href="fprofile.php?id=<?php echo $row['id'] ?>" title="" data-ripple="">about</a>
								</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- top area -->