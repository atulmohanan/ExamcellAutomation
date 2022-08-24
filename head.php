<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
             include('connect.php');
             $sql_head_title = "select * from manage_website"; 
             $result_head_title = $conn->query($sql_head_title);
             $row_head_title = mysqli_fetch_array($result_head_title);
             ?>
    <link rel="icon" type="image/png" sizes="16x16" href="uploadImage/Logo/<?php echo $row_head_title['background_login_image'];?>">
     
    <title><?php echo $row_head_title['title'];?></title>

    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 <link rel="stylesheet" href="css/lib/html5-editor/bootstrap-wysihtml5.css" />
 <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
     <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">
   
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>