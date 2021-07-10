<?php include('partial/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password<h1>
        <br> </br>
        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Current Password:</td>
                <td>
                <input type="password" name="current_password" placeholder="old password">
                </td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td>
                <input type="password" name="new_password" placeholder="New password">
                </td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td>
                <input type="password" name="confirm_password" placeholder="Confirm password">
                </td>
            </tr>
        
                <tr>
                <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="change password" class="btn-secondary">
                
                </td>
                </tr>
        
        
        </table>


        
        </form>

     
     
     </div>

  </div>

  <?php
            //Check whether the submit button is clicked or not 
            if(isset($_POST['submit']))
            {
               // echo "clicked";
               //1.Get the Data from Form
               $id=$_POST['id'];
               $current_password=md5($_POST['current_password']);
               $new_password =md5($_POST['new_password']);
               $confirm_passwrod=md5($_POST['confirm_password']);

               //2.Checkwhether the user with current id and password exist or not 
                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                //Exevute the query 
                $res=mysqli_query($conn,$sql);

                if($res==true)
                {
                   // Check whether the data is available or not 
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //user exists and password can be changed 
                   // echo "user found";
                   //check whether the new password match or not 
                   if($new_password==$confirm_password)
                   {
                       //update the password
                       echo"password matched ";

                   }
                   else{
                       //Redierct to manage admin with success
                       $_SESSION['pwd-not-match']="<div class='error'>password not matched .</div>";
                       //Redirect the user
                       header("location:".SITEURL.'admin/manage-admin.php');

                   }
                    }
                    else{
                        //user does not exist set message and redierct
                        $_SESSION['user-not-found']="<div class='error'>User not found.</div>";
                    //Redirect the user
                    header("location:".SITEURL.'admin/manage-admin.php');
                  
                    }

                   }             
                               
            //3.Check whether the new password and confirm password match or not 

               //4. Chage password if all above is ttrue 

            }
  
  ?>







<?php include('partial/footer.php');?>