<title>Webflix | Sign up</title>

<?php

#Include HTML static file login.html
include('includes/login.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('includes/connect_db.php');
    // Check if the checkbox is checked
    if (isset($_POST['terms'])) {
        // Checkbox is checked, continue with registration
        // Add your registration code here
        $errors = array();
        if (empty($_POST['first_name'])) {
            $errors[] = 'Enter your first name.';
        } else {
            $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
        }
        if (empty($_POST['last_name'])) {
            $errors[] = 'Enter your last name.';
        } else {
            $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
        }
        if (empty($_POST['email'])) {
            $errors[] = 'Enter your email.';
        } else {
            $e = mysqli_real_escape_string($link, trim($_POST['email']));
        }
        if (!empty($_POST['pass1'])) {
            if ($_POST['pass1'] != $_POST['pass2']) {
                $errors[] = 'Passwords do not match.';
            } else {
                $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
            }
        } else {
            $errors[] = 'Enter your password.';
        }
        if (empty($_POST['contact'])) {
            $errors[] = 'Enter your contact number.';
        } else {
            $cn = mysqli_real_escape_string($link, trim($_POST['contact']));
        }
        if (empty($_POST['dob'])) {
            $errors[] = 'Enter your date of birth.';
        } else {
            $exp_m = mysqli_real_escape_string($link, trim($_POST['dob']));
        }
        if (empty($_POST['country'])) {
            $errors[] = 'Enter your card\'s expiration year.';
        } else {
            $exp_y = mysqli_real_escape_string($link, trim($_POST['country']));
        }
        if (empty($errors)) {
            $q = "SELECT user_id FROM users WHERE email=$e";
            $r = @mysqli_query($link, $q);
            if (mysqli_num_rows($r) != 0)
                $errors[] = 'Email address already registered.';
        }
        
        if (empty($_POST['security_question_1'])) {
            $errors[] = 'Enter the answer to the security question.';
        } else {
            $sq = mysqli_real_escape_string($link, trim($_POST['security_question_1']));
        }
        if (empty($errors)) {
            $q = "INSERT INTO users
            (first_name, last_name, email, pass, contact, dob, country, security_question_1, reg_date)
            VALUES ('$fn','$ln','$e', SHA2('$p',256), $cn, $exp_m, '$exp_y', '$sq', NOW())";
            $r = @mysqli_query($link, $q);
            if ($r) {
                echo '<div class="container"><p>You are now registered.</p><a href="login.php"></div>
                <div class="container"><button class="btn btn-dark" type="button">Login</button></a></div>';
            }
            mysqli_close($link);
            exit();
        } else {
            echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';
            foreach ($errors as $msg) {
                echo " - $msg<br>";
            }
            echo 'Please try again</p>';
            mysqli_close($link);
        }
    } else {
        // Checkbox is not checked, display error message
        echo "Please accept the terms and conditions.";
    }

}

//Validation
$name_error = $email_error;
$name = $email;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h1>Registration form</h1>
<br />
<div class="container">
    <form action="register.php" method="post" class="form2">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name" aria-label="First name"
                    name="first_name" id="first_name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last_name"
                    id="last_name">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <input type="email" class="form-control" placeholder="Email address" aria-label="Email" name="email"
                    id="email">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="pass1"
                    id="pass1">
            </div>
            <div class="col">
                <input type="password" class="form-control" placeholder="Confirm your password"
                    aria-label="Password confirmation" name="pass2" id="pass2">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Contact" aria-label="Contact"
                    name="contact" id="contact">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Date of birth" aria-label="Date of birth"
                    name="dob" id="dob">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Country" aria-label="Country"
                    name="country" id="country">
            </div>
        </div>
        <br/><br/>
        <h3>Security question</h3>
        Your mother's maiden name.
        <div class="row">
            <div class="col">
                <input type="password" class="form-control" placeholder="Answer" aria-label="Security" name="security_question_1"
                    id="security_question_1">
            </div>
        </div>
        
        <br/>

        <div class="form-check d-flex justify-content-start mb-4 pb-3">
                    <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" name="terms"/>
                    <label class="form-check-label" for="form2Example3">
                      I do accept the <a href="terms.php" target="_blank" class=""><u>Terms and Conditions</u></a> of Webflix.
                    </label>
        </div>
        <div class="col-12 elo">
            <button class="btn btn-dark  btn-block" type="submit">Register</button>
        </div>
        <br/><center>If you already have an account <a href="login.php">Sign in here</a>.</center>
</div>
</form>
</div>
