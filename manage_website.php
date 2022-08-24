
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
if(isset($_POST["btn_web"]))
{
  extract($_POST);
  $target_dir = "uploadImage/Logo/";
  $website_logo = basename($_FILES["website_image"]["name"]);
  if($_FILES["website_image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["website_image"]["name"]);
   if (move_uploaded_file($_FILES["website_image"]["tmp_name"], $image)) {
    
       @unlink("uploadImage/Logo/".$_POST['old_website_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }
  else {
     $website_logo =$_POST['old_website_image'];
  }

   $login_logo = basename($_FILES["login_image"]["name"]);
  if($_FILES["login_image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["login_image"]["name"]);
   if (move_uploaded_file($_FILES["login_image"]["tmp_name"], $image)) {
    
       @unlink("uploadImage/Logo/".$_POST['old_login_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  
  }
  else {
     $login_logo =$_POST['old_login_image'];
  }



    $background_login_image = basename($_FILES["back_login_image"]["name"]);
  if($_FILES["back_login_image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["back_login_image"]["name"]);
   if (move_uploaded_file($_FILES["back_login_image"]["tmp_name"], $image)) {
    
       @unlink("uploadImage/Logo/".$_POST['old_back_login_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  
  }
  else {
     $background_login_image =$_POST['old_back_login_image'];
  }
  
   $q1="UPDATE `manage_website` SET `title`='$title',`short_title`='$short_title',`logo`='$website_logo',`currency_code`= '$currency_code',`currency_symbol`= '$currency_symbol',`login_logo`='$login_logo',`invoice_logo`='$invoice_logo' , `background_login_image` = '$background_login_image'";
  if ($conn->query($q1) === TRUE) {
   
      $_SESSION['success']='Record Successfully Updated';
      ?>
      <script type="text/javascript">
        window.location = "manage_website.php";
      </script>
      <?php 

} else {
   
      $_SESSION['error']='Something Went Wrong';
}
  ?>
  <script>
 
  </script>
  <?php
}

?>


 <?php
$que="select * from manage_website";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
  
  extract($row);
  $title = $row['title'];
  $short_title = $row['short_title'];
  $currency_code = $row['currency_code'];
  $currency_symbol = $row['currency_symbol'];
  $website_logo = $row['logo'];
  $login_logo = $row['login_logo'];
  $invoice_logo = $row['invoice_logo'];
}

?>  
   
?> 

  
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Website Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Website Management</li>
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
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $title;?>"  name="title" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Short Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $short_title;?>"  name="short_title" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                      

                                      

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Currency Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $currency_code;?>"  name="currency_code" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Currency Symbol</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $currency_symbol;?>" name="currency_symbol" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Website Logo</label>
                                                <div class="col-sm-9">
                                  <image class="profile-img" src="uploadImage/Logo/<?=$website_logo?>" style="height:35%;width:25%;">
                  <input type="hidden" value="<?=$website_logo?>" name="old_website_image">
                          <input type="file" class="form-control" name="website_image">
                                                </div>
                                            </div>
                                        </div>  
  
                                         

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Login Page Logo</label>
                                                <div class="col-sm-9">
                                  <image class="profile-img" src="uploadImage/Logo/<?=$login_logo?>" style="height:35%;width:35%;">
                          <input type="hidden" value="<?=$login_logo?>" name="old_login_image">
                          <input type="file" class="form-control" name="login_image">
                                                </div>
                                            </div>
                                        </div>


                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Background Image For Login Page</label>
                                                <div class="col-sm-9">
                                  <image class="profile-img" src="uploadImage/Logo/<?=$background_login_image?>" style="height:35%;width:35%;">
                          <input type="hidden" value="<?=$background_login_image?>" name="old_back_login_image">
                          <input type="file" class="form-control" name="back_login_image">
                                                </div>
                                            </div>
                                        </div>



                                        <button type="submit" name="btn_web" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
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
      <button class="button button--success"  data-for="js_success-popup">Close</button>
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

    <script type="text/javascript">
    function refresh_cls() {
      
                  setTimeout(function(){
                  location.reload(); 
             }, 1000);
      }  
    </script>