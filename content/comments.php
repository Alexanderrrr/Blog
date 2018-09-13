
             <div id="postComments">
                 <?php
                     foreach ($comments as $comment) {
                 ?>
                     <ul>
                         <li><?php echo($comment['author']) ?> </li>

                             <ul>
                                 <li><?php echo ($comment['text'])?></li>
                             </ul>

                     </ul>

                     <form name="deleteForm" action="delete_comment.php" method="post">

                       <button class="btn btn-default" type="submit" name="delete-button">delete</button>
                       <input type="hidden" name="postId" value=<?php echo $postId ?>>
                       <input type="hidden" name="commentId" value=<?php echo $comment['comments_id'] ?>>


                     </form>


                     <hr>
                 <?php
               };
                 ?>

             </div>
