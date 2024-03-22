<?php
function generate_blog($blog)
{
    ?>
    <a href="blog_view.php?id=<?php echo $blog["id"]; ?>">
        <div class="blog-container">
            <div class="info-container">
                <div class="author-container">
                    <img alt="Profile Picture" src=<?php echo htmlspecialchars($blog["user_picture_location"] !== null ? $blog["user_picture_location"] : "./images/users_pictures/default_profile.png"); ?> /><?php echo htmlspecialchars($blog["first_name"] . " " . $blog["last_name"]); ?><br />
                </div>
                <div class="time-container">
                    <?php echo htmlspecialchars($blog["modified_time"]) ?>
                </div>
            </div>
            <div class="text-container">
                <div class="title-container">
                    <?php echo htmlspecialchars($blog["title"]); ?>
                </div>
                <div class="description-container">
                    <?php echo htmlspecialchars($blog["description"]); ?>
                </div>
            </div>
        </div>
    </a>
    <?php
}
?>