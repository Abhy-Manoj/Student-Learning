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
										<h5 class="f-title"><i class="ti-info-alt"></i>Upload Certicates</h5>

										<form method="post" enctype="multipart/form-data">
											<div class="form-group">	
											  <input type="text" id="input" name="title" required="required"/>
											  <label class="control-label" for="input">Title</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <input type="file" required="required" name="images"/>
											</div>
											<div class="form-group">	
											  <input type="text" id="input" name="des" required="required"/>
											  <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
											</div>
											
											<div class="submit-btns">
												<input type="submit" class="btn btn-primary" name="submit">
											</div>
										</form>
									</div>
									
									<?php
										if(isset($_POST['submit']))
										{
											echo "zcc";
										$title=$_POST['title'];
										$des=$_POST['des'];
										
										$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
										$a=$dateTime->format("F d, Y  H:i A"); 
										
										if($_FILES['images']['name']){
										move_uploaded_file($_FILES['images']['tmp_name'], "certificates/".$_FILES['images']['name']);
										$img=$_FILES['images']['name'];
										//echo $img;
										}
										
										$up1=mysqli_query($con,"INSERT INTO `certficates`(`user_id`, `title`, `description`, `image`) VALUES ('$_SESSION[uid]','$title','$des','$img')");
											if ($up1)
											{
											echo '<script>alert("Succesful!")
													  window.location="certificates.php";
													  </script>'; 
											}
										}
										
									?>
									
								</div>

								<div class="central-meta" style="border-radius: 10px;">
									<div class="groups">
										<span><i class="fa fa-file-text-o"></i> My Certificates</span>
									</div>
									<ul class="liked-pages">
										
										<?php
										$sel=mysqli_query($con,"SELECT * FROM `certficates` WHERE `user_id`='$_SESSION[uid]'");
										while($row=mysqli_fetch_array($sel))
										{			
											//echo $row['image'];
										?>
										<li>
											<div class="f-page">
												<figure>
													<a href="#" title=""><img src="certificates/<?php echo $row['image']; ?>" style="width:218px; height:194px;" alt=""></a>
												</figure>
												<div class="page-infos">
													<h5><a href="#" title=""><?php echo $row['title']; ?></a></h5>
													<span><a href="#" title=""><?php echo $row['description']; ?></a>
													<a href="dlt_certi.php?id=<?php echo $row['id'] ?>" title="" class="add-butn danger " data-ripple="" style="border-radius: 5px; margin-right:6px; background: #cd0808;"><i class="ti-trash"></i></a>
													</span>
												</div>
											</div>
										</li>
										
										<?php
										}
										?>
									</ul>
								</div><!-- photos -->
							</div>
							
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