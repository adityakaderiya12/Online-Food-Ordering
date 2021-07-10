<?php include('partial/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br></br>

    <?php

        if(isset($_SESSION['add'])) //checking whether the session is or not 
        {
            echo $_SESSION['add']; // Display the session 
            unset ($_SESSION['add']); // Removing session 

        }
    ?>

        <form action="" method="POST">
<table class="tbl-30">
        <tr>
            <td>Full Name:</td>
            <td><input type="text" name="full_name" placeholder="enter your name"></td>
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" placeholder="enter your username"></td>
        </tr>
        <tr>
            <td>password:</td>
            <td><input type="password" name="password" placeholder="enter your password"></td>
        </tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
    </td>

</tr>
</table>
</form>
     </div>
</div>



<?php include('partial/footer.php');?>




<?php
//Process the value from Form and save it in database
//check whether the button is clicked or not
if(isset($_POST['submit']))
{
   // echo "button clicked";
//get the datta from form
 $full_name=$_POST['full_name'];
$username=$_POST['username'];
$password=md5($_POST['password']); //password Encryption with md5
//sql query to save data into database
$sql= "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
";
//Executing query and saving Data into Database 
$res=mysqli_query($conn,$sql) or die(mysqli_error());
//4.check whether the qyery is executed or not or displaydata is inserted or not 
if($res=TRUE)
{
    //Data inserted 
   // echo "Data Inserted ";
   //create a session variabe to displya a messange 
   $_SESSION['add']="Admin added successfully";
   //Redirect page to manage admin
   header("location:".SITEURL.'admin/manage-admin.php');
    
}
else
{
    //Failed to Insert data 
    //echo"Failed to insert data";
     //create a session variabe to displya a messange 
   $_SESSION['add']='Failed to Add Admin ';
   //Redirect page to Add  admin
   header("location:".SITEURL.'admin/add-admin.php');
}
}
?>