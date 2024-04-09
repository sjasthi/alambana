<?php
function generate_banner($title, $imageSrc)
{
    ?>
    <div class="hero-area">
        <div class="page-banner parallax" id="banner" style="background-image:url(<?php echo $imageSrc; ?>);">
            <div class="container">
                <div class="page-banner-text">
                    <h1 class="block-title"><?php echo $title; ?></h1>
                    <?php
                    if (isset($userRole) && $userRole === "admin") {
                        // Display the "Change Image" button for admin users
                        echo '<label for="imageUpload" class="custom-file-upload">Change Banner Image</label>';
                        echo '<input type="file" id="imageUpload" accept="image/*" multiple="multiple">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}