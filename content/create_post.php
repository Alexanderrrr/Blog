<?php
    include("../php_templates/header.php");
 ?>


 <main role="main" class="container">

     <div class="row">

         <div class="col-sm-8 blog-main">
                 <form name="postForm" action="create_post_back.php"  onsubmit="return reqFields()" method="post">
                   <div class="form-group">
                     <label for="titleName">Title Name </label>
                     <input name="titleName" type="text" class="form-control alert alert-danger" placeholder="Enter Name" value="">
                   </div>
                   <div class="form-group">
                     <label for="YourName">Your Name </label>
                     <input name="YourName" type="text" class="form-control alert alert-danger" placeholder="Enter Name" value="">
                     <small  class="form-text text-muted">This name and comment are public</small>
                   </div>
                   <div class="form-group">
                     <label for="bodyText">Enter Your Post</label>
                     <textarea name="bodyText" class="form-control alert alert-danger" rows="8" cols="80"></textarea>

                   </div>

                   <button type="submit" class="btn btn-primary">Submit</button>

                 </form><br><br>

                 <script type="text/javascript">
                     function reqFields () {
                       var formTitle = document.forms["postForm"]["titleName"].value;
                       var formName = document.forms["postForm"]["YourName"].value;
                       var formComment = document.forms["postForm"]["bodyText"].value;

                       if (formTitle === "" || formName === "" || formComment === "") {
                           alert("All Fields Required");
                           return false;
                         }

                     }

                 </script>


               </div><!-- /.blog-main -->

             <?php include("../php_templates/sidebar.php"); ?>

           </div><!-- /.row -->

       </main><!-- /.container -->
 <?php
 include("../php_templates/footer.php");

  ?>
