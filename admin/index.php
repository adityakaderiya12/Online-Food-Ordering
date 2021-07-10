<?php include('partial/menu.php');?>

     <!--Main content  section starts-->
     <div class="main-content">
        <div class="wrapper">
       <h1>Dashboard</h1></div>
       <br>

       <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    
                    ?>

       <br>
         <div class="col-4 textcenter">
             <h1>5</h1>
             <br/>
             categories
             </div>
             <div class="col-4 textcenter">
             <h1>5</h1>
             <br/>
             categories
             </div><div class="col-4 textcenter">
             <h1>5</h1>
             <br/>
             categories
             </div><div class="col-4 textcenter">
             <h1>5</h1>
             <br/>
             categories
             </div>
             <div class="clearfix"></div>
        </div>
     </div>
      <!--main contentsection stops-->


     <?php include('partial/footer.php')?>