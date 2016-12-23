<?php session_start();

//include 'include/check.php';

include 'include/db.php';
if (isset($_GET["item"])) {
   	
   $query="SELECT * FROM item";
     $i = $_GET["cat"]; 
					
    
}else{
	$num_rec_per_page=6;

    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
    $start_from = ($page-1) * $num_rec_per_page;
	
    $query="SELECT * FROM item";
     $i = $_GET["cat"]; 
	$query="SELECT * FROM item WHERE categ = '$i' LIMIT $start_from, $num_rec_per_page";

	 if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['qty']++; 
              
			//echo '<script>var r = confirm("Succesfully Added to cart! Go to Cart ?");if (r == true) { window.location = "cart.php";} else {window.location = "item.php?cat='; echo $i; echo '";}</script>';
            echo '<script>window.location = "item.php?cat='; echo $i.'&s=t'; echo '";</script>';
        }else{ 
              
            $sql_s="SELECT * FROM item 
                WHERE num={$id}"; 
            $query_s=mysqli_query($connect,$sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['num']]=array( 
                        "qty" => 1, 
                        "price" => $row_s['itemPrice'] 
                    ); 
                  
              
					
					 echo '<script>window.location = "item.php?cat='; echo $i.'&s=t'; echo '";</script>';
					
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 

}	
$result=mysqli_query($connect,$query);
$count = mysqli_num_rows($result);
?>


  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                                    <h1 class="page-header">
                                       <?php echo $i;?> <small>Category Details</small>
                                    </h1>

                                </div>
            <div class="col-md-3">
                 <div class="row">
                    
                </div>
                <div class="list-group">
                    <?php
                                include 'include/db.php';
                                $sql2 = "Select * from category" ;
                                $result2 = mysqli_query($connect,$sql2);
                                while($row2 = mysqli_fetch_assoc($result2)){ ?>
                                <a class="list-group-item" href="item.php?cat=<?= $row2['name'];?>"><?= $row2['name'];?></a>
                    <?php  }  ?>
                    
                </div>
            </div>

            <div class="col-md-9">

              
                 
                <div class="row">
                    <?php while($row2 = mysqli_fetch_assoc($result)){ ?>
                    <div class="col-md-4 col-sm-6 hero-feature">
                        <div class="thumbnail">
                            <img src="<?php echo './image/'.$row2['imglink'];?>" alt="">
                            
                            <div class="caption">
                                <h5 class="pull-right">MYR <strong><?php echo $row2['itemPrice'];echo '.00'?></strong></h5>
                                <h4><a href="#"><?php $itemn = $row2['itemName']; echo substr("$itemn",0,30); ?></a>
                               
                                </h4>
                                <p><?php $itemd = $row2['itemDesc']; echo substr("$itemd",0,20).'...'; ?></p>
                            </div>
                            
                            <p>
                                <center>
                                    <a  style = "text-decoration:none;" class ="btn btn-primary"  href="item.php?cat=<?php echo $row2['categ'] ?>&action=add&id=<?php echo $row2['num'] ?>">Add to Cart</a>
                                </center>
                            </p>
                        </div>
                    </div>
                <?php  }  ?> 
                </div>
               <div class= "pull-right">
                <?php  
                    $sql = "SELECT * FROM item WHERE categ = '$i'"; 
                    $rs_result = mysqli_query($connect,$sql); //run the query
                    $total_records = mysqli_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                    echo '<ul class="pagination">'; 
                    echo "<li><a href='item.php?cat=".$i."&page=".$total_pages."'>&laquo;</a></li>";
                          for ($w=1; $w<=$total_pages; $w++) { 
                                echo "<li><a href='item.php?cat=".$i."&page=".$w."'>".$w."</a></li>";
                                            }; 
                             echo "<li><a href='item.php?cat=".$i."&page=".$total_pages."'>&raquo;</a></li>";
                             echo "</ul>";
                ?>
                </div>
            </div>
            
        </div>
            
    </div>

	</script>';
 <!--    
<script type="text/javascript" language="javascript">
     function confirm(){
         swal({
         title: "Added to cart!",
         text : "Go to cart ?",
         showCancelButton: true,
         confirmButtonColor: "#75d87c",
         confirmButtonText: "Yes",
         cancelButtonText: "No",
         closeOnConfirm:false,
         closeOnCancel:false
         },
             function (isConfirm){
             if(isConfirm){
                 window.location = "cart.php";
             }else{
                  <?php// echo 'window.location = "item.php?cat='; echo $i.'&s=t'; echo '";'?> 
             };
         });
     };   
    </script>
    /.footer -->
    <?php include "include/footer.php"; ?>

