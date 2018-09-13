<?php
    include("connection.php");
    include("../php_templates/prepareQuery.php");

    $commentId = $_POST["commentId"];
    $postId = $_POST["postId"];
 ?>


 <?php
     $sql= "DELETE  FROM comments WHERE id=$commentId";
     prepareAndExecute($sql, $connection);
     header("Location: single_post.php?id=$postId");

 ?>
