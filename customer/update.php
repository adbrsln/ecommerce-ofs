     <?php
     include 'include/check.php';
    include '../include/db.php';

    $num = $_SESSION['cnum'];
    $sql = "SELECT * from details where num = '$num'";
    $result = mysqli_query($connect,$sql);
    ?>
  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <form method="POST" action = "edit_proses.php" >
                <?php while($row2 = mysqli_fetch_assoc($result)){ ?>
                Name</br>
                   <input class="form-control"  type="text" name = "nama" value = "<?=$row2['name']; ?>"  required>
                    </br>

                 Address </br>
                   <input class="form-control"  type="address" name = "address"  value = "<?=$row2['address']; ?>"required>
                     </br>
                 Phone Number </br>
                   <input class="form-control"  type="notel" name = "notel" value = "<?=$row2['notel']; ?>" required>
                     </br>

                <input type="hidden" name = "id" value = "<?=$num?>">

                <?php  }  ?>
                     <input type ="submit"  class  = "btn btn-primary" name = "submit" id ="submit" value="Submit">
           </form>
        </div>

    </div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>
