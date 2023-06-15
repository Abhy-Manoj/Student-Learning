<?php
include("connection.php");
include("header.php");

$sel = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$_SESSION[uid]'");
$row = mysqli_fetch_array($sel);
?>

<?php
include("profile-head.php");
$sel1 = mysqli_query($con, "SELECT * FROM `bio` WHERE `uid`='$_SESSION[uid]'");
$row1 = mysqli_fetch_array($sel1);
?>

<section>
	<div class="gap gray-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<div class="col-lg-3">
							<?php
							include("profile-sidebar.php");
							?>
						</div><!-- sidebar -->
						<div class="col-lg-6">
							<div class="central-meta" style="border-radius: 10px;">
								<div class="about">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link active" id="blogs-tab" data-toggle="tab" href="#blogs"
												role="tab" aria-controls="blogs" aria-selected="true">Blogs</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="projects-tab" data-toggle="tab" href="#projects"
												role="tab" aria-controls="projects" aria-selected="false">Projects</a>
										</li>
									</ul>

									<div class="tab-content" id="myTabContent">
										<!-- Blogs tab -->
										<div class="tab-pane fade show active" id="blogs" role="tabpanel"
											aria-labelledby="blogs-tab">
											<?php
											error_reporting(0);
											include("connection.php");

											// Display blogs
											$blogSel = mysqli_query($con, "SELECT * FROM `blog` WHERE `uid`='$_SESSION[uid]' ORDER BY id DESC");
											while ($blogRow = mysqli_fetch_array($blogSel)) {
												$sel1 = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$blogRow[uid]'");
												$row1 = mysqli_fetch_array($sel1);
												?>

												<div class="central-meta item">
													<div class="user-post">
														<div class="friend-info">
															<figure>
																<img src="admin/user_tbl/uploads/<?php echo $row1['image']; ?>"
																	alt="">
															</figure>
															<div class="friend-name">
																<ins><a href="" title="">
																		<?php echo $row1['name'] ?>
																	</a></ins>
																<span>published:
																	<?php echo $blogRow['date'] ?>
																</span>
															</div>
															<div class="post-meta">
																<h5>
																	<?php echo $blogRow['title'] ?>
																</h5>
																<img src="blog/<?php echo $blogRow['image']; ?>"
																	style="width: 678px; height: 366px;" alt="">
																<div class="description">
																	<p>
																		<?php echo $blogRow['keywords'] ?>
																	</p>
																	Description
																	<p>
																		<?php echo $blogRow['description'] ?>
																	</p>
																</div>
																<div class="we-video-info">
																	<ul>
																		<li>
																			<a href="edit_blog.php?id=<?php echo $blogRow['id']; ?>"
																				class="add-butn more-action"  style="border-radius: 5px; margin-right:12px"
																				data-ripple=""><i
																					class="ti-pencil-alt"></i></a>
																		</li>
																		<li>
																			<a href="viewtimeline.php?delete_id=<?php echo $blogRow['id']; ?>"
																				class="add-butn danger"
																				style="margin-right:45px; background: #cd0808; border-radius: 5px;"
																				onclick="return confirm('Are you sure you want to delete this blog?')"><i
																					class="ti-trash"></i></a>
																		</li>
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

										<!-- Projects tab -->
										<div class="tab-pane fade" id="projects" role="tabpanel"
											aria-labelledby="projects-tab">
											<?php
											$sel = mysqli_query($con, "SELECT * FROM `project` WHERE `uid`='$_SESSION[uid]' ORDER BY `date` DESC");

											while ($row = mysqli_fetch_array($sel)) {
												$sel1 = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$row[uid]'");
												$row1 = mysqli_fetch_array($sel1);
												?>
												<div class="central-meta">
													<div class="editing-info">
														<div class="user-post">
															<div class="friend-info">
																<figure>
																	<img src="admin/user_tbl/uploads/<?php echo $row1['image']; ?>"
																		alt="">
																</figure>
																<div class="friend-name">
																	<ins><a href="" title="">
																			<?php echo $row1['name'] ?>
																		</a></ins>
																	<span>published:
																		<?php echo $row['date'] ?>
																	</span>
																</div>
																<div class="post-meta">
																	<h5>
																		<?php echo $row['title'] ?>
																	</h5>
																	<div class="description">
																		<p>
																			<?php echo $row['keywords'] ?>
																		</p>
																		Abstract
																		<p>
																			<?php echo $row['abstract'] ?>
																		</p>
																	</div>
																	<div class="we-video-info">
																		<ul>
																			<li>
																				<a href="project_single.php?id=<?php echo $row['id'] ?>"
																					title="" class="add-butn"  style="border-radius: 5px;"
																					data-ripple=""><i
																						class="ti-eye"></i></a>
																			</li>
																			<li>
																				<a href="editproject.php?id=<?php echo $row['id'] ?>"
																					title="" class="add-butn more-action" style="border-radius: 5px; margin-right:15px"
																					data-ripple=""><i
																						class="ti-pencil-alt"></i></a>
																			</li>
																			<li>
																				<a href="viewtimeline.php?delete_id=<?php echo $row['id'] ?>"
																					title="" class="add-butn danger"
																					style="margin-right:45px;background: #cd0808; border-radius: 5px;"
																					onclick="return confirm('Are you sure you want to delete this project?')"><i
																						class="ti-trash"></i></a>
																			</li>
																		</ul>
																	</div>
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
								</div>
							</div>
						</div><!-- centerl meta -->
						<div class="col-lg-3">
							<aside class="sidebar static">
								<div class="central-meta" style="width:fit-content; border-radius: 10px;">
									<div class="groups">
										<span><i class="fa fa-file-text-o"></i> Certificates</span>
									</div>
									<ul class="liked-pages" style="width:100%">
										<?php
										if ($_SESSION[uid]) {
											$sel = mysqli_query($con, "SELECT * FROM `certficates` where user_id='$_SESSION[uid]'");
											while ($row = mysqli_fetch_array($sel)) {
												?>
												<li">
													<div class="f-page">
														<figure>
															<a href="#" title=""><img
																	src="certificates/<?php echo $row['image']; ?>" alt=""></a>
														</figure>
														<div class="page-infos">
															<h5><a href="#" title="">
																	<?php echo $row['title']; ?>
																</a></h5>
															<span><a href="#" title="">
																	<?php echo $row['description']; ?>
																</a></span>
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