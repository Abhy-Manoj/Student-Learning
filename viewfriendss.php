<?php
include("connection.php");
include("header.php");

$sel=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$_SESSION[uid]'");
$row=mysqli_fetch_array($sel);


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
								<aside class="sidebar static">
	<div class="widget">
	<h4 class="widget-title">Friends</h4>
	<form method="post">
		<div class="form-group">	
		  <input type="text" id="input" required="required" name="name"/>
		  <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
		</div>
		<div class="form-group">	
		  <select name="dept">
			<?php
			$sel=mysqli_query($con,"SELECT * FROM `department`");
			while($row=mysqli_fetch_array($sel))
			{
			?>
			<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			<?php
			}
			?>
		  </select>
		  <label class="control-label" for="input">Department </label><i class="mtrl-select"></i>
		</div>
		 <input type="submit" required="required" class="btn btn-primary" name="search"  value="search"readonly/>
	</form>
	<br>
	<ul class="naves">
	<?php
error_reporting(0);
include("connection.php");

if(isset($_POST['search']))
				{
					$name=$_POST['name'];
					$dept=$_POST['dept'];
					$sel=mysqli_query($con,"SELECT * FROM `student` where name='$name' and 	department='$dept'");
					//echo "SELECT * FROM `student` where name='$name' and 	department='$dept'";
					$rows=mysqli_num_rows($sel);
					if($rows==0)
					{
						echo "<p style='color:red;'>Not Found</p>";
					}
				}
				else{
				
				$sel=mysqli_query($con,"SELECT * FROM `student` where id!='$_SESSION[uid]'");
				}
				while($row=mysqli_fetch_array($sel))
				{


?>	
		<li>
			<i class="ti-user"></i>
			<a href="viewfriendss.php?id=<?php echo $row['id']; ?>" title=""><?php echo $row['name'];?></a>
		</li>
		<?php
}
		?>
		
	</ul>
</div>
									
</aside>
								
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="about">
															<?php
error_reporting(0);
include("connection.php");

if($_REQUEST['id'])
{
	$sel=mysqli_query($con,"SELECT * FROM `project` where uid='$_REQUEST[id]' and status='public' ");
}
else{
	
$sel=mysqli_query($con,"SELECT * FROM `project` where status='public'");
}
while($row=mysqli_fetch_array($sel))
{
//echo $row['title'];

	$sel1=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$row[uid]]'");
	$row1=mysqli_fetch_array($sel1);

?>	
	
		<div class="central-meta item">
			<div class="user-post">
				<div class="friend-info">
					<figure>
						<img src="admin/user_tbl/uploads/<?php echo $row1['image']; ?>" alt="">
					</figure>
					<div class="friend-name">
						<ins><a href="" title=""><?php echo $row1['name'] ?></a></ins>
						<span>published: <?php echo $row['date'] ?></span>
					</div>
					<div class="post-meta">
						<h5><?php echo $row['title'] ?></h5>
						<div class="description">
							<p><?php echo $row['keywords'] ?></p>
							Abstract
							<p><?php echo $row['abstract'] ?></p>

						</div>
						<div class="we-video-info">
							<ul>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
<?php
}
?>
									</div>
								</div>	
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
										<div class="central-meta">
									<div class="groups">
										<span><i class="fa fa-file-text-o"></i> Certificates</span>
									</div>
									<ul class="liked-pages">
										<?php
										if($_REQUEST['id'])
										{
											$sel=mysqli_query($con,"SELECT * FROM `certficates` where user_id='$_REQUEST[id]'");
										
										while($row=mysqli_fetch_array($sel))
										{
										?>
										<li>
											<div class="f-page">
												<figure>
													<a href="#" title=""><img src="certificates/<?php echo $row['image']; ?>" alt=""></a>
												</figure>
												<div class="page-infos">
													<h5><a href="#" title="">aws </a></h5>
													<span><a href="#" title="">Passed In 2020</a></span>
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