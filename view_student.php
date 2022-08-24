
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_student.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_student.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Student</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Student</li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
               
               
                 <div class="card">
                            <div class="card-body">
                              <?php if(isset($useroles)){ if(in_array("add_student",$useroles)){ ?> 
                            <a href="add_student.php"><button class="btn btn-primary">Add Student</button></a>
                          <?php } } ?>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Class</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Birth Date</th>
                                                <th>Contact No.</th>
                                               <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `tbl_student`";
                                     $result = $conn->query($sql);
$i=0;
                                   while($row = $result->fetch_assoc()) { 
                                    $sql2 = "SELECT * FROM `tbl_class` WHERE id='".$row['classname']."'";
                                     $result2=$conn->query($sql2);
                                     $row2=$result2->fetch_assoc();
                                      ?>
                                            <tr>
                                                <td><?php echo $row['sfname']; ?></td>
                                                <td><?php echo $row['slname']; ?></td>
                                                <td><?php echo $row2['classname']; ?></td>
                                                <td><?php echo $row['semail']; ?></td>
                                                <td><?php echo $row['sgender']; ?></td>
                                                <td><?php echo $row['sdob']; ?></td>
                                                <td><?php echo $row['scontact']; ?></td>
                                                <td><?php echo $row['saddress']; ?></td>
                                                
                                                <td>
            <?php if(isset($useroles)){  if(in_array("edit_student",$useroles)){ ?> 
                                                <a href="edit_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-plus-square"></i></button></a>
                                              <?php } } ?>

            <?php if(isset($useroles)){  if(in_array("delete_student",$useroles)){ ?> 
                                                <a href="view_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                              <?php } } ?>
                                               
                                                </td>
                                            </tr>
                                          <?php  $i++;} 
                                          ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               
<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>