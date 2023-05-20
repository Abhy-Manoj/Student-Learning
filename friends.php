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
        $sel = mysqli_query($con, "SELECT * FROM `student`");
        while ($row = mysqli_fetch_array($sel)) {
            ?>
            <li>
                <figure>
                    <img src="admin/user_tbl/uploads/<?php echo $row['image']; ?>" alt="">
                </figure>
                <div class="friendz-meta">
                    <a href="view_projects.php"><?php echo $row['name'] ?></a>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
</div> friends list sidebar -->

<div class="widget friend-list stick-widget">
    <aside class="sidebar static">
        <div class="stick-widget">
            <h4 class="widget-title">Others</h4>
            <form method="post">
                <div class="form-group">
                    <input type="text" id="input" required="required" name="name" />
                    <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
                </div>
                <div class="form-group">
                    <select name="dept">
                        <option value="">Select Department</option>
                        <?php
                        $sel = mysqli_query($con, "SELECT * FROM `department`");
                        while ($row = mysqli_fetch_array($sel)) {
                            $selected = ($_POST['dept'] == $row['id']) ? 'selected' : '';
                            echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                    <label class="control-label" for="input">Department</label><i class="mtrl-select"></i>
                </div>
                <input type="submit" required="required" class="btn btn-primary" name="search1" value="Search" readonly />
            </form>

            <br>
            <ul class="naves">
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
                        <a href="chat.php?id=<?php echo $row['id'] ?>" title=""><?php echo $row['name'] ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- Shortcuts -->
    </aside>
</div><!-- sidebar -->
