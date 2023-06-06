<?php
include "../header_inner.php";
include "tables.php";
error_reporting(0);
if ($_REQUEST["a"] == "error") {
  echo "<script>alert('Insert Faild!!!!')</script>";
}
if ($_REQUEST["a"] == "1") {
  echo "<script>alert('Insert Sucessfully')</script>";
}

$k = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
    .error {
      color: #F00 !important;
    }
  </style>
</head>

<body>
  <!--<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>-->
  <?php
  include "data_validation.php";
  include "../connection.php";

  $g = 0;

  $result = mysqli_query($con, "SHOW FIELDS FROM $table");

  $i = 0;

  echo "<div class='col-sm-12'>";
  echo "<h2>$title</h2>";
  echo "<form action='insert.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form'>";
  while ($row = mysqli_fetch_array($result)) {
    $name = $row["Field"];
    $type = $row["Type"];
    $type = explode("(", $type);
    $type_only = $type[0];
    $i++;

    $g++;

    //echo " <div ><div >";
  
    if ($i == 1) {
      //echo "<td>Male <input type='radio' name='$name'> </td>";
    } elseif ($i == 3) {
      echo "<div class='col-md-6'>
        <div class='form-group'>
            <label>" .
        str_replace("_", " ", $name) .
        "</label>
            <input type='email' name='$name' class='form-control' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' required>
        </div>
    </div>";
    } elseif ($i == 4) {
      echo "<div class='col-md-6'>
			<div class='form-group'>
			<label>" .
        str_replace("_", " ", $name) .
        "</label>
			<input type='text' name='$name'class='form-control' pattern='[0-9]{10}' title='Please enter a 10-digit mobile number!' required> 
			</div>
			</div>";
    } elseif ($i == 5) {
      echo "<div class='col-md-6'>
            <div class='form-group'>
				<label>" .
        str_replace("_", " ", $name) .
        "</label>
					<select name='$name' class='form-control' required>
						<option value=''>Select Gender</option>
						<option>Male</option>
						<option>Female</option>
	                </select>
	         </div>
          </div>";
    } elseif ($i == 7) {
      $sql2 = "SELECT * FROM department";
      ($result2 = mysqli_query($con, $sql2)) or
        die("Error in Selecting " . mysqli_error($connection));

      echo "<div class='col-md-6'>
        <div class='form-group'>
            <label>" .
        str_replace("_", " ", $name) .
        "</label>
            <select name='$name' class='form-control' required>
                <option value='' selected disabled>Select Department</option>";
      while ($row2 = mysqli_fetch_array($result2)) {
        echo "<option value='$row2[id]'>$row2[name]</option>";
      }
      echo "</select>
        </div>
    </div>";
    } else {
      if (
        $type_only == "varchar" ||
        $type_only == "int" ||
        $type_only == "int" ||
        $type_only == "tinyint"
      ) {
        echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  " .
          str_replace("_", " ", $name) .
          "</label><input type='text' name='$name'class='form-control' required> </div>
                                        </div>";
      }

      if ($type_only == "date") {

        $date = date("d-m-Y");
        echo "
	  
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  " .
          str_replace("_", " ", $name) .
          "</label>
	  
	  <input type='date' name='$name'  class='form-control' value='$date' required></div></div>";
        ?>

        <script type="text/javascript">
          $(function () {
            $('#t<?php echo $k; ?>').datepick();

          });

          function showDate(date) {
            alert('The date chosen is ' + date);
          }
        </script>
        <?php $k++;
      }

      if ($type_only == "tinytext") {
        echo "
	  
	  	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  " .
          str_replace("_", " ", $name) .
          "</label>
	  
	  <input type='file' required name='$name' accept='image/*' class='form-control'></div></div>";
      }
      if ($type_only == "text") {
        echo "<div class='col-md-6'>
                                            <div class='form-group'><label>
											
											 " .
          str_replace("_", " ", $name) .
          "</label>
											
											<textarea name='$name' required class='form-control' rows='8'></textarea>
											</div>
											</div>";
      }
    }

    //echo "</div></div><br>";
  }

  echo "
<div class='col-md-12'>
                              <div class='col-md-3'>              <div class='form-group'>
											<input type='submit' value='Submit' name='submit' class='form-control btn-success'>";

  echo "</form>";

  echo "
</div></div><div class='col-md-3'>   <div class='form-group'>
<form action='select.php' method='post'><input type='submit' name='view' value='View All' class='form-control btn-danger'></form></div></div>
<div class='clearfix'></div>

</div>
";

  mysqli_free_result($result);

  echo "</div>



<div class='clearfix'></div>


";

  mysqli_close($con);

  include "../footer_inner.php";
  ?>
  <div id="sample">
    <!-- <script type="text/javascript" src="nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>-->