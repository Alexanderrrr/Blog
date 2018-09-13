<?php
include("connection.php");
include("../php_templates/prepareQuery.php");

$fname = "";
$comment = "";
$postId = $_POST["postId"];
?>
<?php


$fname = $_POST["fname"];
$comment = $_POST["comment"];

 ?>
<?php
    $sql = "INSERT INTO comments (author, text, post_id) VALUES ('$fname', '$comment', '$postId')";
    prepareAndExecute($sql, $connection);

    header("Location: single_post.php?id=$postId");


 ?>
