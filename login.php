<title>Webflix | Sign in</title>

<?php
#Include HTML static file login.html
include('includes/login.php');

#DISPLAY COMPLETE LOGIN PAGE
# Display any error messages if present
if (isset($errors) && !empty($errors)) {
  echo '<p id="err_msg">Oops! There was a problem:</br>';
  foreach ($errors as $msg) {
    echo "- $msg<br>";
  }
  echo 'Please try again or <a href="register.php">Register</a></p>';
}
?>
<h1>Login to your account</h1>
<br />
<div class="container">
  <div class="row g-3">
    <form action="login_action.php" method="post" class="form3">
      <div class="col">
        <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email">
      </div><br />
      <div class="col">
        <input type="password" class="form-control" placeholder="Password" aria-label="password" name="pass">
      </div><br /> 
      <center><a href="forgot_password.php">Forgot password?</a></center><br/>
      <div class="col elo">
        <input type="submit" class="btn btn-dark  btn-block" value="Login">
      </div>
      <br/><center>If you don't have an account <a href="register.php">Sign up here</a>.</center>
    </form>
  </div>
</div>