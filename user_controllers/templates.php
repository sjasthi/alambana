<?php
require_once ("./blog_controllers/templates.php");
function generate_profile_edit($user)
{
    ?>
    <div>
        <form id="edit-user-form" class="profile-edit-form" method="post" action="user_controllers/edit_user.php">
            <input type="hidden" name="id" value="<?php echo $user["user_id"]; ?>" />
            First Name
            <input type="text" name="first_name" value="<?php echo $user["first_name"]; ?>" />
            Last Name
            <input type="text" name="last_name" value="<?php echo $user["last_name"]; ?>" />
            Profile Picture
            <div class="author-picture-container">
                <img alt="Profile Picture" src=<?php echo htmlspecialchars($user["user_picture_location"] !== null ? $user["user_picture_location"] :
                    "./images/users_pictures/default_profile.png"); ?> />
            </div>
            <br/>
            About Me
            <textarea name="about"><?php echo $user["about"]; ?></textarea>
            Email
            <input type="text" value="<?php echo $user["email"]; ?>" disabled />
            Role
            <select name="role" <?php echo $_SESSION["role"] !== "Administrator" || $user["role"] === "Administrator" ? "disabled " : "" ?>>
                <option value="User" <?php echo $user["role"] === "User" ? "selected " : "" ?>>User</option>
                <option value="Moderator" <?php echo $user["role"] === "Moderator" ? "selected " : "" ?>>Moderator</option>
                <option value="Administrator" <?php echo $user["role"] === "Administrator" ? "selected " : "" ?>>Administrator
                </option>
            </select>
            <br />
            <?php
            if ($_SESSION['role'] === "Administrator") {
                ?>
                <div style="font-size: 24px">
                    <a href="admin_panel.php">
                        Go To Admin Panel
                    </a>
                </div>
                <br />
                <?php
            }
            ?>
            <a href="logout.php">Log Out</a>
            <br />
            <button type="submit" class="btn btn-primary"
                style="border-bottom-right-radius: 12px; border-bottom-left-radius: 12px;">Save Changes</button>
        </form>
    </div>
    <?php
}

function generate_profile_view($user)
{
    ?>
    <div>
        <form class="profile-edit-form">
            First Name
            <input type="text" name="first_name" value="<?php echo $user["first_name"]; ?>" disabled />
            Last Name
            <input type="text" name="last_name" value="<?php echo $user["last_name"]; ?>" disabled />
            Profile Picture
            <div class="author-picture-container">
                <img alt="Profile Picture" src=<?php echo htmlspecialchars($user["user_picture_location"] !== null ? $user["user_picture_location"] :
                    "./images/users_pictures/default_profile.png"); ?> />
            </div>
            <br/>
            About Me
            <textarea name="about" disabled><?php echo $user["about"]; ?></textarea>
            Email
            <input type="text" value="<?php echo $user["email"]; ?>" disabled />
            Role
            <select name="role" disabled>
                <option value="User" <?php echo $user["role"] === "User" ? "selected " : "" ?>>User</option>
                <option value="Moderator" <?php echo $user["role"] === "Moderator" ? "selected " : "" ?>>Moderator</option>
                <option value="Administrator" <?php echo $user["role"] === "Administrator" ? "selected " : "" ?>>Administrator
                </option>
            </select>
            <br />
            <?php
            if ($_SESSION['role'] === "Administrator") {
                ?>
                <div style="font-size: 24px">
                    <a href="admin_panel.php">
                        Go To Admin Panel
                    </a>
                </div>
                <br />
                <?php
            }
            ?>
            <br />
            <a href="logout.php">Log Out</a>
        </form>
    </div>
    <?php
}