<?php
    session_start();

include("header.php");
if ($_SESSION['user']=="")
{
    session_start();
    session_unset();
    session_destroy();
	  header("location:login.php");
}
?>

<style>
.col-lg-6.fixed-height {
    max-height: 528px;
    overflow-y: auto;
}

.col-lg-6.fixed-height::-webkit-scrollbar {
    width: 0px; /* Adjust the width as needed */
    background-color: transparent; /* Set the background color of the scrollbar to transparent */
}

.col-lg-6.fixed-height::-webkit-scrollbar-thumb {
    background-color: transparent; /* Set the color of the scrollbar thumb */
    border-radius: 4px; /* Adjust the border radius as needed */
}

.col-lg-6.fixed-height::-webkit-scrollbar-thumb:hover {
    background-color: transparent; /* Set the color of the scrollbar thumb on hover */
}

.col-lg-6.fixed-height::-webkit-scrollbar-track {
    background-color: transparent; /* Set the background color of the scrollbar track to transparent */
}
</style>

	<section>
		<div class="gap gray-bg" style='padding:30px;'>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<?php 
							include("sidebar.php"); 
							?>
							<div class="col-lg-6 fixed-height">
								<?php 
								include("feed.php"); 
								?>
							</div><!-- centerl meta -->
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