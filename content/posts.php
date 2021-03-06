<?php
    include_once "connection.php";
    include("../php_templates/header.php");
 ?>
 <main role="main" class="container">

     <div class="row">

         <div class="col-sm-8 blog-main">

           <?php
           function executeAndFetch ($var, $connection)
           {
             $statement = $connection->prepare($var);
             $statement->execute();
             $statement->setFetchMode(PDO::FETCH_ASSOC);
             return $statement->fetchAll();
           };

               $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC";

               $posts = executeAndFetch ($sql, $connection);

           ?>
           <?php
               foreach ($posts as $post) {

           ?>
                 <div class="blog-post">
                     <h2 class="blog-post-title"><a href="../content/single_post.php?id=<?php echo($post['id']) ?>"><?php echo($post["title"]) ?></a></h2>
                     <p class="blog-post-meta"><?php echo($post["created_at"]) ?>by <a href="#"><?php echo($post["author"]) ?></a></p>
                     <p><?php echo($post["body"]) ?></p>
                     <hr>
                 </div>
         <?php
              };
          ?>

         </div>

       <?php include("../php_templates/sidebar.php"); ?>

     </div>

 </main>
 <?php
 include("../php_templates/footer.php");

  ?>
