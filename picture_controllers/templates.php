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
?>