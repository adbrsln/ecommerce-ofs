   <?php include "include/header.php"; ?>
<div class="container">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Contact Us <small>Through here</small>
                        </h1>
                        
                    </div>
                </div>
    
    <div class ="col-lg-12">  
        <div class="row">
        <form method="POST" action = "#" >

            <p>Name</p>
               <p><input class="form-control"  type="text" name = "nama" value = ""  required></p>
                

            <p>Email Address </p>
               <p><input class="form-control"  type="address" name = "eaddress"  value = ""required></p>
                 
             <p>Enquiry</p> 
              <p><textarea class ="form-control" name = "enq" height = "250"></textarea></p>


            </br>
                 <input type ="submit"  class  = "btn btn-primary" name = "submit" id ="submit" onclick ="complete()" value="Hantar">
           </form>
        </div>
    </div>
   
</div>
       <!-- footer Content -->
   <?php include "include/footer.php"; ?>
    <!-- end footer Content -->