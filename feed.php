<?php
error_reporting(0);
include("connection.php");


$sel = mysqli_query($con, "SELECT * FROM `blog` ORDER BY date DESC");
while ($row = mysqli_fetch_array($sel)) {
	//echo $row['title'];
	$sel1 = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$row[uid]]'");
	$row1 = mysqli_fetch_array($sel1);

?>

	<div class="central-meta item" style="border-radius: 10px;">
		<div class="user-post">
			<div class="friend-info">
				<figure>
					<img src="admin/user_tbl/uploads/<?php echo $row1['image']; ?>" alt="">
				</figure>
				<div class="friend-name">
					<?php
					if ($row1['id'] == $_SESSION['uid']) {
						echo '<ins><a href="profile.php" title="">' . $row1['name'] . '</a></ins>';
					} else {
						echo '<ins><a href="frnd-prof.php?id=' . $row1['id'] . '" title="">' . $row1['name'] . '</a></ins>';
					}
					?>
					<span>published: <?php echo $row['date'] ?></span>
				</div>
				<div class="post-meta">
					<img src="blog/<?php echo $row['image']; ?>" style="width:678px; height:366px;" alt="">
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<h5><?php echo $row['title'] ?></h5>
					<div class="description">
						<p><?php echo $row['description'] ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>