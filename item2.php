
   <?php session_start();include "include/header.php";
     $i = $_GET["id"];
     $query="SELECT item.itemName as iname,item.num as id,item.itemPrice as ip,item.itemDesc as ides,item.imglink as img,item.categ as catid,category.name as cname FROM item join category on item.categ = category.num WHERE item.num = '$i' ";
     $result=mysqli_query($connect,$query);
     while($row2 = mysqli_fetch_assoc($result)){
       $itemName = $row2['iname'];
       $itemPrice = $row2['ip'];
       $itemDesc = $row2['ides'];
       $img = $row2['img'];
       $catid = $row2['catid'];
     }
     if(isset($_GET['action']) && $_GET['action']=="add"){

          $id=intval($i);

          if(isset($_SESSION['cart'][$i])){

              $_SESSION['cart'][$i]['qty']++;

               echo '<script>window.location = "item2.php?id='; echo $i.'&s=t'; echo '";</script>';
          }else{

              $sql_s="SELECT * FROM item WHERE num= {$i}";
              $query_s=mysqli_query($connect,$sql_s);
              if(mysqli_num_rows($query_s)!=0){
                  $row_s=mysqli_fetch_array($query_s);

                  $_SESSION['cart'][$row_s['num']]=array(
                          "qty" => 1,
                          "price" => $row_s['itemPrice']
                      );
                        echo '<script>window.location = "item2.php?id='; echo $i.'&s=t'; echo '";</script>';

              }else{

                  $message="This product id it's invalid!";

              }

          }

      }
     ?>
    <!-- end header Content -->

    <!-- Page Content -->
<section id="main">
    <div class="wrapper container">



      <hr>
        <div class="row">
          <div class = "col-lg-12 col-md-12">
          <div class="row product">
            <div class="col-md-5 col-md-offset-0"><img class="img-responsive" src="<?php echo './image/'.$img;?>"></div>
            <div class="col-md-7">
                <h2><?php echo substr("$itemName",0,30); ?></h2>
                <p><?php echo $itemDesc; ?></p>

                <h3>RM <?php echo $itemPrice;?></h3>
                <a  style = "text-decoration:none;" class ="btn btn-primary"  href="item2.php?action=add&id=<?php echo $i ?>">Add to cart</a>
            </div>
          </div>
        </div>
        </div>
        <hr>

          <div class="page-header">
              <h3>Product Details</h3></div>
          <p>Sed mollis, urna eu tempus facilisis, diam tellus aliquam tortor, et vestibulum ante quam non justo. Nullam luctus rutrum mattis. Maecenas in pharetra mi, vel mollis odio. Morbi non mauris massa. </p>
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Column 1</th>
                          <th>Column 2</th>
                          <th>Column 3</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Cell</td>
                          <td>Cell</td>
                          <td>Cell</td>
                      </tr>
                      <tr>
                          <td>Cell</td>
                          <td>Cell</td>
                          <td>Cell</td>
                      </tr>
                      <tr>
                          <td>Cell</td>
                          <td>Cell</td>
                          <td>Cell</td>
                      </tr>
                      <tr>
                          <td>Cell</td>
                          <td>Cell</td>
                          <td>Cell</td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div class="page-header">

          <div class="media">
              <div class="media-body">
                  <h4 class="media-heading">Love this!</h4>
                  <div><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
                  <p><span class="reviewer-name"><strong>John Doe</strong></span><span class="review-date">7 Oct 2015</span></p>
              </div>
          </div>
          <div class="media">
              <div class="media-body">
                  <h4 class="media-heading">Fantastic product</h4>
                  <div><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
                  <p><span class="reviewer-name"><strong>Jane Doe</strong></span><span class="review-date">7 Oct 2015</span></p>
              </div>
          </div>
      </div>
        <!-- /.row -->

        <!-- Page Features -->

        <!-- /.row -->
    </div>
</section>

       <!-- footer Content -->
   <?php include "include/footer.php"; ?>
    <!-- end footer Content -->
