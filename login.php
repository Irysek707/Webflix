<title>ECinema | Login to the website</title>

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
    <form action="login_action.php" method="post">
      <div class="col">
        <input type="email" class="form-control" placeholder="Email" aria-label="First name" name="email">
      </div><br />
      <div class="col">
        <input type="password" class="form-control" placeholder="Password" aria-label="Last name" name="pass">
      </div><br />
      <div class="col elo">
        <input type="submit" class="btn btn-dark" value="Login"><a href="register.php"><button type="button"
            class="btn btn-dark">Register</button></a>
      </div>
    </form>
  </div>
</div>