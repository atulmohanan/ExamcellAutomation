<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM `tbl_class` WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>

window.location = "view_class.php";
</script>

