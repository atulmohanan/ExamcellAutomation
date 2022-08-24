<?php session_start();
 include('connect.php');
    if(!isset($_SESSION["temail"])){
    ?>
    <script>
    window.location="teacher.php";
    </script>
    <?php
    
} else { 

 
    ?>
   
    <div id="main-wrapper">
        
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
              
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        
                         <?php
             $sql_header_logo = "select * from manage_website"; 
             $result_header_logo = $conn->query($sql_header_logo);
             $row_header_logo = mysqli_fetch_array($result_header_logo);
             ?>
                        <b><img src="uploadImage/Logo/<?php echo $row_header_logo['logo'];?>" alt="homepage" class="dark-logo" style="width:100%;height:auto;"/></b>
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                    </ul>
                    
                    <ul class="navbar-nav my-lg-0">

                      
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                $sql = "select * from tbl_teacher where id = '".$_SESSION["id"]."'";
                                $query=$conn->query($sql);
                                while($row=mysqli_fetch_array($query))
                                    {
                                     
                                      extract($row);
                                      $fname = $row['tfname'].' '.$row['tlname'];
                                    }
                                                                    ?>
                                <img src="uploadImage/Profile/blank_avatar.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">                                  
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> <?=$fname?> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
       
        <?php } ?>