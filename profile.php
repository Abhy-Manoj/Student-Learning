<?php
include("connection.php");
include("header.php");

$sel=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$_SESSION[uid]'");
$row=mysqli_fetch_array($sel);

$sel2=mysqli_query($con,"SELECT * FROM `department` WHERE `id`='$row[department]'");
$row2=mysqli_fetch_array($sel2);


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
										<div class="personal">
											<h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
											<p>
												<?php echo $row1['about']; ?>
											</p>
										</div>
										<div class="d-flex flex-row mt-2">
											<ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
												<li class="nav-item">
													<a href="#basic" class="nav-link active" data-toggle="tab" >Basic info</a>
												</li>
												<li class="nav-item">
													<a href="#work" class="nav-link" data-toggle="tab" >work and education</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane fade show active" id="basic" >
													<ul class="basics">
														<li><i class="ti-user"></i>Name: <?php echo $row['name']; ?></li>
														<li><i class="ti-email"></i>Email: <?php echo $row['email']; ?></li>
														<li><i class="ti-mobile"></i>Phone: <?php echo $row['phone']; ?></li>
														<li><i class="ti-info-alt"></i>Gender: <?php echo $row['gender']; ?></li>
														<li><i class="ti-gift"></i>DOB: <?php echo $row['dob']; ?></li>
														<li><i class="ti-id-badge"></i>Username: <?php echo $row['username']; ?></li>
														
													</ul>
												</div>
												<div class="tab-pane fade" id="location" role="tabpanel">
													<div class="location-map">
														<div id="map-canvas"></div>
													</div>
												</div>
												<div class="tab-pane fade" id="work" role="tabpanel">
													<div>
														
														<a href="#" title="">Department</a>
														<p><?php echo $row2['name']; ?></p> 
														<a href="#" title="">Domain</a>
														<p><?php echo $row1['domain']; ?></p> 
														<a href="#" title="">Working Status</a>
														<p><?php echo $row1['working_status']; ?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
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