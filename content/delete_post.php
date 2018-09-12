<?php
    include("connection.php");
    $postId = $_POST["postId"];
 ?>


 <?php
     $sql= "DELETE  FROM posts WHERE id=$postId";
     $statement = $connection->prepare($sql);
     $statement->execute();

     header("Location: posts.php");

 ?>
