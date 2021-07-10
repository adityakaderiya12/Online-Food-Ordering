<?php
        // start session
        session_start(); 

    //Create constant to store non repeating values
    define('SITEURL','http://localhost/foodorder/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food_order');

//Execute query and save Data into Database 
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //Database connection
$db_select = mysqli_select_db($conn,'food_order') or die(mysqli_error());//selection database 


?>