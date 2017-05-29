   <?php
include 'include/check.php';
include '../include/db.php';

$num_rec_per_page=10;
$id = $_SESSION['cnum'];
$sql2 = "SELECT DISTINCT corder.billid,corder.tmpayment, corder.transactionid,corder.ftotal,corder.status,details.num,details.name as name,status.statusID,status.statusName, pos.posid as posid
FROM corder join details on corder.user_id = details.num
join status on corder.status = status.statusID
left join pos on corder.transactionid = pos.transid
WHERE details.num = 3 ORDER BY (tmpayment) DESC";
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
                            Update Transaction <small>Details</small>
                        </h1>

                    </div>
                </div>
        <div class="row">
                    <div class="col-lg-12">
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
                                    <th class="col-md-3"><center>Action</center></th>
                                   </tr>
                              </thead>
                              <tbody>
                                  <?php $total_rows = 1; while($row2 = mysqli_fetch_assoc($result2)){

                                    if ($row2['billid'] !=""){
                                     $param1 = 'https://billplz-staging.herokuapp.com/bills/' . $row2['billid'];
                                     $param2 = 'btn btn-success btn-sm';
                                   }else{
                                     $param1 = '#';
                                     $param2 = 'btn btn-success btn-sm disabled ';
                                   }
                                    ?>
                                    <tr>
                                      <td><?php echo $total_rows; ?></td>
                                     <td><?php echo $row2['tmpayment']; ?></td>
                                      <td><?php echo $row2['name']; ?></td>
                                      <td><?php echo 'MYR '.$row2['ftotal']; ?></td>
                                      <td><?php switch($row2['statusID']){
                                              case 1 : echo '<span class="label label-primary">'; echo $row2['statusName']; echo '</span>'; break;
                                              case 2 : echo '<span class="label label-success">'; echo $row2['statusName']; echo '</span>'; break;
                                              case 3 : echo '<span class="label label-primary">'; echo $row2['statusName']; echo '</span>'; break;
                                              case 4 : echo '<span class="label label-danger">'; echo $row2['statusName']; echo '</span>'; break;
                                              case 5 : echo '<span class="label label-danger">'; echo $row2['statusName']; echo '</span>'; break;
                                              case 6 : echo '<span class="label label-warning">'; echo $row2['statusName']; echo '</span>'; break;
                                              }?>
                                      </td>
                                      <td><center>

                                        <a  class = "btn btn-primary btn-sm" href="order.php?id=<?=$row2['transactionid'];?>" ><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <a  class = "<?php echo $param2;?>" target="_blank" href="<?php echo $param1;?>" ><i class="glyphicon glyphicon-usd"> </i></a>
                                        <a  class = "btn btn-danger btn-sm" href="del.php?id=<?=$row2['transactionid'];?>" ><i class="glyphicon glyphicon-trash"></i></a>
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
