<?php
include("connection.php");


$title = $_POST["titleName"];
$author = $_POST["YourName"];
$body = $_POST["bodyText"]

 ?>
<?php
    $sql2 = "INSERT INTO posts (title,author, body) VALUES ('$title', '$author', '$body')";
    $statement2 = $connection->prepare($sql2);

    $statement2->execute();

    header("Location: posts.php");

 ?>
