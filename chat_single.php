<?php
error_reporting(0);
include("connection.php");



if(isset($_POST['ccc']))
			{
				$date=date('Y-m-d H:m:s');
				mysqli_query($con,"INSERT INTO chat(sid,message,date_time,userid) VALUES('$_SESSION[uid]','$_POST[msgd]','$date','$_REQUEST[id]')");
				header("location:chat.php");
			}
				
if(isset($_POST['ccc1']))
				{
					$date=date('Y-m-d H:m:s');
					mysqli_query($con,"UPDATE chat  SET reply='$_POST[replay]',reply_date='$date' WHERE id='$_POST[cid]'");
					header("location:chat.php");
				}				


?>	
	
		<div class="central-meta item">
			<div class="user-post">
				<div class="friend-info">
					   <section class="section">
        <div class="container">
            <div class="row justify-content-between">               
                <div class="col-md-6 col-lg-5 align-self-center">
                    <h6 class="title">Message Now</h6>
                    <form action="" method="post">
				Enter Message
				<textarea class='form-control' name='msgd' required></textarea>
				<br>
				<input type='submit' class='btn btn-primary' name='ccc' value='send'>
				</form>                 
                </div>
                <div class="col-md-5 mt-4 mt-md-0">
                <?php
               
                    $sel="SELECT * FROM chat where userid='$_REQUEST[id]' order by id desc";
                    $result = mysqli_query($con,$sel);
                    $rows = mysqli_num_rows($result);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<div class='col-md-12' style='background-color:#8b9595; text-align:right'><b>$row[message]</b><br> Date: $row[date_time]</div><br>";
                        echo "<div class='col-md-12' style='background-color:#8b9595; text-align:left'>Replay<br><b>$row[reply]</b><br> Date: $row[reply_date]</div><br><br><br>";
                    }
			
			    ?>
                </div>
            </div>
        </div>
    </section>
	
	
	<section class="section">
			<div class="container">
				<div class="row justify-content-between">  
					<div class="col-md-5 mt-4 mt-md-0" style="margin-left: 380px; ">
					<?php
						$sel="SELECT * FROM chat where userid='$_SESSION[uid]' and sid='$_REQUEST[id]' order by id desc";
						//echo $sel;
						$result = mysqli_query($con,$sel);
						$rows = mysqli_num_rows($result);
						while($row=mysqli_fetch_array($result))
						{
							echo "<div class='col-md-12' style='background-color:#cccccc;'><br><br>";
							$sel2="SELECT * FROM student WHERE id='$row[userid]'";
							$result2 = mysqli_query($con,$sel2);
							$rows2 = mysqli_fetch_array($result2);
							
							if($row['reply']=="")
							{
								echo "<div class='col-md-12' style='background-color:#9d9494; text-align:right'><b>$row[message]</b><br>User : $rows2[name] &nbsp; &nbsp; Date: $row[date_time]</div><br>";
					?>
								<form action="" method="post">
								Enter Reply
									<textarea class='form-control' name='replay'></textarea>
									<input type='hidden' name='cid' value='<?php echo $row['id']; ?>' />
									<br>
									<input type='submit' class='btn btn-primary' name='ccc1' value='send'>
									<br>
									<br>
								</form>  
					<?php   
						echo"</div><br><br>";
							}
							else{

								echo "<div class='col-md-12' style='background-color:#9d9494; text-align:right'><b>$row[message]</b><br>User : $rows2[name] &nbsp; &nbsp; Date: $row[date_time]</div><br>";

								echo "<div class='col-md-12' style='background-color:#9d9494; text-align:left'>Reply<br><b>$row[reply]</b><br> Date: $row[reply_date]</div><br><br><br>";
								
								echo"</div><br><br>";

							}
						}
					?>
					</div>
				</div>
			</div>
		</section>
		
				</div>
			</div>
		</div>
	
<?php

?>
							