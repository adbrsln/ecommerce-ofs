<?php
include 'include/check.php';
include '../include/db.php';

$sql2 = "SELECT * FROM item ";

$result2 = mysqli_query($connect,$sql2);
$p=mysqli_num_rows($result2);


$sql2 = "SELECT * FROM category";
$result = mysqli_query($connect,$sql2);

?>
  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

    <!-- Page Content -->
    <div class="container">
       <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Item <small>Management</small>
                        </h1>

                    </div>
                </div>


               <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Adding a new item?</strong> Try out <a data-toggle="modal" data-target="#myModal" class="alert-link">Here</a> <a data-toggle="modal" data-target="#myModal2" class="alert-link">Here2</a>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Item List</h3>
                            </div>
                            <div class="panel-body">
                              <div class="table-responsive">
                                   <div class="dataTable_wrapper">
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-1">No.</th>
                                                <th>Item Name</th>
                                                <th>Item Price</th>
                                                <th>Item Description</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total_rows = 1; while($row2 = mysqli_fetch_assoc($result2)){  ?>
                                              <tr>
                                                <td><?=$total_rows;?></td>
                                                <td><?php echo $row2['itemName']; ?></td>
                                                <td><?php echo $row2['itemPrice']; ?></td>
                                                <td><?php echo substr($row2['itemDesc'],0,40); ?></td>
                                                <td><?php echo $row2['categ']; ?></td>

                                                <td ><center><a  class = "btn btn-primary btn-sm"  href="ireg.php?id=<?=$row2['num'];?>" >Update</a>&nbsp;<a   onclick = "return del();" class = "btn btn-danger btn-sm" onclick="return del()" href="del.php?id=<?=$row2['num'];?>&t=<?= 'i'?>" >Delete</a></center></td>
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
        <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header ">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">New Item</h4>
                    </div>
                    <div class="modal-body">

                          <form method="POST" action = "iproses.php">
	                            <p>Item Name</p>
                               <input class="form-control"  type="text" name = "itemname"  required>
                                </br>
                                <p>Item Price</p>
                               <input class="form-control"  type="text" name = "itemprice"  required>
                                 </br>
                                <p>Item Description  </p>

                               <textarea class="form-control ckeditor" cols = "77" name= "desc" rows="5"></textarea>
                                 </br>
                                <p>Category</p>
                                <select class ="form-control" name = "category">
                                    <?php while($row3 = mysqli_fetch_assoc($result)){ ?>
                                  <option value = "<?=$row3['num'];?>"><?=$row3['name'];?></option>

                                  <?php } ?>
                                </select>
                        </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" value ="Submit" id="submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                  </div>

                </div>
              </div>
        <div class="modal fade" id="myModal2" role="dialog">
                      <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header ">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Parcel Details</h4>
                          </div>
                          <div class="modal-body">
                              <?php
                                  $trackingNo = "EN824328835MY"; # your tracking number
                                  $url = "http://localhost/shop/include/poslaju-api.php?trackingNo=".$trackingNo; # the full URL to the API
                                  $getdata = file_get_contents($url); # use files_get_contents() to fetch the data, but you can also use cURL, or javascript/jquery json
                                  $parsed = json_decode($getdata,true); # decode the json into array. set true to return array instead of object

                                  $httpcode = $parsed["http_code"];
                                  $message = $parsed["message"];



                                  if($message == "Record Found" && $httpcode == 200)
                                  {
                                    ?>
                                  <table class="table table-striped table-condensed ">
                                      <thead>
                                          <tr>
                                            <th>Date/Time</th>
                                            <th>Process</th>
                                            <th>Location</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php

                                  				# iterate through the array
                                  				for($i=0;$i<count($parsed['data']);$i++)
                                  				{
                                  					# access each items in the JSON
                                  					echo "
                                  						<tr>
                                  							<td>".$parsed['data'][$i]['date_time']."</td>
                                  							<td>".$parsed['data'][$i]['process']."</td>
                                  							<td>".$parsed['data'][$i]['event']."</td>
                                  						</tr>
                                  						";
                                  				}
                                  	}else {
                                      echo $message . "<br>";
                                  	  # code...
                                  	}
                                  	?>

                                      </tbody>
                                  </table>
                                  </select>
                              </div>
                          <div class="modal-footer">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                          </div>
                        </div>

                      </div>
                    </div>
    </div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>
