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
            <?php
            if (isset($_SESSION["id"]) && ($_SESSION["id"] == $comment["user_id"] || $_SESSION["role"] === "Administrator")) {
                ?>
                <div class="edit-delete-container">
                    <button type="button" id="edit-comment-<?php echo $comment["id"]; ?>-button"
                        class="btn btn-info">Edit</button>
                    <button type="button" id="delete-comment-<?php echo $comment["id"]; ?>-button"
                        class="btn btn-danger">Delete</button>
                </div>
                <script>
                    const editComment<?php echo $comment["id"]; ?>Button = document.getElementById("edit-comment-<?php echo $comment["id"]; ?>-button");
                    const deleteComment<?php echo $comment["id"]; ?>Button = document.getElementById("delete-comment-<?php echo $comment["id"]; ?>-button");
                    deleteComment<?php echo $comment["id"]; ?>Button.addEventListener("click", () => {
                        let confirm = window.confirm("Are you sure you want to delete this comment?");
                        if (confirm) {
                            $.ajax({
                                type: "POST",
                                url: "comment_controllers/delete_comment.php",
                                data: { id: <?php echo $comment["id"]; ?> },
                                success: function (res) {
                                    window.location.href = "blog_view.php?id=<?php echo $comment["blog_id"] ?>";
                                }
                            });
                        }
                    });
                </script>
                <?php

            }
            ?>
        </div>
        <div class="text-container">
            <textarea id="comment-<?php echo $comment["id"]; ?>-textarea" class="content-container" disabled><?php echo htmlspecialchars($comment["content"]); ?></textarea>
        </div>
        <script>
            const comment<?php echo $comment["id"]; ?>Textarea = document.getElementById("comment-<?php echo $comment["id"]; ?>-textarea");
            if (typeof editComment<?php echo $comment["id"]; ?>Button !== "undefined") {
                editComment<?php echo $comment["id"]; ?>Button.addEventListener("click", () => {
                    const currentState = editComment<?php echo $comment["id"]; ?>Button.textContent;
                    if (currentState.toUpperCase() === "EDIT") {
                        comment<?php echo $comment["id"]; ?>Textarea.disabled = false;
                        editComment<?php echo $comment["id"]; ?>Button.textContent = "Save";
                    } else {
                        const content = comment<?php echo $comment["id"]; ?>Textarea.value;
                        comment<?php echo $comment["id"]; ?>Textarea.disabled = true;
                        $.ajax({
                            type: "POST",
                            url: "comment_controllers/edit_comment.php",
                            data: { id: <?php echo $comment["id"]; ?>, content },
                            success: function (res) {
                                window.location.href="blog_view.php?id=<?php echo $comment["blog_id"]; ?>"
                                editComment<?php echo $comment["id"]; ?>Button.textContent = "Edit";
                            }
                        });
                    }
                });
            }
        </script>
    </div>
    <?php
}

function generate_new_comment_form($blog_id)
{
    if (isset($_SESSION["id"])) {
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
                    type: "POST",
                    url: "comment_controllers/create_comment.php",
                    data: { content: newCommentTextAreaElement.value, user_id: <?php echo $_SESSION["id"]; ?>, blog_id: <?php echo $blog_id; ?> },// passing the values
                    success: function (res) {
                        window.location.href = "blog_view.php?id=<?php echo $blog_id; ?>";
                    }
                });
            });

        </script>
        <?php
    }
}
?>