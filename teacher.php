<?php session_start();?>
<?php include('head.php');?>
<link rel="stylesheet" href="popup_style.css">

   <?php
  include('connect.php');
if(isset($_POST['btn_login']))
{
$unm = $_POST['email'];

$passw = hash('sha256', $_POST['password']);

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

 $sql = "SELECT * FROM tbl_teacher WHERE temail='" .$unm . "' and password = '". $pass."'";
    $result = mysqli_query($conn,$sql);
    $row  = mysqli_fetch_array($result);
    
     $_SESSION["id"] = $row['id'];
     $_SESSION["password"] = $row['password'];
     $_SESSION["temail"] = $row['temail'];
     $_SESSION["fname"] = $row['tfname'];
     $_SESSION["lname"] = $row['tlname'];
     $count=mysqli_num_rows($result);
     if($count==1 && isset($_SESSION["temail"]) && isset($_SESSION["password"])) {
    {       
        ?>
         <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Login Successfully</p>
    <p>
    
     <?php echo "<script>setTimeout(\"location.href = 'teacher_panel.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
  
     <?php
    }
}
else {?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Invalid Email or Password</p>
    <p>
      <a href="teacher.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>
       
        <?php
       
         }
    
    }
?>

    <div id="main-wrapper">
        <div class="unix-login">
             <?php
             $sql_login = "select * from manage_website"; 
             $result_login = $conn->query($sql_login);
             $row_login = mysqli_fetch_array($result_login);
             ?>
            <div class="container-fluid"  style="background-image: url('uploadImage/Logo/<?php echo $row_login['background_login_image'];?>');
 background-color: #5c4ac7;">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <center><img src="uploadImage/Logo/1.png" style="width:50%;"></center><br>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <button type="submit" name="btn_login" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
	
    
    <script src="js/lib/jquery/jquery.min.js"></script>

    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/jquery.slimscroll.js"></script>

    <script src="js/sidebarmenu.js"></script>

    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/custom.min.js"></script>

</body>

</html>