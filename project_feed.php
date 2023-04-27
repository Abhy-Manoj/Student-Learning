<?php
error_reporting(0);
include("connection.php");

?>

<div class="col-lg-12">
	<div class="central-meta">
		<div class="frnds">
			<ul class="nav nav-tabs">
				 <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Projects</a> </li>
			</ul>
			<form method="post">
				<div class="form-group">	
				  <input type="text" id="input" required="required" name="name"/>
				  <label class="control-label" for="input">Enter Keywords</label><i class="mtrl-select"></i>
				</div>
				 <input type="submit" required="required" class="btn btn-primary" name="search"  value="search"readonly/>
			</form>
			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active fade show " id="frends" >
				<ul class="nearby-contct">
			<?php
			if(isset($_POST['search']))
			{
				$queried = mysql_real_escape_string($_POST['name']); // always escape

				$keys = explode(" ",$queried);

				$sql = "SELECT * FROM project WHERE keywords LIKE '%$queried%' ";

				foreach($keys as $k){
					$sql .= " OR keywords LIKE '%$k%' ";
				}
				//echo $sql;
				$sel = mysqli_query($con,$sql);
				$rows=mysqli_num_rows($sel);
				if($rows==0)
				{
					echo "<p style='color:red;'>Not Found</p>";
				}
				
			}
			else{
				$sel=mysqli_query($con,"SELECT * FROM project where status='public'");
			}
				
			while($row=mysqli_fetch_array($sel))
			{
			//echo $row['title'];
				$sel1=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$row[uid]]'");
				$row1=mysqli_fetch_array($sel1);
				
				$sel2=mysqli_query($con,"SELECT * FROM `comment` where project_id='$row[id]]'");
				$row2=mysqli_fetch_array($sel2);
			
			?>
	

				
				<li>
					<div class="nearly-pepls">
						<figure>
							<a href="" title=""><img src="images/a.png" alt=""></a>
						</figure>
						<div class="pepl-info">
							<h4><a title=""><?php echo $row['title'] ?></a></h4>
							<span><?php echo $row1['name'] ?> | published: <?php echo $row['date'] ?></span>
							<a href="project_single.php?id=<?php echo $row['id'] ?>" title="" class="add-butn" data-ripple="">View More	</a>
							<a href="editproject.php?id=<?php echo $row['id'] ?>" title="" class="add-butn more-action" data-ripple="">Edit</a>
						</div>
					</div>
				</li>
			<?php
			}
			?>
				
				
			</ul>	
			  </div>
			</div>
		</div>
	</div>	
</div><!-- centerl meta -->