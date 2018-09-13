<?php
include("connection.php");
include("../php_templates/prepareQuery.php");


$title = $_POST["titleName"];
$author = $_POST["YourName"];
$body = $_POST["bodyText"];

 ?>
<?php
    $sql = "INSERT INTO posts (title,author, body) VALUES ('$title', '$author', '$body')";
    prepareAndExecute($sql, $connection);
    header("Location: posts.php");
 ?>
