<?php 

//Authorization or Access control
//check whether the user is logged in or not 
if(!isset($_SESSION['user'])) //if user session is not set
{
 //user is not logged in
 //redirect to login page with message 
 $_SESSION['no-login-message']="<div class ='error textcenter'>please login to access admin panel.</div>";
 //Redirect to login page 
 header('location:'.SITEURL.'admin/login.php');

}

?>