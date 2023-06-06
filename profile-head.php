<section>
	<div class="feature-photo">
		<?php
		$sel1 = mysqli_query($con, "SELECT * FROM `bio` WHERE `uid`='$_SESSION[uid]'");
		$row1 = mysqli_fetch_array($sel1);
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
		<div class="add-btn">
			<span></span>
		</div>
		<form class="edit-phto" method="POST" enctype="multipart/form-data">
			<i class="fa fa-camera-retro"></i>
			<label class="fileContainer">
				Edit Cover Photo
				<input type="file" name="file" required />
			</label>
			<input type="submit" name="submit1" class="btn btn-danger" value="upload">
		</form>
		<?php
		if (isset($_POST['submit1'])) {
			//include("connection.php");
			if ($_FILES['file']['name']) {
				$target_path = "admin/user_tbl/uploads/";

				$target_path = $target_path . basename($_FILES['file']['name']);
				$target_path1 = basename($_FILES['file']['name']);

				move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

				$sql6 = "UPDATE `bio` SET `cover_image`='$target_path1' WHERE `uid` ='$_SESSION[uid]'";
				//echo $sql5;
				$res = mysqli_query($con, $sql6);
				echo "<script>window.location='profile.php';</script>";

			}
		}
		?>
		<div class="container-fluid">
			<div class="row merged">
				<div class="col-lg-2 col-sm-3">
					<div class="user-avatar">
						<figure>
							<img src="admin/user_tbl/uploads/<?php echo $row['image']; ?>" alt="">
							<form class="edit-phto" method="POST" enctype="multipart/form-data">
								<i class="fa fa-camera-retro"></i>
								<label class="fileContainer">
									Edit Display Photo
									<input type="file" name="uploadedfile" />

								</label>
								<input type="submit" name="submit" class="btn btn-danger" value="upload">
							</form>
							<?php
							if (isset($_POST['submit'])) {
								//include("connection.php");
								if ($_FILES['uploadedfile']['name']) {
									$target_path = "admin/user_tbl/uploads/";

									$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
									$target_path1 = basename($_FILES['uploadedfile']['name']);

									move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);

									$sql5 = "UPDATE `student` SET `image`='$target_path1' WHERE `id` ='$_SESSION[uid]'";
									//echo $sql5;
									$res = mysqli_query($con, $sql5);

								}
							}
							?>
						</figure>
					</div>
				</div>
				<div class="col-lg-10 col-sm-9">
					<div class="timeline-info">
						<ul>
							<li class="admin-name">
								<h5>
									<?php echo $row['name']; ?>
								</h5>
								<span></span>
							</li>
							<li>
								<a class="" href="viewtimeline.php" title="" data-ripple="">timeline</a>
								<a class="" href="viewfriendss.php" title="" data-ripple="">Friends</a>
								<a class="" href="profile.php" title="" data-ripple="">about</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- top area -->