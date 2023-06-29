<?php
include("connection.php");
include("header.php");

$sel=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$_SESSION[uid]'");
$row=mysqli_fetch_array($sel);
?>
	
	<?php
	include("profile-head.php");
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
							<div class="central-meta" style="border-radius: 10px;">
								<div class="editing-info">
									<h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>
									
									<form method="post">
										<div class="form-group">	
										  <input type="password" value="<?php echo $row['password']; ?>" readonly />
										  <label class="control-label" for="input">Current password</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group">	
										  <input type="password" id="input" required="required"/>
										  <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
										</div>
										<div class="form-group">	
										  <input type="password" required="required"/>
										  <label class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
										</div>
										<div class="submit-btns">
											<button type="button" class="mtr-btn"><span>Cancel</span></button>
											<button type="button" class="mtr-btn"><span>Update</span></button>
										</div>
									</form>
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