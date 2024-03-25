<?php
function generate_comment($comment)
{
    ?>
    <div class="comment-container">
        <div class="info-container">
            <div class="author-picture-container">
                <img alt="Profile Picture" src=<?php echo htmlspecialchars($comment["user_picture_location"] !== null ? $comment["user_picture_location"] :
                    "./images/users_pictures/default_profile.png"); ?> />
            </div>
            <div class="author-time-container">
                <div class="author-container">
                    <?php echo htmlspecialchars($comment["first_name"] . " " . $comment["last_name"]); ?><br />
                </div>
                <div class="time-container">
                    <?php echo htmlspecialchars($comment["modified_time"]); ?>
                </div>
            </div>
        </div>
        <div class="text-container">
            <div class="description-container">
                <?php echo htmlspecialchars($comment["content"]); ?>
            </div>
        </div>
    </div>
    <?php
}

function generate_new_comment_form($blog_id)
{
    ?>
    <div class="new-comment-container">
        <textarea class="new-comment-textarea" rows="4" placeholder="Leave a comment for the author!"></textarea>
        <button type="submit" class="new-comment-submit-button btn btn-primary">Post</button>
    </div>
    <script>
        const newCommentTextAreaElement = document.getElementsByClassName("new-comment-textarea")[0];
        const newCommentSubmitButtonElement = document.getElementsByClassName("new-comment-submit-button")[0];
        newCommentSubmitButtonElement.addEventListener("click", (e) => {
            $.ajax({
                type: "POST",  //type of method
                url: "comment_controllers/create_comment.php",  //your page
                data: { content: newCommentTextAreaElement.value, user_id: <?php echo $_SESSION["id"]; ?>, blog_id: <?php echo $blog_id; ?> },// passing the values
                success: function (res) {
                    //do what you want here...
                    window.location.href = "blog_view.php?id=<?php echo $blog_id; ?>";
                }
            });
        });

    </script>
    <?php
}
?>