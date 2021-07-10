<?php include('partial/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage category </h1>
   <br> </br>
    
    <?php
    if(isset($_SESSION['add']))
    {
        echo ($_SESSION['add']);
        unset($_SESSION['add']);
    }

?>
<br></br>
       <!--Button to Add admin-->
       <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
</br>
    <br></br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
            
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
            
            </tr>
            <?php
            //query to get all categories from Database
            $sql ="SELECT *FROM tbl_tablecategories";
            //Execute query
            $res = mysqli_query($conn,$sql);

            //count Rows
            $count  =  mysqli_num_rows($res);

            //create serial number variable 
            $sn=1;

            //check whether we have data in database or not 
            if($count>0)
            {
                //we have data in database
                //get the data and display 
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    $features=$row['features'];
                    $active=$row['active'];
                    ?>

                  <tr> 
            <td><?php echo $sn++;?></td>
            <td><?php echo $title; ?></td>
            <td>
                <?php 
                  //check whether image name is available or not 
                  if($image_name="")
                  {
                      //Display the image
                      ?>
                      <img src="<?php echo SITEURL; ?>images/category<?php echo $image_name; ?>"width="100px" >
                      <?php

                  }
                  else{
                      //Display the message 
                      echo "<div class='error'>Image not Added.</div>";
                  }

                ?>
               
            </td>
            <td><?php echo $features;?> </td>
            <td><?php echo $active;?></td>
            <td>
                <a href="#" class="btn-secondary">Update category</a>
                <a href="#" class="btn-danger">Delete category </a>
             </td>
             </tr>
                    <?php
                }
            }
            else{
                //we dont have data in database
                //we will display the message inside table 
              ?>
                <tr>
                    <td colspan="6"><div class="error">NO Category Added.</div></td>
               </tr>

              <?php
            }


         ?>
           
            
     </table>
    </div>
</div>
<?php include('partial/footer.php');
?>