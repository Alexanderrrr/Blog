<?php
include("../content/connection.php");

?>

<?php

    $sql = "SELECT id,title FROM posts ORDER BY created_at DESC LIMIT 6";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();

?>


<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest Posts</h4>
        <?php
           foreach ($posts as $post) {

         ?>

        <p><a href="../content/single_post.php?id=<?php echo($post['id']) ?>"><?php echo ($post['title']) ?></a></p>

        <?php
            };

         ?>
       </div>

</aside>
