<?php
    include("connection.php");
    $commentId = $_POST["commentId"];
    $postId = $_POST["postId"];
 ?>


 <?php
     $sql= "DELETE  FROM comments WHERE id=$commentId";
     $statement = $connection->prepare($sql);
     $statement->execute();

     header("Location: single_post.php?id=$postId");

 ?>
