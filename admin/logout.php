<?php 
        //Include constant.php for siteurl 
        include('../config/constant.php');

        
        //1.Destroy the session 
        session_destroy();

        //Unser $-session and user



        //2.Redirect to login page 
    header('location:'.SITEURL.'admin/login.php');

?>
