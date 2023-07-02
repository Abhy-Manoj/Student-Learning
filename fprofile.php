<?php
include("connection.php");
include("header.php");

$sel = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$_REQUEST[id]'");
$row = mysqli_fetch_array($sel);

$sel2 = mysqli_query($con, "SELECT * FROM `department` WHERE `id`='$row[department]'");
$row2 = mysqli_fetch_array($sel2);

$sel3 = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$_REQUEST[id]");
$row3 = mysqli_fetch_array($sel3);

?>

<?php
include("friend_head.php");
$sel1 = mysqli_query($con, "SELECT * FROM `bio` WHERE `uid`='$_REQUEST[id]'");
$row1 = mysqli_fetch_array($sel1);
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
	<div class="gap gray-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<div class="col-lg-3">
							<aside class="sidebar static">
								<div class="widget stick-widget" style="border-radius: 10px;">
									<h4 class="widget-title">Friends</h4>
									<form method="post">

										<div class="form-group" style="margin-left: 20px; width: 85%;">
											<select name="dept">
												<option value="" selected disabled>Select Department</option>
												<?php
												$sel = mysqli_query($con, "SELECT * FROM `department`");
												while ($row3 = mysqli_fetch_array($sel)) {
													$selected = ($_POST['dept'] == $row3['id']) ? 'selected' : '';
													echo '<option value="' . $row3['id'] . '" ' . $selected . '>' . $row3['name'] . '</option>';
												}
												?>
											</select>
											<label class="control-label" for="input">Department</label><i
												class="mtrl-select"></i>
										</div>
										<input type="submit" required="required" class="form-control btn btn-primary"
											style="width: 85%; margin-left: 20px" name="search1" value="Search"
											readonly />
									</form>

									<div id="searchDir" style="padding: 20px;"></div>
									<ul id="people-list" style="padding: auto; margin-top: 0px">
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
											$sel3 = mysqli_query($con, "SELECT * FROM `student` WHERE $whereClause");
											$rows = mysqli_num_rows($sel3);

											if ($rows == 0) {
												echo "<p style='color:red;'>Not Found</p>";
											}
										} else {
											$sel3 = mysqli_query($con, "SELECT * FROM `student` WHERE id != '$_SESSION[uid]' ORDER BY username ASC");
										}

										while ($row3 = mysqli_fetch_array($sel3)) {
											?>
											<li>
												<figure>
													<img src="admin/user_tbl/uploads/<?php echo $row3['image']; ?>" alt="">
												</figure>
												<div class="friendz-meta">
													<a href="frnd-prof.php?id=<?php echo $row3['id']; ?>" title=""><?php echo $row3['name']; ?></a>
												</div>
											</li>
											<?php
										}
										?>
									</ul>
								</div>

							</aside>
						</div><!-- sidebar -->
						<div class="col-lg-6">
							<div class="central-meta" style="border-radius: 10px;">
								<div class="about">
									<div class="personal">
										<h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
										<p>
											<?php echo $row1['about']; ?>
										</p>
									</div>
									<div class="d-flex flex-row mt-2" style="border-radius: 10px;">
										<ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
											<li class="nav-item">
												<a href="#basic" class="nav-link active" data-toggle="tab" style="border-top-left-radius: 5px;">Basic
													info</a>
											</li>
											<li class="nav-item">
												<a href="#work" class="nav-link" data-toggle="tab" style="border-bottom-left-radius: 5px;">Work & Education</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade show active" id="basic">
											<ul class="basics"style="padding-left: 40px;">
													<li style="margin-bottom: 15px;"><i class="ti-user"></i>Name:
														<?php echo $row['name']; ?>
													</li>
													<li style="margin-bottom: 15px;"><i class="ti-email"></i>Email:
														<?php echo strtolower($row['email']); ?>
													</li>
													<li style="margin-bottom: 15px;"><i class="ti-mobile"></i>Phone:
														<?php echo $row['phone']; ?>
													</li>
													<li style="margin-bottom: 15px;"><i class="ti-info-alt"></i>Gender:
														<?php echo $row['gender']; ?>
													</li>
													<li style="margin-bottom: 15px;"><i class="ti-gift"></i>DOB:
														<?php echo $row['dob']; ?>
													</li>
													<li style="margin-bottom: 15px;"><i class="ti-id-badge"></i>Username:
														<?php echo $row['username']; ?>
													</li>

												</ul>
											</div>
											<div class="tab-pane fade" id="location" role="tabpanel">
												<div class="location-map">
													<div id="map-canvas"></div>
												</div>
											</div>
											<div class="tab-pane fade" id="work" role="tabpanel"style="padding-left: 40px;">
												<div>

													<a href="#" title="">Department</a>
													<p>
														<?php echo $row2['name']; ?>
													</p>
													<a href="#" title="">Domain</a>
													<p>
														<?php echo $row1['domain']; ?>
													</p>
													<a href="#" title="">Working Status</a>
													<p>
														<?php echo $row1['working_status']; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- centerl meta -->
						<div class="col-lg-3">
							<aside class="sidebar static">
								<div class="central-meta" style="width:fit-content; border-radius: 10px;">
									<div class="groups">
										<span><i class="fa fa-file-text-o"></i> Certificates</span>
									</div>
									<ul class="liked-pages" style="width:100%">
										<?php
										if ($_REQUEST[id]) {
											$sel = mysqli_query($con, "SELECT * FROM `certficates` where user_id='$_REQUEST[id]'");
											while ($row = mysqli_fetch_array($sel)) {
												?>
												<li">
													<div class="f-page">
														<figure>
															<a href="#" title=""><img src="certificates/<?php echo $row['image']; ?>" alt="" style="border-radius: 5px;"></a>
														</figure>
														<div class="page-infos">
															<h5><a href="#" title=""><?php echo $row['title']; ?></a></h5>
															<span><a href="#" title=""><?php echo $row['description']; ?></a></span>
														</div>
													</div>
												</li>
												<?php
											}
										}
										?>
									</ul>
								</div><!-- photos -->
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