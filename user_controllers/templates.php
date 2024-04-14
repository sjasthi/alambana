<?php
function generate_profile_edit($user)
{
    ?>
    <div>
        <form class="profile-edit-form">
            <?php
            if ($user['role'] === "Administrator") {
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
            First Name
            <input type="text" name="first_name" value="<?php echo $user["first_name"] ?>" />
            Last Name
            <input type="text" name="last_name" value="<?php echo $user["last_name"] ?>" />
            Profile Picture
            <div class="author-picture-container">
                <img alt="Profile Picture" src=<?php echo htmlspecialchars($user["user_picture_location"] !== null ? $user["user_picture_location"] :
                    "./images/users_pictures/default_profile.png"); ?> />
            </div>
            About Me
            <textarea name="about"><?php echo $user["about"] ?></textarea>
            Email
            <input type="text" value="<?php echo $user["email"] ?>" disabled />
            Role
            <select name="Role" value="<?php echo $user["role"] ?>" disabled>
                <option value="User">User</option>
                <option value="Moderator">Moderator</option>
                <option value="Administrator">Administrator</option>
            </select>
        </form>
    </div>
    <?php
}