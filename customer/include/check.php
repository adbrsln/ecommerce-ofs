<?php session_start();
//error_reporting(0);
// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['usernamela'])) {
        $str = '../main.php?s=sf';
        redirect($str);
      }
else{
switch ($_SESSION['levella']) {
        case 2:
          $str = '../staff/index.php';
          redirect($str);
          break;
       case 1:
          $str = '../admin/index.php';
          redirect($str);
          break;
         
      }
}

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?> 