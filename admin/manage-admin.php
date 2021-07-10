<?php include('partial/menu.php');
?>

     <!--Main content section starts-->
     <div class="main-content">
        <div class="wrapper">
       <h1>Manage Admin</h1>
</br>
<?php 
if(isset($_SESSION['add']))
{
   echo $_SESSION['add']; //Displaying session message 
   unset($_SESSION['add']); //Removing session message
}
if(isset($_SESSION['delete']))
{
   echo $_SESSION['delete']; //Displaying session message 
   unset($_SESSION['delete']); //Removing session message
}
if(isset($_SESSION['update']))
{
   echo $_SESSION['update']; //Displaying session message 
   unset($_SESSION['update']); //Removing session message
}
if(isset($_SESSION['user-not-found']))
{
   echo $_SESSION['user-not-found']; //User-not-found
   unset($_SESSION['user-not-found']); //Removing session message
}
if(isset($_SESSION['pwd-not-match']))
{
   echo $_SESSION['pwd-not-match']; //User-not-found
   unset($_SESSION['pwd-not-match']); //Removing session message
}


?>
<br></br>


       <!--Button to Add admin-->
       <a href="add-admin.php" class="btn-primary">Add Admin</a>
</br>
<br></br>
        <table class="tbl-full">
            <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
            </tr>

            <?php 
            //query to get all Admin 
               $sql =" SELECT *FROM tbl_admin";
            //Execute the query 
            $res = mysqli_query($conn,$sql);
            //check whether the query is executed or not
            if($res==True)
            {
               //count rows whether we have data in database
               $count = mysqli_num_rows($res); //Function to get all the rows in database
               //check the num in row
               $sn =1; //create a varaibale and assign the value 

               if($count > 0)
               {
                  //we have data in database 
                  while($rows=mysqli_fetch_assoc($res))
                  {
                     //using while loop tp get all the daa from database 
                    //And while loop will run as long we have data in database
                    //Get individual data 
                    $id= $rows['id'];
                    $full_name =$rows['full_name'];
                    $username= $rows['username'];


                     //Display the valuse in our table 
                     ?>
                       
                          
                     <tr>
                   <td><?php echo $sn++; ?></td>
                   <td><?php echo $full_name; ?></td>
                   <td><?php echo $username;  ?></td>
                   <td>
                   <a href="<?php echo SITEURL;?>admin/update-password.php ?id=<?php echo $id; ?>" class="btn-primary">Change Password </a>
                       <a href="<?php echo SITEURL;?>admin/update-admin.php ?id=<?php echo $id; ?>" class="btn-secondary">Update admin</a>
                       <a href="<?php echo SITEURL;?>admin/delete-admin.php ?id=<?php echo $id; ?>"  class="btn-danger">Delete admin </a>
                    </td>
                    </tr>
                      
                    <?php

                  }
               }
               
               else
                {
                  //we dont have data in database 
                     }
                  
               }
            
                   
         ?>    
     </table>

         
        </div>
     </div>
      <!--Main cotent  section stops-->


       <?php include('partial/footer.php')?>