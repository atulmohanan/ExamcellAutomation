
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
if(isset($_POST["btn_update"]))
{
    extract($_POST);
    $q1="UPDATE `tbl_class` SET `classname`='$classname' WHERE `id`='".$_GET['id']."'";
   
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_class.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_class.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `tbl_class` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
 
    extract($row);
$classname = $row['classname'];

}

?> 

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Class Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Class Management</li>
                    </ol>
                </div>
            </div>
          
            <div class="container-fluid">
               
                
             
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="classform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="classname" class="form-control" placeholder="Class Name" id="event" onkeydown="return alphaOnly(event);" value="<?php echo $classname; ?>" required="">
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