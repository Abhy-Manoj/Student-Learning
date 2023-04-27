<?php
error_reporting(0);
include("connection.php");




?>
<!--
<div class="widget friend-list stick-widget">
	<h4 class="widget-title">Friends</h4>
	
	<div id="searchDir"></div>
	<ul id="people-list" class="friendz-list">
		<?php
		$sel=mysqli_query($con,"SELECT * FROM `student`");
		while($row=mysqli_fetch_array($sel))
		{
		?>
		<li>
			<figure>
				<img src="admin/user_tbl/uploads/<?php echo $row['image']; ?>" alt="">
			</figure>
			<div class="friendz-meta">
				<a href="view_projects.php" ><?php echo $row['name'] ?></a>
			</div>
		</li>
		<li>
				</li>
		<?php
		}
		?>
	</ul>
</div><!-- friends list sidebar -->



<div class="widget friend-list stick-widget" >
	<aside class="sidebar static">
		
		<div class=" stick-widget" >
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
					<a href="chat.php?id=<?php echo $row['id'] ?>" title=""><?php echo $row['name'] ?></a>
				</li>

				<?php
		}
		?>
			</ul>
		</div><!-- Shortcuts -->
		
	</aside>
</div><!-- sidebar -->