<?php
include 'include/check.php';
include '../include/db.php';
$transid = $_GET["id"];
if (isset($_GET["id"])) {

  $query3="SELECT distinct corder.imglink as imglink,status.statusName as status, details.name as name,details.address as address , details.notel as notel,pos.posid as posid,bill.billCode as bcode ,bill.qrimg as qrimg FROM corder
     join details on corder.user_id = details.num join status on corder.status = status.statusID
     left join pos on pos.transid = corder.transactionid
     left join bill on bill.billNum = corder.billID
     WHERE corder.transactionid = '$transid'"; //index details
	$result3 =mysqli_query($connect,$query3);
	$count = mysqli_num_rows($result3);


	if ($count > 0){
		$query="SELECT corder.item_id, corder.qty as qty  , corder.total as subtotal, corder.ftotal as total, item.itemName as itemname,item.num FROM corder
    join item on corder.item_id = item.num WHERE transactionid = '$transid'";
		$result=mysqli_query($connect,$query);

		$query2="SELECT DISTINCT num,ftotal,status FROM corder WHERE transactionid = '$transid'";
		$result2=mysqli_query($connect,$query2);
		while($row3 = mysqli_fetch_assoc($result2)){
			$ftotal = $row3['ftotal'];
			$status = $row3['status'];
            $orderid = $row3['num'];
            if ($status == '2'){ //complete
                $paramstatus ="btn btn-primary disabled";
                $paramstatus2 ="btn btn-success disabled";
                $paramstatus3 ="btn btn-danger disabled";
                $paramstatus4 ="btn btn-warning ";
            }else if ($status == '3') { //waiting confirmation
                $paramstatus ="btn btn-primary ";
                $paramstatus2 ="btn btn-success disabled";
                $paramstatus3 ="btn btn-danger ";
                $paramstatus4 ="btn btn-warning ";
            }else if ($status == '4') { //payment made
                $paramstatus ="btn btn-primary ";
                $paramstatus2 ="btn btn-success disabled";
                $paramstatus3 ="btn btn-danger ";
                $paramstatus4 ="btn btn-warning ";
            }else if ($status == '6') { //ondevlivery
                $paramstatus ="btn btn-primary disabled";
                $paramstatus2 ="btn btn-success ";
                $paramstatus3 ="btn btn-danger  ";
                $paramstatus4 ="btn btn-warning ";
            }else {
                 $paramstatus ="btn btn-primary disabled";
                $paramstatus2 ="btn btn-success disabled";
                $paramstatus3 ="btn btn-danger ";
                $paramstatus4 ="btn btn-warning disabled";
            }
		}

	}
		else {
			 echo '<script>window.location = "./customer/index.php?s=f";</script>';
		}

}
$PNG_WEB_DIR = '../customer/temp/';
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
                            <div class="pull-right">Order ID: OFS<?php echo $orderid;?></div>
                        </h1>

                    </div>
                </div>
        <div class="row">
            <div class="col-lg-12">
                    <form method = "POST" action ="index.php">

                    <table class = "table">

                        <tr>

                             <?php while($row2 = mysqli_fetch_assoc($result3)){
                              $trackingNo =$row2['posid'];
                              $img = $row2['imglink'];
                              if ($row2['qrimg'] != NULL) 
                               $filename = $row2['qrimg'];
                              else $filename = 'test.png';
                              $billCode =$row2['bcode'];
                            ?>
                            <td class = "col-md-6">
                            <Strong>Customer Order Information</Strong></br></br>
                                Status :   <Strong><?php echo $row2['status'];  ?></Strong></br>
                                Name :<?php echo $row2['name']; ?></br>
                                Phone Number : <?php echo $row2['notel']; ?></br>
                                Address : <?php echo $row2['address']; ?></br>
                                <?php if($img != ''){ $param = '../customer/uploads/'.$img;}else $param =''; ?>
                                </td></div>

                                <td class = "col-md-2" colspan="">

                                </td>
                                <td class = "col-md-2" colspan="1">

                                </td>
                                <td class = "col-md-2" colspan="1">
                                <center>  <Strong>Payment Receipt</Strong></br><a target="_blank" href="https://billplz-staging.herokuapp.com/bills/<?=$billCode?>">
                                  <?php echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';?></a></center>

                                </td>

                                <?php  }  ?>
                        </tr>

                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price per unit</th>
                            <th>Price</th>
                        </tr>
                        <?php while($row2 = mysqli_fetch_assoc($result)){
                            $ppunit = $row2['subtotal']/$row2['qty'];
                            ?>
                        <tr>
                            <td><?php echo $row2['itemname']; ?></td>
                            <td><?php echo $row2['qty']; ?></td>
                            <td><?php echo $ppunit; ?></td>
                            <td><?php echo $row2['subtotal']; ?></td>

                        </tr>
                        <?php  }  ?>
                        </hr>
                        <tr>


                        <th >

                            Total you have to pay :<strong>RM <?= $ftotal?></strong>


                        </th>
                        <td></td>
                        <td></td>
                         <td></td>
                    </tr>
                    </table>

                <hr>
                
                <div class="pull-right">
                    <a   class = "<?php echo $paramstatus;?> btn-sm"  href="status.php?id=<?=$transid;?>&type=Approve">Approve Order</a>
                    <a type="button" class="<?php echo $paramstatus4;?> btn-sm" data-toggle="modal" data-whatever="<?=$transid;?>" data-target="#myModal2">Deliver Order</a>
                    <a   class = "<?php echo $paramstatus2;?> btn-sm"  href="status.php?id=<?=$transid;?>&type=complete">Complete Order</a>
                    <a  onclick = "return del();" class = "<?php echo $paramstatus3;?>btn-sm" href="status.php?id=<?=$transid;?>&type=cancel" >Cancel Order</a>
                </div>
                 </form>
                </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header ">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Customer Proof Of Payment</h4>
                            </div>
                            <div class="modal-body">
                              <div class="thumbnail">
                                   <?php if($img != ''){ $param = '../customer/uploads/'.$img;}else $param =''; ?>
                                <img  src="<?php echo $param; ?>" alt="" width ="800" height ="500">

                                </div>
                            </div>
                            <div class="modal-footer">

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
                                    <h4 class="modal-title">New Item</h4>
                                  </div>
                                  <div class="modal-body">

                                        <form method="POST" action = "status.php">
                                            <p>Parcel No.</p>
                                             <input type="text" class="form-control" name="posid" value = "<?=$trackingNo?>" required>
                                               </br>
                                               <input type="hidden" name = "id" value = "<?=$transid?>">
                                              <input type="hidden" name = "type2" value ="deliver">
                                              <?php
                                                  //$trackingNo = "EN824328835MY"; # your tracking number
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
                                      </div>
                                  <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-sm" value ="Submit" id="submit">
                                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                      </form>
                                  </div>
                                </div>

                              </div>
                            </div>
</div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>
