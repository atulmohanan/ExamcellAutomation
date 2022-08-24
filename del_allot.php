<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM `allot` WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
$sql = "DELETE FROM `allot_student` WHERE allot_id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>

window.location = "view_allotment.php";
</script>

