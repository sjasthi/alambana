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
            <?php
            if (isset($_SESSION["id"]) && ($_SESSION["id"] == $blog["user_id"] || $_SESSION["role"] === "Administrator")) {
                ?>
                <div class="edit-delete-container">
                    <a href="blog_edit.php?id=<?php echo $blog["id"]; ?>"><button type="button"
                            class="btn btn-info">Edit</button></a>
                    <button type="button" id="delete-blog-button" class="btn btn-danger">Delete</button>
                </div>
                <script>
                    const deleteBlogButton = document.getElementById("delete-blog-button");
                    deleteBlogButton.addEventListener("click", () => {
                        let confirm = window.confirm("Are you sure you want to delete this blog?");
                        if (confirm) {
                            $.ajax({
                                type: "POST",
                                url: "blog_controllers/delete_blog.php",
                                data: { id: <?php echo $blog["id"]; ?> },
                                success: function (res) {
                                    window.location.href = "blogs.php";
                                }
                            });
                        }
                    });
                </script>
                <?php

            }
            ?>
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
            <?php get_blog_pictures($blog["id"], false); ?>
        </div>
    </div>
    <?php
}
function generate_blog_edit($blog)
{
    ?>
    <div class="blog-edit-container">
        <form method="POST" action="blog_controllers/edit_blog.php">
            <input type="hidden" name="blog_id" value="<?php echo $blog["id"]; ?>" />
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
                        <textarea name="title"><?php echo htmlspecialchars($blog["title"]); ?></textarea>
                    </h2>
                </div>
            </div>
            <div class="text-container" style="margin-bottom: 8px;">
                <div class="description-container">
                    <h3>
                        <textarea name="description"><?php echo htmlspecialchars($blog["description"]); ?></textarea>
                    </h3>
                </div>
            </div>
            <label for="video_link">Video Link</label>
            <input type="text" name="video_link" placeholder="Video Link" value="<?php echo $blog["video_link"]; ?>"
                style="width: 100%;" />
            <?php
            if ($blog["video_link"] !== "") {
                ?>
                <div style="margin-bottom: 8px;">
                    <iframe class="video-link-iframe" style="width: 100%; height: 400px;"
                        src="<?php echo $blog["video_link"]; ?>" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <?php
            }
            ?>
            <div style="margin: 8px;">
                <textarea name="content" rows=10><?php echo htmlspecialchars($blog["content"]); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Make Changes</button>
        </form>
        <div style="margin-bottom: 8px; margin-top: 8px;">
            <?php get_blog_pictures($blog["id"], true); ?>
        </div>
    </div>
    <?php
}

function generate_new_blog_form()
{
    ?>
    <style>
        .blog-post-form {
            margin: 16px auto 16px auto;
            max-width: 800px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 3px solid lightblue;
            border-radius: 16px;
        }

        .blog-post-form textarea {
            resize: none;
            width: calc(100% - 32px);
        }

        .blog-post-form input {
            width: calc(100% - 32px);
        }

        .blog-post-form input[type="file"] {
            width: auto;
            margin: auto;
        }
    </style>
    <div class="blog-post-form">
        <form action="blog_controllers/submit_blog.php" method="POST" enctype="multipart/form-data">
            <label>Blog Title</label>
            <br>
            <input id="title" type="text" name="title" maxlength=100 required>
            <br><br>
            <label for="description">Description</label>
            <br>
            <textarea name="description" rows="3" cols="100" maxlength="160" required></textarea>
            <br><br>
            <label>Video Link</label>
            <br>
            <input type="text" name="video_link" maxlength=2048 placeholder="Optional">
            <br><br>
            <label for="content">Content</label>
            <br>
            <textarea name="content" rows="10" cols="100" required></textarea>
            <br>
            <label>Image(s)</label>`
            <br>
            <input type="file" name="file[]" accept="image/*" multiple="multiple">
            <br>
            <br>
            <input type="submit" class="btn btn-primary btn-lg" name="create_post" value="Publish">
        </form>
    </div>
    <?php
}
?>
