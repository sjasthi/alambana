<?php
function generate_full_screen_menu()
{
    ?>
    <div class="full-screen-menu">
        <div class="full-screen-menu-header">
            <button type="button" class="full-screen-menu-exit-button btn btn-secondary">Back</button>
            <a href="loginForm.php"><button type="button" class="sign-in-button btn btn-primary">Sign in</button></a>
        </div>
        <ul>
            
            <li>
                <a href="about.php">About</a>
                
            </li>
            <li>
                <a href="community-support.php">Community</a>
                <div>
                    <ul>
                        <li>
                            <a href="causes-education.php">Education</a>
                        </li>
                        <li>
                            <a href="causes-hunger.php">Hunger Reflief</a>
                        </li>
                        <li>
                            <a href="causes-women.php">Woman's Empowerment</a>
                        <li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="events.php">Events</a>
            </li>
            <li>
                <a href="gallery.php">Gallery</a>
            </li>
            <li>
                <a href="blogs.php">Blogs</a>
                <div>
                    <ul>
                        <li>
                            <a href="blogs.php">View Blogs</a>
                        </li>
                        <li>
                            <a href="blog_new.php">Post a Blog</a>
                        </li>
                    </ul>
                </div>
            </li>
            </li>
            <li>
                <a href="donate.php">Donate Now</a>
            </li>
        </ul>
    </div>
    <?php
}
?>