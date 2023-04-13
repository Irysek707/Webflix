<title>ECinema | Register to the website</title>

<?php

#Include HTML static file login.html
include('includes/login.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('includes/connect_db.php');
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
    if (empty($_POST['card_number'])) {
        $errors[] = 'Enter your card number.';
    } else {
        $cn = mysqli_real_escape_string($link, trim($_POST['card_number']));
    }
    if (empty($_POST['exp_month'])) {
        $errors[] = 'Enter your card\'s expiration month.';
    } else {
        $exp_m = mysqli_real_escape_string($link, trim($_POST['exp_month']));
    }
    if (empty($_POST['exp_year'])) {
        $errors[] = 'Enter your card\'s expiration year.';
    } else {
        $exp_y = mysqli_real_escape_string($link, trim($_POST['exp_year']));
    }
    if (empty($_POST['cvv'])) {
        $errors[] = 'Enter your card\'s CVV.';
    } else {
        $cvv = mysqli_real_escape_string($link, trim($_POST['cvv']));
    }
    if (empty($errors)) {
        $q = "SELECT user_id FROM users WHERE email=$e";
        $r = @mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0)
            $errors[] = 'Email address already registered.';
    }
    if (empty($errors)) {
        $q = "INSERT INTO users
        (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date)
        VALUES ('$fn','$ln','$e', SHA2('$p',256),$cn, $exp_m, $exp_y, $cvv, NOW())";
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
    <form action="register.php" method="post">
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
                <input type="text" class="form-control" placeholder="Card number" aria-label="Card number"
                    name="card_number" id="card_number">
            </div>
            <div class="col">
                <input type="password" class="form-control" placeholder="CVV" aria-label="CVV" name="cvv" id="cvv">
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Expiration month" aria-label="Expiration month"
                    name="exp_month" id="exp_month">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Expiration year" aria-label="Expiration year"
                    name="exp_year" id="exp_year">
            </div>
        </div>
        <br />
        <div class="col-12 elo">
            <button class="btn btn-dark" type="submit">Register</button><a href="login.php"><button
                    class="btn btn-dark" type="button">Login</button></a>
        </div>
</div>
</form>
</div>