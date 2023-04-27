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
							<?php 
							include("chat_single.php"); 
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