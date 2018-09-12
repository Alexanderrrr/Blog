<?php
include("connection.php");

$fname = "";
$comment = "";
$postId = $_POST["postId"];
?>
<?php


$fname = $_POST["fname"];
$comment = $_POST["comment"];

 ?>
<?php
    $sql2 = "INSERT INTO comments (author, text, post_id) VALUES ('$fname', '$comment', '$postId')";
    $statement2 = $connection->prepare($sql2);

    $statement2->execute();

    header("Location: single_post.php?id=$postId");

 ?>
