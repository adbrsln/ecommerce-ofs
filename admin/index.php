<?php 
include 'include/check.php';
include '../include/db.php';
$num_rec_per_page=10;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql2 = "SELECT * FROM login LIMIT $start_from, $num_rec_per_page";
//$sql2="SELECT distinct login.num as num,login.username as username, login.password as password,login.level as level , details.name as name FROM login join details on login.num = details.loginID LIMIT $start_from,$num_rec_per_page";
$result2 = mysqli_query($connect,$sql2);
$p=mysqli_num_rows($result2);
?>
  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

    <!-- Page Content -->
    <div class="container">
       <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Credentials <small>Management</small>
                        </h1>
                        
                    </div>
                </div>
             

               <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Adding a new user?</strong> Try out <a href="newu.php" class="alert-link">Here</a>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> User Credentials Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-1">No.</th>
                                                
                                                <th class="col-lg-4">Username</th>
                                                <th class="col-lg-4">Password</th>
                                                <th class="col-lg-1">Level</th>
                                                <th class="col-lg-2"><center>Action</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row2 = mysqli_fetch_assoc($result2)){ $o=1; ?>
                                              <tr>
                                                <td ><?php  echo $o;  ?></td>
                                                <td ><?php echo $row2['username']; ?></td>
                                                <td ><?php echo $row2['password']; ?></td>
                                                <td ><?php echo $row2['level']; ?></td>
                                                <td ><center><a  class = "btn btn-primary btn-sm"  href="edit.php?id=<?=$row2['num'];?>" >Update</a>&nbsp;<a   onclick = "return del();" class = "btn btn-danger btn-sm" href="del.php?id=<?=$row2['num'];?>" >Delete</a></center></td>
                                              </tr>
                                             <?php  }  ?> 
                                           
                                        </tbody>
                                    </table>
                                    <!--- bawah ni pagination-->
                                 	<?php 
                                            $sql = "SELECT distinct num FROM login"; 
                                            $rs_result = mysqli_query($connect,$sql); //run the query
                                            $total_records = mysqli_num_rows($rs_result);  //count number of records
                                            $total_pages = ceil($total_records / $num_rec_per_page); 

                                            echo '<ul class="pagination">'; 
                                            echo '<li><a href="index.php?page=1">&laquo;</a></li>';
                                            for ($i=1; $i<=$total_pages; $i++) { 

                                                         echo "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
                                            }; 
                                            echo "<li><a href='index.php?page=$total_pages'>&raquo;</a></li>";
                                            echo "</ul>";
                                        ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>

