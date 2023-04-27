<?php
include("connection.php");
include("header.php");

$sel=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$_SESSION[uid]'");
$row=mysqli_fetch_array($sel);

$sel1=mysqli_query($con,"SELECT * FROM `bio` WHERE `uid`='$_SESSION[uid]'");
$row1=mysqli_fetch_array($sel1);
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
									<div class="central-meta">
									<div class="editing-info">
										<h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>

										<form method="post">
											<div class="form-group half">	
											  <input type="text" id="input" required="required" value="<?php echo $row['name']; ?>" name="name"/>
											  <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" required="required" value="<?php echo $row['username']; ?>" name="username" readonly/>
											  <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="email" required="required" value="<?php echo $row['email']; ?>" name="email"/>
											  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" required="required" value="<?php echo $row['phone']; ?>" name="phone"/>
											  <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <select name="gender">
												<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
												<option value="">--select--</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											  </select>
											  <label class="control-label" for="input">Gender</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="date" required="required" value="<?php echo $row['dob']; ?>" name="dob"/>
											  <label class="control-label" for="input">Date of birth</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" required="required" value="<?php echo $row1['domain']; ?>" name="domain"/>
											  <label class="control-label" for="input">Domain</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <select name="ws">
												<option value="<?php echo $row['gender']; ?>"><?php echo $row1['working_status']; ?></option>
												<option value="">--select--</option>
												<option value="student">Student</option>
												<option value="working professional">Working Professional</option>
											  </select>
											  <label class="control-label" for="input">Working Status</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <textarea rows="4" id="textarea" required="required" name="about"><?php echo $row1['about']; ?></textarea>
											  <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
											</div>
											<div class="submit-btns">
												<a href="profile.php" class="btn btn-danger">Cancel</a>
												<input type="submit" class="btn btn-primary" name="update" name="update">
											</div>
										</form>
										<?php
										if(isset($_POST['update']))
										{
										$name=$_POST['name'];
										$email=$_POST['email'];
										$phone=$_POST['phone'];
										$gender=$_POST['gender'];
										$dob=$_POST['dob'];
										
										$domain=$_POST['domain'];
										$ws=$_POST['ws'];
										$about=$_POST['about'];
										
										$up1=mysqli_query($con,"UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`gender`='$gender',`dob`='$dob' WHERE `id`='$_SESSION[uid]'");
										//echo "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`gender`='$gender',`dob`='$dob' WHERE `id`='$_SESSION[uid]'";
										
										$up2=mysqli_query($con,"UPDATE `bio` SET `domain`='$domain',`working_status`='$ws',`about`='$about' WHERE `uid`='$_SESSION[uid]'");
										
											if ($up1 or $up2)
											{
											echo '<script>alert("Succesful!")
													  window.location="edit-profile.php";
													  </script>'; 
											}
										}
										
										?>
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