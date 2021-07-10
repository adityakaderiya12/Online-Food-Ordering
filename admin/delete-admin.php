<?php
//Include constants.php file here 
include('../config/constant.php');
//1.get the ID of Admin to be deleted 
 $id =  $_GET['id'];


//2. Create sql query to Delete Admin 
$sql="DELETE FROM tbl_admin where id=$id";
//Execute the query 
$res= mysqli_query($conn,$sql);

//Check wheether the query executed suuccessfully or not 
if($res==true)
{
    //query executed successfully and Admin Deleted 
//echo" Admin Deleted";
//create session variabe todisplay message 
$_SESSION['delete']=   "<div class= 'success'>Admin Deleted successfullly.</div>";
//Redirect to manage Admin page 
header('location:'.SITEURL.'admin/manage-admin.php');
}
else 
{
    //Failed to delet admin
   // echo "Failed to Deleted Admin ";
   $_SESSION['delete']="<div class='error'>Failed to Delete Admin,Try Again later.</div>";
   header('location:'.SITEURL.'admin/manage-admin.php');
}
//3. Redirect to Manage Admin page with messagge (success/error)





?>