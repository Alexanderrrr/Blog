<?php
    include("connection.php");
    $postId = $_POST["postId"];
 ?>


 <?php
      $sql = " DELETE posts,comments FROM posts LEFT JOIN comments ON
      comments.post_id=posts.ID WHERE posts.ID=$postId";
     $statement = $connection->prepare($sql);
     $statement->execute();

     header("Location: posts.php");

 ?>
