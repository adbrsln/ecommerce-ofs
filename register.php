
<!-- DON'T FORGET TO INCLUE HEADER AND NAVBAR FILE -->
<?php include "include/header.php"; //include($_SERVER['DOCUMENT_ROOT'].'/../include/header_navbar.php');?>


<div class="container">
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Register <small>Through here</small>
                        </h1>

                    </div>
                </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action = "reg_proses.php" onsubmit= "return agree()">

            Name</br>
               <input class="form-control" type="text" name = "nama"  required>
                </br>
            Username </br>
               <input class="form-control"  type="text" name = "user"  required>
                 </br>
            Password</br>
               <input class="form-control"  type="password" name = "pass"  required></a>
                 </br>
            Email</br>
                    <input class="form-control"  type="text" name = "email"  required></a>
                      </br>
            Address</br>
                    <input class="form-control"  type="text" name = "address"  required></a>
                      </br>
            Phone Number</br>
                    <input class="form-control"  type="text" name = "notel"  required></a>
                      </br>
            <input type = "hidden" name = "level" value = "3" >
           <input type = "checkbox"  id ="agreet" value = "1"> Hereby i agree with all the terms and conditions .</br></br>

                 <input class="btn btn-primary" type ="submit"  class  = "btn" name = "submit" id ="submit" value="Submit">
           </form>
        </div>
  </div>
</div>

<?php include "include/footer.php";
