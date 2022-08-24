
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
extract($_POST);
   $sql = "INSERT INTO `exam` (`class_id`,`subject_id`,`exam_date`,`start_time`,`end_time`,`name`,`added_date`) VALUES ('$class_id','$subject_id','$exam_date','$start_time','$end_time','$name','".date('Y-m-d')."')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_exam.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_exam.php";
</script>
<?php } ?>




