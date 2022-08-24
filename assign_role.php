<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
<?php 
include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');


    if(isset($_POST["btn_submit"]))
                            {
                              extract($_POST);
                              $sql="insert into tbl_group(name,description)values('$assign_name','$description')";
                              $query=$conn->query($sql);
                            $last_id =  mysqli_insert_id($conn);
                            $id=$last_id;
                            $checkItem = $_POST["checkItem"];
                            
                             $a = count($checkItem);  
                            for($i=0;$i<$a;$i++){

                              $sql="insert into tbl_permission_role(permission_id,role_id)values('$checkItem[$i]','$id')";
                              $query=$conn->query($sql);
                           
                                   }
                            }

?>    
      
        <div class="page-wrapper">
          
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Assign Role</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Assign Role</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
               
                  <form  method="POST">
                                  
                                      <div class="form-group"  style="margin-left: 10%;margin-right: 10%;">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" name="assign_name" required autocomplete="off">
                                        </div>

                                       <div class="form-group"  style="margin-left: 10%;margin-right: 10%;">
                                            <label for="exampleInputEmail1">Description</label>
                                            <input type="text" class="form-control" placeholder="Enter  Description" name="description" required autocomplete="off">
                                        </div>
                                   

                                  <div class="form-group">
                                         <u><h3 style="margin-left: 3%;">Permissions</h3></u> 
                                          <h5 style="color:red;">( While selecting any sub roles like add,edit,delete you must require to select Main roles named with Manage Name. )</h5>    
                                          <br><br>  
                                  </div>
             <div class="row"> 
               
                                        <?php 
                                              $q ="SELECT * FROM  tbl_permission ";
                                                  $result =$conn->query($q);
                                              while($row = mysqli_fetch_array($result)){  

                                              $id = $row["id"]; 
                                          ?>
                <div class="checkbox col-md-3">
                          <label>
                          <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $id; ?>"> <b><?php echo $row["display_name"]; ?></b>
                 </div>

        <?php } ?>
         
        </div>
       
             

                                  <div class="form-group">
                                        
                                  </div>


                      <div class="form-group col-md-12">
                        <button  type="submit" name="btn_submit" class="btn btn-primary">Submit</button> 
                           </div>
                                 </form>
                 
                </div>
               
            </div>
            
            <?php include('footer.php');?>