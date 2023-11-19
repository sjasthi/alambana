<?php
ob_start();

/* Main page with two forms: sign up and log in */
include 'shared_resources.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['login'])) { //user logging in

    require 'login.php';
  } elseif (isset($_POST['register'])) { //user registering

    require 'register.php';
  }
}
ob_flush();
?>
<!DOCTYPE html>
<html>


<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- Include the favicon.ico file -->
<?php generateFaviconLink() ?>
<title>Register/Login Form</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
================================================== -->
<?php css(1) ?>

<!-- SCRIPTS
  ================================================== -->
<?php load_common_page_scripts() ?>

<script>
  function validatePassword() {
    var password = document.forms["registrationForm"]["password"].value;
    var confirmPassword = document.forms["registrationForm"]["password_confirm"].value;

    if (password != confirmPassword) {
      alert("Passwords do not match. Please try again.");
      return false;
    }
    return true;
  }
</script>


</head>
  
      <!-- Site Header Wrapper -->
      <?php load_common_page_header(2) ?>
    
  <div class="form">

    <div class="tab-content" style="margin-top: 100px; margin-bottom: 100px;">

      <div id="login">
        <h1 id="welcomeText" style="margin-left: 50px; margin-right: 0px;">Welcome Back!</h1>

        <form action="loginForm.php" method="post" autocomplete="off">

          <div class="field-wrap">
            <label>
              Email Address
              <span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email" />
          </div>
          <div class="field-wrap">
            <label>
              Password <span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password" />
          </div>
          <div class="btnContainer">
            <button class="btn-primary" style="padding: 5px 25px; margin-left: 120px; margin-right: 50px;" name="login" />Log In</button>
            <a href="confirmEmail.php">Forgot password</a>
          </div>
        </form>
      </div>

      <div id="register">
        <h1 id="newUser">Register as a new user</h1>

        <form action="register.php" method="post" autocomplete="off" onsubmit="return validatePassword()" name="registrationForm">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name <span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='first_name' />
            </div>

            <div class="field-wrap">
              <label>
                Last Name <span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='last_name' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address <span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name='email' />
          </div>

          <div class="field-wrap">
            <label>
              Set A Password <span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name='password' />
          </div>
          <div class="field-wrap">
            <label>
              Confirm Password <span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name='password_confirm' />
          </div>
          <button class="btn-primary" style="padding: 5px 25px; margin-left: 230px; margin-right: 50px;"  name="register">Register</button>
        </form>

      </div>

    </div><!-- tab-content -->

  </div> <!-- /form -->

  <!-- Site Footer -->
  <?php load_common_page_footer() ?>
  <!-- Donate Form Modal -->
  <?php donate_dialog() ?>
  <!-- Libraries Loader -->
  <?php lib() ?>
</body>

</html>