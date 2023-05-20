<?php
include("connection.php");
include("header.php");

// Check if the blog ID is provided for editing
if (isset($_GET['id'])) {
	$blogId = $_GET['id'];

	// Retrieve the blog details from the database
	$blogQuery = mysqli_query($con, "SELECT * FROM `blog` WHERE `id` = '$blogId'");
	$blogData = mysqli_fetch_assoc($blogQuery);
}

?>

<section>
	<div class="gap gray-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<?php
						include("sidebar.php");
						?>

						<div class="col-lg-6">
							<div class="central-meta">
								<div class="editing-info">
									<h5 class="f-title"><i class="ti-info-alt"></i>Tech Blog</h5>

									<form method="post" enctype="multipart/form-data">
										<div class="form-group">
											<input type="text" id="input" name="title" required="required" value="<?php echo isset($blogData['title']) ? $blogData['title'] : ''; ?>" />
											<label class="control-label" for="input">Title</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group">
											<input type="file" name="images" />
											<?php if (isset($blogData['image']) && !empty($blogData['image'])) : ?>
												<a href="blog/<?php echo $blogData['image']; ?>" download><?php echo $blogData['image']; ?></a>
											<?php endif; ?>
										</div>
										<div class="form-group">
											<textarea rows="4" id="textarea" required="required" name="des"><?php echo isset($blogData['description']) ? $blogData['description'] : ''; ?></textarea>
											<label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
										</div>

										<div class="submit-btns">
											<a href="viewtimeline.php" class="btn btn-danger">Cancel</a>
											<input type="submit" class="btn btn-primary" name="submit" value="<?php echo isset($blogData) ? 'Update' : 'Submit'; ?>">
										</div>
									</form>
								</div>
							</div>
						</div>

						<?php
						if (isset($_POST['submit'])) {
							$title = $_POST['title'];
							$des = $_POST['des'];

							$x = str_replace(array('\'', '"'), '', $title);
							$y = str_replace(array('\'', '"'), '', $des);

							$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
							$a = $dateTime->format("F d, Y  H:i A");

							if ($_FILES['images']['name']) {
								move_uploaded_file($_FILES['images']['tmp_name'], "blog/" . $_FILES['images']['name']);
								$img = $_FILES['images']['name'];
							} else {
								$img = isset($blogData['image']) ? $blogData['image'] : '';
							}

							if (isset($blogData)) {
								// Update existing blog
								$updateQuery = mysqli_query($con, "UPDATE `blog` SET `title`='$x', `image`='$img', `description`='$y', `date`='$a' WHERE `id`='$blogId'");
								if ($updateQuery) {
									echo '<script>alert("Blog updated successfully!")
											window.location="viewtimeline.php";
											</script>';
								}
							} else {
								// Insert new blog
								$insertQuery = mysqli_query($con, "INSERT INTO `blog`(`uid`, `title`, `image`, `description`, `date`) VALUES('$_SESSION[uid]','$x','$img','$y','$a')");
								if ($insertQuery) {
									echo '<script>alert("Blog added successfully!")
											window.location="blog.php";
											</script>';
								}
							}
						}
						?>

						<div class="col-lg-3">
							<aside class="sidebar static">
								<?php
								include("friends.php")
								?>
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
