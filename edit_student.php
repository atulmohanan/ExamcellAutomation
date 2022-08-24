
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["btn_update"]))
{
    if($_POST["password"]!='')
    {
        if($_POST['password']==$_POST['cpassword'])
        {
            $passw = hash('sha256', $_POST['password']);
            function createSalt()
            {
                return '2123293dsj2hu2nikhiljdsd';
            }
            $salt = createSalt();
            $pass = hash('sha256', $salt . $passw);
            extract($_POST);
            $q1="UPDATE `tbl_student` SET `stud_id`='$stud_id', `sfname`='$sfname',`slname`='$slname',`classname`='$classname',`semail`='$semail',`sgender`='$sgender',`sdob`='$sdob',`scontact`='$scontact',`saddress`='$saddress',`password`='$pass' WHERE `id`='".$_GET['id']."'";
        }
        else
        {
            $_SESSION['error']='Password and Confirm Password';
            ?>
            <script type="text/javascript">
            window.location="edit_student.php?id=<?php echo $_GET['id']; ?>";
            </script>
            <?php
        }
      
    }
    else
    {
        $pass =$_POST['old_password'];
        extract($_POST);

      $q1="UPDATE `tbl_student` SET `stud_id`='$stud_id', `sfname`='$sfname',`slname`='$slname',`classname`='$classname',`semail`='$semail',`sgender`='$sgender',`sdob`='$sdob',`scontact`='$scontact',`saddress`='$saddress',`password`='$pass' WHERE `id`='".$_GET['id']."'";
    }
    
  
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_student.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_student.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM `tbl_student` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    
    extract($row);
$stud_id = $row['stud_id'];
$fname = $row['sfname'];
$lname = $row['slname'];
$email = $row['classname'];
$email = $row['semail'];
$gender = $row['sgender'];
$dob = $row['sdob'];
$contact = $row['scontact'];
$address = $row['saddress'];
}

?> 

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Student Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Student Management</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
               
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="studentform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                   <input type="hidden" name="old_password" class="form-control" value="<?php echo $password;?>">
                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Exam Seat No</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="stud_id" value="<?php echo $stud_id; ?>" class="form-control" placeholder="Exam Seat No" id="event" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">First Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="sfname" class="form-control" placeholder="First Name" id="event" onkeydown="return alphaOnly(event);" value="<?php echo $sfname; ?>" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  name="slname" id="lname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Last Name" value="<?php echo $slname; ?>" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="classname" class="form-control"   placeholder="Class" required="">
                                                        <option value="">--Select Class--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `tbl_class`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>" <?php if($classname==$row["id"]){ echo "Selected";}?>>
                                                                        <?php echo $row['classname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="semail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" value="<?php echo $semail; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password" id="password" placeholder="Password"  onkeyup='check();'  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Confirm Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="cpassword" id="confirm_password" placeholder="Confirm Password"  onkeyup='check();'  class="form-control" >
                                                    <span id="message"></span>
                                                </div>
                                            </div>
                                        </div>
                                        

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <select name="sgender" id="gender" class="form-control" required="">
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male" <?php if($gender=='Male'){ echo "Selected";}?>>Male</option>
                                                      <option value="Female" <?php if($gender=='Female'){ echo "Selected";}?>>Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="sdob" value="<?php echo $sdob; ?>" class="form-control" placeholder="Birth Date">
                                                </div>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Parents Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="scontact" class="form-control" placeholder="Parents Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="" value="<?php echo $scontact; ?>">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="saddress" placeholder="Address" style="height: 120px;"><?php echo $saddress;?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
          
<?php include('footer.php');?>
<link rel="stylesheet" href="popup_style.css">
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT Matching';
  }
}
</script>
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

