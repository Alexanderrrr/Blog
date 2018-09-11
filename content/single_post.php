

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
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
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


            <form name="firstForm" action="create_comment.php" onsubmit="return commentForm()" method="post">
              <div class="form-group">
                <label for="commentName">Your Name </label>
                <input name="fname" type="text" class="form-control" placeholder="Enter Name" value="">
                <small  class="form-text text-muted">This name and comment are public</small>
              </div>
              <div class="form-group">
                <label for="">Enter Your Comment</label>
                <textarea name="comment" class="form-control" rows="8" cols="80"></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form><br><br>

            <script type="text/javascript">
                function commentForm () {
                  var formName = document.forms["firstForm"]["fname"].value;
                  var formComment = document.forms["firstForm"]["comment"].value;
                  if (formComment === "" || formName === "") {
                      alert("All Fields Required");
                      return false;
                    }

                }



            </script>


            <button
                onclick="hidingComments()" id="b" class="btn btn-default" type="button" name="hide-button">Hide Comments
            </button>

            <!-- skrivanje komentara -->
            <script type="text/javascript">
                function hidingComments () {
                    var btn = document.getElementById('b');
                    var btnComments = document.getElementById("postComments");

                    if (btnComments.style.display === "none") {
                        btnComments.style.display = "block";
                        btn.innerText = "Hide Comments";

                    } else {

                        btnComments.style.display = "none";
                        btn.innerText="Show Comments";

                      }


                }



            </script>
            <br><br>

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
