
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');

if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){
    
    $q = "select * from  admin where id = '".$_SESSION['id']."'";
}
else {
   $q = "select * from  tbl_customer where id = '".$_SESSION['id']."'";
}
 
  $q1 = $conn->query($q);
  while($row = mysqli_fetch_array($q1)){
    extract($row);
    $db_pass = $row['password'];
  }

if(isset($_POST["btn_password"])){
  
  $old = hash('sha256',$_POST['old_password']);
  $pass_new = hash('sha256', $_POST['new_password']);
  $confirm_new = hash('sha256', $_POST['confirm_password']);

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$old_pass =  hash('sha256', $salt . $old); 
$new_pass =  hash('sha256', $salt . $pass_new); 
$confirm =  hash('sha256', $salt . $confirm_new);

  if($db_pass!=$old_pass){ ?> 
    <?php $_SESSION['error']='Old Password not matched';?>
   
  <?php } else if($new_pass!=$confirm){ ?> 
    <?php $_SESSION['error']='NEW Password and CONFIRM password not Matched';?>
   
  <?php } else {
   
if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){
    
   $sql = "update  admin set `password`='$confirm' where id = '".$_SESSION['id']."'";
}
else {
  $sql = "update  tbl_customer set `password`='$confirm' where id = '".$_SESSION['id']."'";
}    
  
  $res = $conn->query($sql);
  ?>
   <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Password changed Successfully...</p>
    <p>
 <?php  if($_SESSION["username"]=='admin' || $_SESSION["username"]=='user'){ ?>
      <a href="logout.php"><button class="button button--success" data-for="js_success-popup">Close</button></a>
     <?php }  else { ?>
      <a href="../logout.php"><button class="button button--success" data-for="js_success-popup">Close</button></a>
     <?php } ?>
    </p>
  </div>
</div>
  <?php
    
  }
}


?>


 
        <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Change Password</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" placeholder="old-Password" name="old_password" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" placeholder="New-Password" name="new_password" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Confirm Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" placeholder="Confirm-Password" name="confirm_password" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>




                                        <button type="submit" name="btn_password" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    </form>
                                </div>
                            </div>
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