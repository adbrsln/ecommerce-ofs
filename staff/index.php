<?php
include 'include/check.php';
include '../include/db.php';

$sql2 = "SELECT DISTINCT  corder.tmpayment, corder.transactionid,corder.ftotal,corder.status,details.loginID,details.name as name FROM corder join details on corder.user_id = details.num join login on details.loginID = login.num";

$result2 = mysqli_query($connect,$sql2);
$p=mysqli_num_rows($result2);
?>
  <!-- Header Content -->
  <?php include "include/header.php"; ?>
   <!-- end header Content -->

   <!-- Page Content -->
   <div class="container">
       <div class="row">
                   <div class="col-lg-12 col-md-12">
                       <h1 class="page-header">
                           Purchase Order <small>Details</small>
                       </h1>

                   </div>
               </div>
       <div class="row">
                   <div class="col-lg-12 col-md-12">
                     <div class="table-responsive">
                          <div class="dataTable_wrapper">
                         <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                             <thead>
                                 <tr>
                                   <th class="col-md-1">No.</th>
                                   <th class="col-md-2">Date / Time</th>
                                   <th class="col-md-4">Name</th>
                                   <th class="col-md-1">Total</th>
                                   <th class="col-md-2">Status</th>
                                   <th class="col-md-2"><center>Action</center></th>
                                  </tr>
                             </thead>
                             <tbody>
                                 <?php $total_rows = 1; while($row2 = mysqli_fetch_assoc($result2)){  ?>
                                   <tr>
                                     <td><?php echo $total_rows; ?></td>
                                    <td><?php echo $row2['tmpayment']; ?></td>
                                     <td><?php echo $row2['name']; ?></td>
                                     <td><?php echo 'MYR '.$row2['ftotal']; ?></td>
                                     <td><?php echo $row2['status']; ?></td>
                                     <td>
                                       <center>
                                       <a  class = "btn btn-primary btn-sm" href="edit.php?id=<?=$row2['transactionid'];?>" >View</a>&nbsp;
                                       <a  class = "btn btn-danger btn-sm" href="del.php?id=<?=$row2['transactionid'];?>" >Delete</a>
                                       <center>
                                     </td>
                                   </tr>
                                  <?php $total_rows++; }  ?>

                             </tbody>
                         </table>

                     </div>

                 </div>

           </div>
       </div>
   </div>
   <!-- /.footer -->
   <?php include "include/footer.php"; ?>
