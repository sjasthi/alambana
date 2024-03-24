<?php
require_once "full_screen_menu.php";
require_once "style.php";
function generate_header()
{
    generate_header_styling();
    ?>

    <nav class="navbar">
        <div class="logo-container">
            <a href="index.php"><img src="./images/logo.png" alt="Logo"></a>
        </div>
        <ul class="link-container">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li id="about-link">
                <a href="about.php">About</a>
                <div class="about-dropdown">
                    <ul style="list-style-type: none;">
                        <li>
                            <a href="team.php" style="color: white;">Team</a>
                        </li>
                        <li>
                            <a href="our-impact.php" style="color: white;">Our Impact</a>
                        </li>
                        <li>
                            <a href="contact.php" style="color: white;">Contact</a>
                        <li>
                    </ul>
                </div>
            </li>
            <li id="community-link">
                <a href="community-support.php">Community</a>
                <div class="community-dropdown">
                    <ul style="list-style-type: none;">
                        <li>
                            <a href="causes-education.php" style="color: white;">Education</a>
                        </li>
                        <li>
                            <a href="causes-hunger.php" style="color: white;">Hunger Reflief</a>
                        </li>
                        <li>
                            <a href="causes-women.php" style="color: white;">Woman's Empowerment</a>
                        <li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="events.php">Events</a>
            </li>
            <li>
                <a href="gallery-caption-2cols.php">Gallery</a>
            </li>
            <li id="blogs-link">
                <a href="blogs.php">Blogs</a>
                <div class="blogs-dropdown">
                    <ul style="list-style-type: none;">
                        <li>
                            <a href="blogs.php" style="color: white;">View Blogs</a>
                        </li>
                        <li>
                            <a href="new_blog_entry.php" style="color: white;">Post a Blog</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="info-container">
            (951) 821-6051
            <a href="logInForm.php"><button type="button" class="sign-in-button btn btn-primary">Sign in</button></a>
        </div>
        <div class="button-container">
            <div class="burger-bar"></div>
            <div class="burger-bar"></div>
            <div class="burger-bar"></div>
        </div>
    </nav>
    <?php
    generate_full_screen_menu();
    ?>
    <script>
        const navBarElement = document.getElementsByClassName("navbar")[0];
        const linkContainerElement = document.getElementsByClassName("link-container")[0];
        const buttonContainerElement = document.getElementsByClassName("button-container")[0];
        const signInButtonElement = document.getElementsByClassName("sign-in-button")[0];
        const aboutDropDownElement = document.getElementsByClassName("about-dropdown")[0];
        const aboutLinkElement = document.getElementById("about-link");
        const communityDropDownElement = document.getElementsByClassName("community-dropdown")[0];
        const communityLinkElement = document.getElementById("community-link");
        const blogsDropDownElement = document.getElementsByClassName("blogs-dropdown")[0];
        const blogsLinkElement = document.getElementById("blogs-link");
        const signInButtonDisplay = signInButtonElement.style.display;
        const menuButton = document.getElementsByClassName("button-container")[0];
        const fullScreenMenuElement = document.getElementsByClassName("full-screen-menu")[0];
        const fullScreenMenuExitButton = document.getElementsByClassName("full-screen-menu-exit-button")[0];
        const resizeObserver = new ResizeObserver(entries => {
            console.log(entries[0].target.clientWidth);
            if (entries[0].target.clientWidth < 800) {
                linkContainerElement.style.display = "none";
                signInButtonElement.style.display = "none";
                buttonContainerElement.style.display = "block";
            } else {
                linkContainerElement.style.display = "flex"
                signInButtonElement.style.display = signInButtonDisplay;
                buttonContainerElement.style.display = "none";
            }
        });
        aboutLinkElement.addEventListener("mouseenter", (event) => {
            aboutDropDownElement.style.display = "block";
        });
        aboutLinkElement.addEventListener("mouseleave", (event) => {
            aboutDropDownElement.style.display = "none";
        });
        communityLinkElement.addEventListener("mouseenter", (event) => {
            communityDropDownElement.style.display = "block";
        });
        communityLinkElement.addEventListener("mouseleave", (event) => {
            communityDropDownElement.style.display = "none";
        });
        blogsLinkElement.addEventListener("mouseenter", (event) => {
            blogsDropDownElement.style.display = "block";
        });
        blogsLinkElement.addEventListener("mouseleave", (event) => {
            blogsDropDownElement.style.display = "none";
        });
        menuButton.addEventListener("click", (event) => {
            fullScreenMenuElement.style.display = "flex";
        })
        fullScreenMenuExitButton.addEventListener("click", (event) => {
            fullScreenMenuElement.style.display = "none";
        })
        resizeObserver.observe(navBarElement);

    </script>
    <?php
}
?>
<!--<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="#"><img src="./images/logo.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDarkDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    About
                </a>
                <ul class="dropdown-menu dropdown-menu-info" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDarkDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Community
                </a>
                <ul class="dropdown-menu dropdown-menu-info" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Education</a></li>
                    <li><a class="dropdown-item" href="#">Hunger Relief</a></li>
                    <li><a class="dropdown-item" href="#">Woman Empowerment</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Events</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDarkDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Blogs
                </a>
                <ul class="dropdown-menu dropdown-menu-info" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">View Blogs</a></li>
                    <li><a class="dropdown-item" href="#">Post Blog</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Donate Now</a>
            </li>
        </ul>
        <span class="navbar-text text-light">
            (951) 821-6051
            <a href="#">Sign in</a>
        </span>
    </div>
</nav>!-->