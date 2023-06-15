<?php
session_start();

include("header.php");
if ($_SESSION['user'] == "") {
	session_start();
	session_unset();
	session_destroy();
	header("location:login.php");
}
?>

<style>
	.btn-primary {
		color: #0069d9;
		background-color: #ffff;
		border-color: #0069d9
	}

	.btn-primary:hover {
		color: #fff;
		background-color: #0069d9;
		border-color: #0062cc
	}
</style>

<section>
	<div class="gap gray-bg" style='padding:30px;'>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<?php
						include("sidebar.php");
						?>
						<div class="col-lg-6">
							<?php
							include("chat_single.php");
							?>
						</div><!-- centerl meta -->
						<div class="col-lg-3">
							<aside class="sidebar static">
								<div class="widget stick-widget" style="border-radius: 10px;">
									<h4 class="widget-title">Chat</h4>
									<form method="post">

										<div class="form-group" style="margin-left: 20px; width: 85%;">
											<select name="dept">
												<option value="" selected disabled>Select Department</option>
												<?php
												$sel = mysqli_query($con, "SELECT * FROM `department`");
												while ($row = mysqli_fetch_array($sel)) {
													$selected = ($_POST['dept'] == $row['id']) ? 'selected' : '';
													echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
												}
												?>
											</select>
											<label class="control-label" for="input">Department</label><i class="mtrl-select"></i>
										</div>
										<input type="submit" required="required" class="form-control btn btn-primary" style="width: 85%; margin-left: 20px" name="search1" value="Search" readonly />
									</form>

									<div id="searchDir" style="padding: 20px;"></div>
									<ul id="people-list" style="padding: auto; margin-top: 0px; max-height: 360px;">
										<?php
										if (isset($_POST['search1'])) {
											$name = $_POST['name'];
											$dept = $_POST['dept'];
											$whereClause = "";
											if (!empty($name)) {
												$whereClause .= "name LIKE '%$name%' AND ";
											}
											if (!empty($dept)) {
												$whereClause .= "department = '$dept' AND ";
											}

											$whereClause = rtrim($whereClause, " AND ");
											$sel = mysqli_query($con, "SELECT * FROM `student` WHERE $whereClause");
											$rows = mysqli_num_rows($sel);

											if ($rows == 0) {
												echo "<p style='color:red;'>Not Found</p>";
											}
										} else {
											$sel = mysqli_query($con, "SELECT * FROM `student` WHERE id != '$_SESSION[uid]' ORDER BY username ASC");
										}

										while ($row = mysqli_fetch_array($sel)) {
										?>
											<li>
												<figure>
													<img src="admin/user_tbl/uploads/<?php echo $row['image']; ?>" alt="">
												</figure>
												<div class="friendz-meta">
													<a href="chat.php?id=<?php echo $row['id']; ?>" title=""><?php echo $row['name']; ?></a>
												</div>
											</li>
										<?php
										}
										?>
									</ul>
								</div>

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