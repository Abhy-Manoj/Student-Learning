<?php
include("connection.php");
include("header.php");
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
										<h5 class="f-title"><i class="ti-info-alt"></i> project Post</h5>

										<form method="post" enctype="multipart/form-data">
											<div class="form-group">	
											  <input type="text" id="input" name="title" required="required"/>
											  <label class="control-label" for="input">Title</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <input type="text" required="required" name="keywords"/>
											  <label class="control-label" for="input">Keywords</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <textarea rows="4" id="textarea" required="required" name="abstract" ></textarea>
											  <label class="control-label" for="textarea">Abstract</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">
											  <label>Document</label>
											  <input type="file" required="required" name="file"/>
											  
											</div>
											<div class="form-group">	
											  <select name="status" >
												<option value="public">Public</option>
												  <option value="private">Private</option>
											  </select>
											</div>
											
											<div class="submit-btns">
												<a href="index.php" class="btn btn-danger">Cancel</a>
												<input type="submit" class="btn btn-primary" name="submit">
											</div>
										</form>
									</div>
								</div>	
							</div>
							<?php
								if(isset($_POST['submit']))
								{
									//echo "zcc";
								$title=$_POST['title'];
								$keywords=$_POST['keywords'];
								$abstract=$_POST['abstract'];
								$status=$_POST['status'];
								
								$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
								$a=$dateTime->format("F d, Y  H:i A"); 
								
								if($_FILES['file']['name']){
								move_uploaded_file($_FILES['file']['tmp_name'], "projects/".$_FILES['file']['name']);
								$img=$_FILES['file']['name'];
								echo $img;
								}
								
								$up1=mysqli_query($con,"INSERT INTO `project`(`uid`, `title`, `keywords`, `abstract`,`file`,`date`, `status`) VALUES('$_SESSION[uid]','$title','$keywords','$abstract','$img','$a','$status')");
								//echo "INSERT INTO `project`(`uid`, `title`, `keywords`, `abstract`, `status`) VALUES('$_SESSION[uid]','$title','$keywords','$abstract','$status')";
									if ($up1)
									{
									echo '<script>alert("Succesful!")
											  window.location="upload_project.php";
											  </script>'; 
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