<?php
session_start();

include("header.php");
if ($_SESSION['user'] == "") {
    session_start();
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>

<style>
.tab-content.fixed-height {
    max-height: 535px;
    overflow-y: auto;
}

.tab-content.fixed-height::-webkit-scrollbar {
    width: 0px; /* Adjust the width as needed */
    background-color: transparent; /* Set the background color of the scrollbar to transparent */
}

.tab-content.fixed-height::-webkit-scrollbar-thumb {
    background-color: transparent; /* Set the color of the scrollbar thumb */
    border-radius: 4px; /* Adjust the border radius as needed */
}

.tab-content.fixed-height::-webkit-scrollbar-thumb:hover {
    background-color: transparent; /* Set the color of the scrollbar thumb on hover */
}

.tab-content.fixed-height::-webkit-scrollbar-track {
    background-color: transparent; /* Set the background color of the scrollbar track to transparent */
}

.btn-primary {
    color: #0069d9;
    background-color: #ffff;
    border-color: #0069d9
}

.btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc
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

                                    <div class="tab-content fixed-height" id="myTabContent" style="border-radius: 10px;">
                                        <!-- Blogs tab -->
                                        <div class="tab-pane fade show active" id="blogs" role="tabpanel"
                                            aria-labelledby="blogs-tab">


                                            <?php
                                            error_reporting(0);
                                            include("connection.php");

                                            // Display blogs
                                            
                                            if ($_REQUEST['id']) {
                                                $blogSel = mysqli_query($con, "SELECT * FROM `blog` WHERE `uid`='$_REQUEST[id]' ORDER BY date DESC");
                                            } else {
                                                $blogSel = mysqli_query($con, "SELECT * FROM `blog` WHERE `uid` != '$_SESSION[uid]' ORDER BY date DESC");
                                            }
                                            $cc = mysqli_num_rows($blogSel);
                                            //echo $cc;
                                            if ($cc > 0) {

                                            } else {
                                                echo "<br>";
                                                echo "<h4 style='color:red;'>There are currently no blogs available.</h4>";
                                            }

                                            //echo "SELECT * FROM `blog` WHERE `uid`='$_REQUEST[id]' ORDER BY date DESC";
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
                                                                <ins><a href="chat.php?id=<?php echo $row1['id'] ?>"
                                                                        title="">
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
                                                                    Description
                                                                    <p>
                                                                        <?php echo $blogRow['description'] ?>
                                                                    </p>
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
                                            error_reporting(0);
                                            include("connection.php");

                                            if ($_REQUEST['id']) {
                                                $sel = mysqli_query($con, "SELECT * FROM `project` where uid='$_REQUEST[id]' and status='public' ORDER BY date DESC");
                                            } else {

                                                $sel = mysqli_query($con, "SELECT * FROM `project` where status='public' and `uid` != '$_SESSION[uid]' ORDER BY date DESC");
                                            }
                                            $cc = mysqli_num_rows($sel);
                                            //echo $cc;
                                            if ($cc > 0) {

                                            } else {
                                                echo "<br>";
                                                echo "<h4 style='color:red;'>There are currently no projects available.</h4>";
                                            }
                                            while ($row = mysqli_fetch_array($sel)) {
                                                //echo $row['title'];
                                            
                                                $sel1 = mysqli_query($con, "SELECT * FROM `student` WHERE `id`='$row[uid]'");
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
                                                                <ins><a href="chat.php?id=<?php echo $row1['id'] ?>"
                                                                        title="">
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
                                                                                title="" class="add-butn" data-ripple=""><i
                                                                                    class="ti-eye"></i></a>
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
                                    </div>
                                </div>
                            </div>
                        </div><!-- centerl meta -->
                        <div class="col-lg-3">
                        <aside class="sidebar static">
								<div class="widget stick-widget" style="border-radius: 10px;">
									<h4 class="widget-title">Chat</h4>
									<form method="post">

										<div class="form-group" style="margin-left: 20px; width: 85%;">
											<select name="dept">
												<option value="" selected disabled>Select Department</option>
												<?php
												$sel = mysqli_query($con, "SELECT * FROM `department`");
												while ($row = mysqli_fetch_array($sel)) {
													$selected = ($_POST['dept'] == $row['id']) ? 'selected' : '';
													echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
												}
												?>
											</select>
											<label class="control-label" for="input">Department</label><i
												class="mtrl-select"></i>
										</div>
										<input type="submit" required="required" class="form-control btn btn-primary"
											style="width: 85%; margin-left: 20px" name="search1" value="Search"
											readonly />
									</form>

									<div id="searchDir" style="padding: 20px;"></div>
									<ul id="people-list" style="padding: auto; margin-top: 0px; max-height: 360px;">
										<?php
										if (isset($_POST['search1'])) {
											$name = $_POST['name'];
											$dept = $_POST['dept'];
											$whereClause = "";
											if (!empty($name)) {
												$whereClause .= "name LIKE '%$name%' AND ";
											}
											if (!empty($dept)) {
												$whereClause .= "department = '$dept' AND ";
											}

											$whereClause = rtrim($whereClause, " AND ");
											$sel = mysqli_query($con, "SELECT * FROM `student` WHERE $whereClause");
											$rows = mysqli_num_rows($sel);

											if ($rows == 0) {
												echo "<p style='color:red;'>Not Found</p>";
											}
										} else {
											$sel = mysqli_query($con, "SELECT * FROM `student` WHERE id != '$_SESSION[uid]' ORDER BY username ASC");
										}

										while ($row = mysqli_fetch_array($sel)) {
											?>
											<li>
												<figure>
													<img src="admin/user_tbl/uploads/<?php echo $row['image']; ?>" alt="">
												</figure>
												<div class="friendz-meta">
													<a href="chat.php?id=<?php echo $row['id']; ?>" title=""><?php echo $row['name']; ?></a>
												</div>
											</li>
											<?php
										}
										?>
									</ul>
								</div>

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