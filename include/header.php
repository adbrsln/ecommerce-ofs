 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
Online Fan Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- footer CSS -->
    <link href="css/stickyfooter.css" rel="stylesheet">
    
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    
    <script type="text/javascript">
    function agree(){
      if(document.getElementById('agreet').checked) {
        return true;
        }else{
           alert('Check the agree button first pls!');
          return false;

        }
    }
        

  </script>
</head>

<body>
    <!-- Header Content -->
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Online Fan Shop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
	
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                                include 'db.php';
                                $sql2 = "Select * from category" ;
                                $result2 = mysqli_query($connect,$sql2);
                                while($row2 = mysqli_fetch_assoc($result2)){ ?>
                                <li><a href="item.php?cat=<?= $row2['name'];?>"><?= $row2['name'];?></a></li>
                                <?php  }  ?>
                            
                            <!--<li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li> -->
                            
                          </ul>
                    </li>
                    
                   
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="cart.php"><i class="fa fa-fw fa-shopping-cart">&nbsp;</i> Cart</a>
                    </li>
.                   <li>
                        <a href="main.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>