<title>Webflix | Forgot password</title>

<?php
include('includes/navbar.php');
require('includes/connect_db.php'); // include the database connection file

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $security_answer = $_POST['security_answer'];
    $new_password = $_POST['new_password'];

    // check if email exists in database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = @mysqli_query($link, $query);
    $num_rows = mysqli_num_rows($result);
    
    if($num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $db_security_answer = $row['security_question_1'];

        // check if security answer matches
        if($security_answer == $db_security_answer) {
            $user_id = $row['id'];

            // update the password in the database
            $query = "UPDATE users SET pass = SHA2('$new_password',256) WHERE email='$email'";
            @mysqli_query($link, $query);

            // redirect to login page
            header('Location: login.php');
            exit;
        } else {
            $error_msg = "Incorrect security answer.";
        }
    } else {
        $error_msg = "Email address not found.";
    }
}

?>

<h1>Forgot password</h1>
<br />
<div class="container">
  <div class="row g-3">
    <form action="" method="post" class="form3">
      <div class="col">
        <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email" required>
      </div><br/>
      <div class="col">
        <input type="password" class="form-control" placeholder="New password" aria-label="password" name="new_password" required>
      </div><br /><br />
      <h3>Security question</h3>
      <center>Your mother's maiden name.</center>
      <div class="col">
        <input type="password" class="form-control" placeholder="Answer" aria-label="security" name="security_answer" required>
      </div><br /><br />
      <input type="submit" name="submit" value="Reset Password" class="btn btn-dark  btn-block">
    </form>
  </div>
</div>
