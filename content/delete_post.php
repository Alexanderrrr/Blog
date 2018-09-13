<?php
    include("connection.php");
    include("../php_templates/prepareQuery.php");

    $postId = $_POST["postId"];
 ?>


 <?php

$sql = " DELETE posts,comments FROM posts LEFT JOIN comments ON
comments.post_id=posts.ID WHERE posts.ID=$postId";
prepareAndExecute($sql, $connection);
header("Location: posts.php");



 ?>
