<?php
include 'include/check.php';
include '../include/db.php';

$sql2 = "SELECT * FROM category ";
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
                            Category <small>Management</small>
                        </h1>

                    </div>
                </div>


               <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Adding a new category?</strong> Try out <a data-toggle="modal" data-target="#myModal" class="alert-link">Here</a>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Category List</h3>
                            </div>
                            <div class="panel-body">
                              <div class="table-responsive">
                                   <div class="dataTable_wrapper">
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-1">No.</th>
                                                <th class="col-lg-2">Category Name</th>
                                                <th class="col-lg-7">Category Description</th>
                                                <th class="col-lg-2">Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total_rows = 1; while($row2 = mysqli_fetch_assoc($result2)){  ?>
                                              <tr>
                                                <td ><?php  echo $total_rows;  ?></td>
                                                <td><?php echo $row2['name']; ?></td>
		                                        <td><?php echo substr($row2['catdesc'],0,40); ?></td>

                                                <td ><center><a  class = "btn btn-primary btn-sm"  href="catreg.php?id=<?=$row2['num'];?>" >Update</a>&nbsp;<a   onclick = "return del();" class = "btn btn-danger btn-sm" onclick="return del()" href="del.php?id=<?=$row2['num'];?>&t=<?= 'c'?>" >Delete</a></center></td>
                                              </tr>
                                             <?php $total_rows++; }  ?>

                                        </tbody>
                                    </table>
                                    <!--- bawah ni pagination-->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        <!-- new category modal -->
        <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header ">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">New Category</h4>
                    </div>
                    <div class="modal-body">
                      <form method = "POST" action ="cproses.php">

                            <p>Category Name</p>
                            <input type="text" class="form-control" name ="catname">
                            <p>Category Description</p>
                            <textarea class="form-control ckeditor" cols = "77" name= "catdesc" rows="5"></textarea>



                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" value ="Submit" id="submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                  </div>

                </div>
              </div>


    </div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>
