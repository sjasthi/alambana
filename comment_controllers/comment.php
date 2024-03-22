<?php
function generate_comment($comment)
{
    ?>
    <div class="comment-container">
        <?php
        echo $comment["content"];
        ?>
    </div>
    <?php
}

function generate_new_comment_form()
{
?>
<textarea class="new-comment-textarea"></textarea>
<button>Post</button>
<?php
}
?>