<link rel="stylesheet" href="../popup_style.css">
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);
if (isset($_POST['btn_save'])) {

	$sql = "SELECT stud_id,date FROM `tbl_attendence` WHERE stud_id = '".$stud_id."' AND date = '".$date."' ";
	 $result=$conn->query($sql);
    $row1=mysqli_fetch_array($result);
    if(empty($row1))
    {
    	$sql2 = "SELECT * FROM `tbl_student` WHERE id = '".$stud_id."'";
	 $result2=$conn->query($sql2);
    $row2=mysqli_fetch_array($result2);

    	$sql = "INSERT INTO `tbl_attendence`(`stud_id`, `classname`, `date`, `status`) VALUES ('$stud_id','".$row2['classname']."','$date','$status')";
    	if ($conn->query($sql) === TRUE) {
		      $_SESSION['success']=' Record Successfully Added';
		     ?>
		<script type="text/javascript">
		window.location="../view_attendence.php";
		</script>
		<?php
		} else {
		      $_SESSION['error']='Something Went Wrong';
		?>
		<script type="text/javascript">
		window.location="../view_attendence.php";
		</script>
		<?php } 
    }
    else{?>
	<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Record Already Exists
    </h3>
    <p></p>
    <p>
      <a href="../view_attendence.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
       <?php //echo "<script>setTimeout(\"location.href = '../view_attendence.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
<?php
  
}
	

}
?>
 