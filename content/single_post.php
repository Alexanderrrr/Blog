

  <?php
      include("../php_templates/header.php");
      include("connection.php");
      $postId = $_GET['id'];
  ?>

  <main role="main" class="container">

      <div class="row">

          <div class="col-sm-8 blog-main">

            <?php

            // pripremamo upit
            $sql = "SELECT posts.id AS posts_id,
            posts.title, posts.body,
            posts.author AS post_author,
            posts.created_at,
            comments.author AS comments_author,
            comments.text,
            comments.id AS comments_id
            FROM posts
            LEFT JOIN comments ON comments.post_id=posts.id
            WHERE posts.id = $postId";
            $statement = $connection->prepare($sql);

            // izvrsavamo upit
            $statement->execute();

            // zelimo da se rezultat vrati kao asocijativni niz.
            // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            // punimo promenjivu sa rezultatom upita
            $commentsInPosts = $statement->fetchAll();

            $comments = [];
            foreach($commentsInPosts as $value) {
                array_push($comments, ['author' => $value['comments_author'],
                'text' => $value['text'], 'comments_id' => $value['comments_id'] ]);
            }
            ?>
            <div class="blog-post">
                <h2 class="blog-post-title"> <?php echo ($commentsInPosts[0]["title"])?></h2>
                <p class="blog-post-meta"><?php echo ($commentsInPosts[0]["created_at"])?> <a href="#"><?php echo ($commentsInPosts[0]["post_author"])?></a></p>
                <p><?php echo ($commentsInPosts[0]["body"])?></p>
            </div>

            <button onclick='hidingComments()' class="btn btn-primary" type="button" name="hide-button">Hide Comments
            </button>

            <div id="postComments">
                <?php
                    foreach ($comments as $comment) {
                ?>
                    <ul>
                        <li><?php echo($comment['author']) ?>
                            <ul>
                                <li><?php echo ($comment['text'])?></li>
                            </ul>
                        </li>
                    </ul>


                    <hr>
                <?php
                }
                ?>

            </div> <!-- post comments -->

          </div><!-- /.blog-main -->

        <?php include("../php_templates/sidebar.php"); ?>

      </div><!-- /.row -->

  </main><!-- /.container -->
  <?php
  include("../php_templates/footer.php");

   ?>
