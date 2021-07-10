<?php include('partial/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add category</h1>
        <br></br>

        <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

?>
  <?php
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

?>


<br><br>

        <!--Add category form start -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="category Title">
                    </td>
                </tr>
                
                <tr>
                <tr>
                
                <td>Select Image:</td>
                <td>
                <input type="file" name="image_name">
                </td>
                </tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="features" value="yes">YES
                        <input type="radio" name="features" value="no">No
                    </td>
                </tr>
                
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes">YES
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>
              
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add category" class="btn-secondary">

                    </td>
                </tr>
                
               
       </table>

       </form>
       </div>
</div> 

       
<?php include('partial/footer.php');?>

           <!--Add category Form Ends -->
           <?php 
           // chcek whether the sunmit button is clicked or not
           if(isset($_POST['submit']))
           {
               echo"clicked";
           
           //1.Get the value from category form 
           $title=$_POST['title'];
           //For Radio input,type we need to check whether the button is selected or not 
        if(isset($_POST['features']))
        {
            //Get the value from form 
             $features = $_POST['features']; 
        }   
        else
        {
            $featured="NO";
    
        }
        if(isset($_POST['active']))
        {
            //Get teh vale from form
            $active=$_POST['active'];
        }
        else
        {
            $active="No";
        }

        //CHeck whetehr the image is selected or not and set the value for image name accordingly
       // print_r($_FILES['image_name']);

        //die(); //Break the code here
        if(isset($_FILES['image_name']['name']))
        {
            //upload the imange
            //TO upload image we need image name and then source path and destination path 
            $image_name=$_FILES['image_name']['name'];

            //Auto Rename our Image
            //Get the Extension of our Image(jpg,png,gif,etc)e.g "food.jpg"
            $ext = end(explode('.',$image_name));
            //Rename the image
            $image_name="food_category_".rand(000,999).'.'.$ext;
        
            $source_path=$_FILES['image_name']['tmp_name'];
            $destination_path="../images/category".$image_name;
            //Finallly uplod the Image
            $upload =move_uploaded_file($source_path,$destination_path);
            //check whether the image is uploaded or not 
            //And if the image is not uploaded we will stop teh process and redirect with error message
            if($upload==false)
            {
                //set message
                $_SESSION['upload']-"<div class='error'>Failed to upload images</div>";
                //Redirect to Add category 
                header('location'.SITEURL.'admin/add-category.php');
                //Stop the process
                die();
            }
        }
        else{
            //Dont upload image and set the image_name
            $image_name="";
        }

        //create sql query to insert category into Database
        $sql ="INSERT INTO tbl_tablecategories SET
                title='$title',
                image_name='$image_name',
                features='$features',
                 active='$active'
                 ";
                 //3.Execute the query and save into Database
                 $res = mysqli_query($conn,$sql);
                 //4. check whether the query executed or not and data added or not 
                 if($res==TRUE)
                 {
                 
                    //query executed and category added
                    $_SESSION['add']="<div class='success'>category added successfully</div>" ;
                    //Redierct to Manage category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                 }
                 else
                 {
                     //Failed to add category 
                     $_SESSION['add']="<div class='error'>Failed to add Category</div>" ;
                    //Redierct to Manage category page
                    header('location:'.SITEURL.'admin/add-category.php');
                 }

   }

   
?>
          
        


