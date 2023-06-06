<?php
error_reporting(0);
include("connection.php");



if(isset($_POST['post']))
{
$comment=$_POST['comment'];
$project=$_POST['project'];

$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
$a=$dateTime->format("F d, Y  H:i A");

$up1=mysqli_query($con,"INSERT INTO `comment`(`user_id`, `comment`,`project_id`, `date`) VALUES ('$_SESSION[uid]','$comment','$project','$a')");

	if ($up1)
	{
	echo '<script>alert("Succesful!")
			  window.location="view_projects.php";
			  </script>'; 
	}
}
								
														
$myfile = fopen("project_id.txt", "w") or die("Unable to open file!");
$txt = $_REQUEST['id'];
fwrite($myfile, $txt);
fclose($myfile);														

$python = `python project_recommendation.py`;
//echo "<pre>".$python."</pre>";


$sel=mysqli_query($con,"SELECT * FROM `project` where id='$_REQUEST[id]'");
$row=mysqli_fetch_array($sel);

$_SESSION['pid']=$_REQUEST['id'];
$a=$_SESSION['pid'];
//echo $a;


//echo $row['title'];
	$sel1=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$row[uid]]'");
	$row1=mysqli_fetch_array($sel1);
	
	$sel2=mysqli_query($con,"SELECT * FROM `comment` where project_id='$row[id]]'");
	$row2=mysqli_fetch_array($sel2);
	
/*
if($_REQUEST['rid'])
{
	$pid=$_REQUEST['rid'];
	$re=mysqli_query($con,"INSERT INTO `report`(`user_id`, `project_id`) VALUES('$_SESSION[uid]','$pid')");
	//header('location:view_projects.php');
	echo "<script>window.location='view_projects.php';</script>"
}
*/

?>	
	
		<div class="central-meta item">
			<div class="user-post">
				<div class="friend-info">
					<figure>
						<img src="admin/user_tbl/uploads/<?php echo $row1['image']; ?>" alt="">
					</figure>
					<div class="friend-name">
						<ins><a href="frnd-prof.php?id=<?php echo $row1['id']; ?> "title=""><?php echo $row1['name'] ?></a></ins>
						<span>published: <?php echo $row['date'] ?></span>
					</div>
					<div class="post-meta">
						<h5><?php echo $row['title'] ?></h5>
						<div class="description">
							<p><?php echo $row['abstract'] ?></p>
						</div>
						<div class="description">
							<a href="projects/<?php echo $row['file'] ?>" download><img src="images/download.png" style="width: 71px;"></a>
						</div>
						<br>
					</div>
					<br>
					<div class="coment-area">
						<ul class="we-comet">
							
							<?php
							$sel2=mysqli_query($con,"SELECT * FROM `comment` where project_id='$row[id]]'");
							while($row2=mysqli_fetch_array($sel2))
							{
								$sel3=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$row2[user_id]'");
								$row3=mysqli_fetch_array($sel3);
							?>
							<li>
								<div class="we-comment" style="width:650px;">
									<div class="coment-head">
										<h5><a href="time-line.html" title=""><?php echo $row3['name'] ?></a></h5>
										<span><?php echo $row2['date'] ?></span>
										<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
									</div>
									<p><?php echo $row2['comment'] ?></p>
								</div>
							</li>
							<?php
							}
							?>
							<li class="post-comment">
								<div class="post-comt-box"> <br>
									<form method="post">
										<input type="hidden" name="project" value="<?php echo $row['id'] ?>">
										<textarea placeholder="Post your comment" name="comment"></textarea> <br>
										<input type="submit" value="Post" name="post" class="btn btn-primary">
									</form>	
								</div>
							</li>
						</ul>
					</div>			
				</div>
			</div>
		</div>
		
		
		<div class="central-meta item">
			<div class="user-post">
				<h5>Recommended Projects</h5>
				
				<?php
				$myfile = fopen("project_recomm.txt", "r") or die("Unable to open file!");
				$a=fread($myfile,filesize("project_recomm.txt"));
				fclose($myfile);
				//echo $a;
				
				$bb=trim($a, "[");
				$bb=trim($bb, "]");
				$b=explode(",",$bb);
				$i = 0;
				foreach ($b as $value) {
				
				//echo $value."<br>";
				
				$x= $x."id=$value OR ";
				
				//echo $x;
				}
				
				$sel="select * from project where $x id='1000000'";
				//echo $sel;
				
				$res=mysqli_query($con,$sel);
				while($row=mysqli_fetch_array($res))
				{
					$sel1=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$row[uid]]'");
				$row1=mysqli_fetch_array($sel1);
				
				
				?>
				
			<div class="tab-content">
			  <div class="tab-pane active fade show " id="frends" >
				<ul class="nearby-contct">
				<li>
					<div class="nearly-pepls">
						<figure>
							<a href="" title=""><img src="images/a.png" alt=""></a>
						</figure>
						<div class="pepl-info">
							<h4><a title=""><?php echo $row['title'] ?></a></h4>
							<span><?php echo $row1['name'] ?> | published: <?php echo $row['date'] ?></span>
							<a href="project_single.php?id=<?php echo $row['id'];?>" title="" class="add-butn" data-ripple="">View More	</a>
						</div>
					</div>
				</li>
				</ul>	
			  </div>
			</div>
			<?php
				}
				?>
		</div>
	</div>
		
		
		
	
<?php

?>
							