<?php

if(!isset($_SESSION['user'])){

    $_SESSION['no-login-message']= "<div class='err'>PLEASE LOGIN TO ACESS ADMIN PANEL.</div>";

    header('location:'.SITEURL.'admin/login.php');
}


?>