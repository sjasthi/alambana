<?php
function generate_picture_carousel($pictures)
{
    ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            foreach ($pictures as $index => $picture) {
                ?>
                <li data-target="#carouselExampleControls" style="box-shadow: 0 0 4px rgba(0, 0, 0, 1);"
                    data-slide-to="<?php echo $index; ?>" <?php echo $index == 0 ? "class='active'" : "" ?>></li>
                <?php
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            foreach ($pictures as $index => $picture) {
                ?>
                <div class="carousel-item<?php echo $index == 0 ? " active" : "" ?>">
                    <img class="d-block w-100" src="<?php echo $picture["location"]; ?>" alt="slide">
                </div>
                <?php
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"
                style="box-shadow: 0 0 4px rgba(0, 0, 0, 1); border-radius: 8px; background-color: rgb(0, 0, 0, 0.15)"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"
                style="box-shadow: 0 0 4px rgba(0, 0, 0, 1); border-radius: 8px; background-color: rgb(0, 0, 0, 0.15)"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php
}
function generate_picture_carousel_edit($pictures)
{
    ?>
    <div style="width: 100%; text-align: center;">
        <label>Add Image(s)</label>
        <form method="POST" action="picture_controllers/create_pictures.php" enctype="multipart/form-data">
            <input type="hidden" name="blog_id" value="<?php echo $pictures[0]['blog_id'] ?>" />
            <input type="hidden" name="redirect" value="blog_view.php?id=<?php echo $pictures[0]['blog_id'] ?>" />
            <input type="file" name="file[]" accept="image/*" multiple="multiple" style="display: inline-block;">
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        <div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    foreach ($pictures as $index => $picture) {
                        ?>
                        <li data-target="#carouselExampleControls" style="box-shadow: 0 0 4px rgba(0, 0, 0, 1);"
                            data-slide-to="<?php echo $index; ?>" <?php echo $index == 0 ? "class='active'" : "" ?>></li>
                        <?php
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    foreach ($pictures as $index => $picture) {
                        ?>
                        <div class="carousel-item<?php echo $index == 0 ? " active" : "" ?>">
                            <button type="button" class="btn btn-danger" id="delete-picture-<?php echo $picture["id"]; ?>"
                                style="text-align: right;">
                                Delete
                            </button>
                            <script>
                                const deletePicture<?php echo $picture["id"]; ?> = document.getElementById("delete-picture-<?php echo $picture["id"]; ?>");
                                deletePicture<?php echo $picture["id"]; ?>.addEventListener("click", (e) => {
                                    $.ajax({
                                        type: "GET",
                                        url: "picture_controllers/delete_picture.php?id=<?php echo $picture["id"]; ?>",
                                        success: function (res) {
                                            window.location.href = "blog_edit.php?id=<?php echo $picture["blog_id"]; ?>";
                                        }
                                    });
                                });

                            </script>
                            <img class="d-block w-100" src="<?php echo $picture["location"]; ?>" alt="slide">
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"
                        style="box-shadow: 0 0 4px rgba(0, 0, 0, 1); border-radius: 8px; background-color: rgb(0, 0, 0, 0.15)"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"
                        style="box-shadow: 0 0 4px rgba(0, 0, 0, 1); border-radius: 8px; background-color: rgb(0, 0, 0, 0.15)"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <a href="blog_view.php?id=<?php echo $pictures[0]["blog_id"]; ?>"><button type="submit" class="btn btn-primary">Done</button></a>
            <?php
}
?>