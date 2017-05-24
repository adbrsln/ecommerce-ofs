<?php session_start();

include './include/db.php';
if(isset($_SESSION['cnum'])){
   $num = $_SESSION['cnum'];
  $sql2 = "SELECT * FROM details WHERE num = '$num'";
   $login2 = mysqli_query($connect,$sql2);
    while($row = mysqli_fetch_assoc($login2)){
          $uid = $row['num'];
             }
}
if(!isset($_SESSION['cart'])){
 echo '<script>window.location = "./index.php?s=sfc";</script><p></p>';
}
?>

  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

<div class="container">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Order Details <small>Summary</small>
                        </h1>

                    </div>
                </div>
<form method = "POST"  onsubmit= "return confirmation()" action = "p_proses.php">


	 <table class = "table table-bordered table-hover" ">
	<tr>
        	<th class="col-lg-2" >Item</th>
          <th>Item Description</th>
        	<th>Quantity</th>
        	<th>Price per unit</th>
        	<th>Price</td>
        </tr>
	 <?php



        $sql="SELECT * FROM item WHERE num IN (";

        foreach($_SESSION['cart'] as $id => $value) {
            $sql.=$id.",";
        }

        $sql=substr($sql, 0, -1).") ORDER BY itemName ASC";
        $query=mysqli_query($connect,$sql);
        $total = 0; $totalb = 0;
        while($row=mysqli_fetch_array($query)){
              $price = $_SESSION['cart'][$row['num']]['price'];
              $qty = $_SESSION['cart'][$row['num']]['qty'];
              $subtotal = $price * $qty;
              $total+= $subtotal;
              $totalb += $qty;

        ?>

        <tr>
	    <td style="text-align: center;">
			 <img src="<?php echo 'image/'.$row['imglink'];?>" height="10%" width="50%"alt="">
			</td>
      <td class="text-aligned:left;">
        	<strong><?php echo $row['itemName'] ?> </strong><small><?php echo $row['categ'] ?></small></br>
          <?php echo strtolower($row['itemDesc']); ?>
      </td>
			<td>
				<?php echo $_SESSION['cart'][$row['num']]['qty'] ?>
			</td>
			<td>
				RM <?php echo $price; ?>
			</td>
			<td>RM <?php echo $subtotal?></td>
		</tr>
        <?php

        }


               if ($totalb > 4 && $totalb < 11){
                 $discount = 5;
                }
                else if($totalb > 10){
                    $discount = 15;
                    }
                else $discount = 0;

                 if($total > 100){
                        $pos = 'Your Postage is Free';
                        }
                    else $pos = 'You have to pay RM 6 to cover the postage Fees';
    ?>
    <tr>
        <td></td>
        <td></td>

        <td colspan = "3"class="active">
             Discount :<strong> <?= $discount?>%</strong>
            <input type ="hidden" name = "discount" value ="<?= $discount?>">
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>

        <td colspan = "3"class="active">
            Total Discount : <strong>RM <?php  $totaldisc = $total * ($discount/100); echo round($totaldisc,2);?></strong>
            <input type ="hidden" name = "totaldiscount" value ="<?= $totaldisc?>">
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>

        <td colspan = "3"class="warning">
            Total you have to pay :<strong> RM <?= round($total - $totaldisc,2);?></strong>
            <input type ="hidden" name = "ftotal" value ="<?= round($total - $totaldisc,2);?>">
        </td>
    </tr>
    <tr>


        <td colspan = "5" class="success" style="text-align: center;">
            Postage :<strong>  <?= $pos?></strong>
            <input type ="hidden" name = "pos" value ="<?= $pos?>">
        </td>
    </tr>

    </table>
        <br />
        <div class="pull-right">
       <input type = "hidden" name = "uid" value = "<?= $uid?>">
        <input type ="submit" name="submit" class ="btn btn-primary"  value = "Place Order Now"> &nbsp; <a class = "btn btn-warning" id = "confirmationdel" onclick = "return del();"  href="logout.php" >Clear Shopping Cart</a>
        </div>





</form>
</div>
<!-- /.footer -->

    <?php include "include/footer.php"; ?>

</body>

</html>
