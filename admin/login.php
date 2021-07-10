<?php include('../config/constant.php'); ?>


<html>
    <head>
      
    <title>login-food order system</title>
    <link rel="stylesheet" href="../css/admin.css"> 
 </head>

         <body>
             <div class="login">
                    <h1 class= "textcenter"> Login </h1>
                    <br>

                    <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    
                    }
                    ?>
                    <br></br>


                    <!--login form statrs here-->
                <form action="" method="POST">
                        Username: <br>
                        <input type ="text"  name="username"  placeholder="Enter username"><br><br/>
                        
                        Password:<br>
                        <input type = "password"  name="password"  placeholder="Enter your password"><br><br/>
                      <input type="submit" name="submit" value="login" class="btn-primary">
                    <br></br>
                    </form> 


                     <!--login form ends here-->

               <p class="text-center">Created by- <a href="#">Aditya kaderiya</a>
            </p>
            </div>
        
    </body>
</html>
<?php 
        //check whether the submit button is click or not
        if(isset($_POST['submit']))
        {
            //process for login
            //1. Get the Data from login form 
             $username=$_POST['username'];
            $password =md5($_POST['password']);
            
            //2. sql to check whether the user name and password exist or not 
            $sql ="SELECT *FROM tbl_admin WHERE  username='$username' AND  password='$password'";
        
        //3. Execute the query
        $res = mysqli_query($conn,$sql);


        //4. Count rows to check whether the user exist or not 
        $count = mysqli_num_rows($res);


        if($count==1)
        {
                        //user avaliable and login success
             $_SESSION['login'] ="<div class='success'>Login successful.</div>";

            $_SESSION['user']=$username; //To check whether the user is logged in or not 
             //Redirect it to <Homepage>
             header('location: '.SITEURL .'admin/');
       
            }
        else
        
        {
            
            //user not available
            $_SESSION['login'] ="<div class='error'>Login Failed</div>";
             //Redirect it to <Homepage>
             header('location: '.SITEURL .'admin/login.php');
        }
        
        }

        ?>