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
								<div class="central-meta" style="border-radius: 10px;">
									<div class="editing-info">
										<h5 class="f-title"><i class="ti-info-alt"></i>Tech Blog</h5>

										<form method="post" enctype="multipart/form-data">
											<div class="form-group">	
											  <input type="text" id="input" name="title" required="required"/>
											  <label class="control-label" for="input">Title</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <input type="file" name="images"/>
											</div>
											<div class="form-group">	
											  <textarea rows="4" id="textarea" required="required" name="des" ></textarea>
											  <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
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
								$des=$_POST['des'];
								
								$x=str_replace(array('\'', '"'), '', $title);
								$y=str_replace(array('\'', '"'), '', $des);
								
								$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
								$a=$dateTime->format("F d, Y  H:i A"); 
								
								if($_FILES['images']['name']){
								move_uploaded_file($_FILES['images']['tmp_name'], "blog/".$_FILES['images']['name']);
								$img=$_FILES['images']['name'];
								//echo $img;
								}
								
								$up1=mysqli_query($con,"INSERT INTO `blog`(`uid`, `title`, `image`, `description`, `date`) VALUES('$_SESSION[uid]','$x','$img','$y','$a')");
								echo "INSERT INTO `blog`(`uid`, `title`, `image`, `description`, `date`) VALUES('$_SESSION[uid]','$title','$img','$des','$a')";
									if ($up1)
									{
									echo '<script>alert("Succesful!")
											  window.location="blog.php";
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