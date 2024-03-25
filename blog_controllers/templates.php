<?php
require_once "picture_controllers/get_pictures.php";
function generate_blog($blog)
{
    ?>
    <a href="blog_view.php?id=<?php echo $blog["id"]; ?>">
        <div class="blog-container">
            <div class="info-container">
                <div class="author-picture-container">
                    <img alt="Profile Picture" src=<?php echo htmlspecialchars($blog["user_picture_location"] !== null ? $blog["user_picture_location"] : "./images/users_pictures/default_profile.png"); ?> />
                </div>
                <div class="author-time-container">
                    <div class="author-container">
                        <?php echo htmlspecialchars($blog["first_name"] . " " . $blog["last_name"]); ?><br />
                    </div>
                    <div class="time-container">
                        <?php echo htmlspecialchars($blog["modified_time"]) ?>
                    </div>
                </div>
                <div class="title-container">
                    <?php echo htmlspecialchars($blog["title"]); ?>
                </div>
            </div>
            <div class="text-container">
                <div class="description-container">
                    <?php echo htmlspecialchars($blog["description"]); ?>
                </div>
            </div>
        </div>
    </a>
    <?php
}
function generate_blog_view($blog)
{
    ?>
    <div class="blog-view-container">
        <div class="info-container">
            <div class="author-picture-container">
                <img alt="Profile Picture" src=<?php echo htmlspecialchars($blog["user_picture_location"] !== null ? $blog["user_picture_location"] : "./images/users_pictures/default_profile.png"); ?> />
            </div>
            <div class="author-time-container">
                <div class="author-container">
                    <?php echo htmlspecialchars($blog["first_name"] . " " . $blog["last_name"]); ?><br />
                </div>
                <div class="time-container">
                    <?php echo htmlspecialchars($blog["modified_time"]) ?>
                </div>
            </div>
            <div class="title-container">
                <h2>
                    <?php echo htmlspecialchars($blog["title"]); ?>
                </h2>
            </div>
        </div>
        <div class="text-container" style="margin-bottom: 8px;">
            <div class="description-container">
                <h3>
                    <?php echo htmlspecialchars($blog["description"]); ?>
                </h3>
            </div>
        </div>
        <?php
        if ($blog["video_link"] !== "") {
            ?>
            <div style="margin-bottom: 8px;">
                <!--<video width="640" height="360" controls>
                    <source src="<?php echo $blog["video_link"]; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>!-->
                <iframe class="video-link-iframe" style="width: 100%; height: 400px;" src="<?php echo $blog["video_link"]; ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <?php
        }
        ?>
        <div style="margin: 8px;">
            <?php echo htmlspecialchars($blog["content"]); ?>
        </div>
        <div style="margin-bottom: 8px;">
            <?php get_blog_pictures($blog["id"]); ?>
        </div>
    </div>
    <?php
}
?>