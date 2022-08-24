<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

?>

        <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Exam Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Exam Management</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/exam.php" name="userform" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="class_id" id="class_id" class="form-control"   placeholder="Class" required="">
                                                        <option value="">--Select Class--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `tbl_class`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
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
                        <label class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-9">
                            <select type="text" name="subject_id" id="subject_id" class="form-control"   placeholder="Subject" required="">
                                <option value="">--Select Subject--</option>
                                    <?php  
                                    $c1 = "SELECT * FROM `tbl_subject`";
                                    $result = $conn->query($c1);

                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_array($result)) {?>
                                            <option value="<?php echo $row["id"];?>" style="display: none;" data-id="<?php echo $row["class_id"];?>">
                                                <?php echo $row['subjectname'];?>
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
                                                <label class="col-sm-3 control-label">Exam Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="name" class="form-control" placeholder="Exam Name" id="event" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"> Date</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="exam_date" class="form-control" placeholder=" Date" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Start Time</label>
                                                <div class="col-sm-9">
                                                  <input type="time" name="start_time" class="form-control" placeholder=" Start Time" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">End Time</label>
                                                <div class="col-sm-9">
                                                  <input type="time" name="end_time" class="form-control" placeholder=" End Time" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
        
<?php include('footer.php');?>

<script type="text/javascript">
 $('#class_id').change(function(){
    $("#subject_id").val('');
    $("#subject_id").children('option').hide();
    var class_id=$(this).val();
    $("#subject_id").children("option[data-id="+class_id+ "]").show();
    
  });
</script>