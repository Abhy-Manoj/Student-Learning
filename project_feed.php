<?php
error_reporting(0);
include("connection.php");

?>

<style>
.nearby-contct.fixed-height {
    max-height: 355px;
    overflow-y: auto;
}

.nearby-contct.fixed-height::-webkit-scrollbar {
    width: 5px; /* Adjust the width as needed */
    background-color: transparent; /* Set the background color of the scrollbar to transparent */
}

.nearby-contct.fixed-height::-webkit-scrollbar-thumb {
    background-color: transparent; /* Set the color of the scrollbar thumb */
    border-radius: 4px; /* Adjust the border radius as needed */
}

.nearby-contct.fixed-height:hover::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.3); /* Set the color of the scrollbar thumb on hover */
}

.nearby-contct.fixed-height::-webkit-scrollbar-track {
    background-color: transparent; /* Set the background color of the scrollbar track to transparent */
}
</style>

<div class="col-lg-12">
	<div class="central-meta" style="border-radius: 10px; margin-bottom: 0px; padding-top: 10px; padding-bottom: 5px;">
		<div class="frnds">
			<ul class="nav nav-tabs">
				 <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Projects</a> </li>
			</ul>
			<form method="post">
				<div class="form-group">	
				  <input type="text" id="input" required="required" name="name"/>
				  <label class="control-label" for="input">Enter Keywords</label><i class="mtrl-select"></i>
				</div>
				 <input type="submit" required="required" class="btn btn-primary" name="search"  value="Search"readonly/>
			</form>
			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active fade show " id="frends" >
				<ul class="nearby-contct fixed-height" style="margin-top:15px">
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
				$sel=mysqli_query($con,"SELECT * FROM project where status='public' order by date desc");
			}
				
			while($row=mysqli_fetch_array($sel))
			{
			//echo $row['title'];
				$sel1=mysqli_query($con,"SELECT * FROM `student` WHERE `id`='$row[uid]]'");
				$row1=mysqli_fetch_array($sel1);
				
				$sel2=mysqli_query($con,"SELECT * FROM `comment` where project_id='$row[id]]'");
				$row2=mysqli_fetch_array($sel2);
			
			?>
	

				
				<li style="border-radius: 10px;">
					<div class="nearly-pepls">
						<figure>
							<a href="" title=""><img src="images/a.png" alt=""></a>
						</figure>
						<div class="pepl-info">
							<h4><a title=""><?php echo $row['title'] ?></a></h4>
							<span><?php echo $row1['name'] ?> | published: <?php echo $row['date'] ?></span>
							<a href="project_single.php?id=<?php echo $row['id'] ?>" title="" class="add-butn" style="border-radius: 3px;" data-ripple=""><i class="ti-eye"></i></a>
							<?php
							if($_SESSION['uid']==$row1['id'])
							{
							?>
							<a href="editproject.php?id=<?php echo $row['id'] ?>" title="" class="add-butn more-action" style="border-radius: 5px;" data-ripple=""><i class="ti-pencil-alt"></i></a>
							<a href="delete.php?id=<?php echo $row['id'] ?>" title="" class="add-butn danger " data-ripple="" style="margin-right:45px; border-radius: 5px; background: #cd0808;"><i class="ti-trash"></i></a>
							<?php
							}
							else{
								
							}
							?>						
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