<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
extract($_POST);
   $sql = "INSERT INTO `allot` (`class_id`,`room_type_id`,`subject_id`,`exam_id`,`added_date`) VALUES ('$class_id','$room_type_id','$subject_id','$exam_id','".date('Y-m-d')."')";
 if ($conn->query($sql) === TRUE) {
 	 $last_id = $conn->insert_id;
 	 $s1 = "SELECT * FROM `exam` WHERE id='".$exam_id."'";
 	 $sr = $conn->query($s1);
    $sres = mysqli_fetch_array($sr);

    $s2 = "SELECT * FROM `room` WHERE type_id='".$room_type_id."'";
 	 $sr2 = $conn->query($s2);

while ($row = mysqli_fetch_array($sr2)) {
    $s3 = "SELECT * FROM `tbl_student` WHERE classname='".$class_id."'";
 	 $sr3 = $conn->query($s3);
 	 $i=1;
    while ($student = mysqli_fetch_array($sr3)) {
    	if($i<=$row['strenght'])
    	{
    		$s4 = "SELECT * FROM `allot_student` WHERE exam_id='".$exam_id."' and student_id='".$student['id']."'";
	        $sr4 = $conn->query($s4);
	        if ($sr4->num_rows==0) {
	        	$sql = "INSERT INTO `allot_student`(`allot_id`,`exam_id`, `exam_date`, `start_time`, `end_time`, `room_id`, `student_id`, `stud_id`) VALUES('$last_id','$exam_id','".$sres['exam_date']."','".$sres['start_time']."','".$sres['end_time']."','".$row['id']."','".$student['id']."','".$student['stud_id']."')";
 				$conn->query($sql);
	        }
    	}
    	$i++;

	}
}
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_allotment.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_allotment.php";
</script>
<?php } ?>
