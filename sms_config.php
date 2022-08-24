
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('zmyconnect.php');
if(isset($_POST["btn_sms"]))
{
  extract($_POST);
 

  
   $q1="UPDATE `tbl_sms_config` SET `senderid`='$sender_id',`sms_username`='$sms_username',`sms_password`='$sms_password',`auth_key`='$auth_key'";
     $q2=$conn->query($q1);
  ?>
  <script>
  window.location = "sms_config.php";
  </script>
  <?php
}

?>

<?php
$que="select * from tbl_sms_config";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
 
  extract($row);
  $senderid = $row['senderid'];
  $sms_username = $row['sms_username'];
  $sms_password = $row['sms_password'];
  $auth_key = $row['auth_key'];
}

?> 
   


 
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">SMS Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">SMS Management</li>
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
                                                <label class="col-sm-3 control-label">Sender ID</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $senderid;?>"  name="sender_id" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $sms_username;?>"  name="sms_username" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Sms Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" value="<?php echo $sms_password;?>"  name="sms_password" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Auth Key</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $auth_key;?>"  name="auth_key" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" name="btn_sms" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
        
<?php include('footer.php');?>