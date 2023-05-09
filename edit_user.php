<?php
session_start();

require('includes/connect_db.php');

if (!isset($_SESSION['admin_id'])) {
  header('Location: admin_login.php');
  exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted user ID
    $user_id = $_POST["user_id"];

    // Retrieve the updated user details
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $contact_number = $_POST["contact_number"];
    $country = $_POST["country"];
    $permissions = $_POST["permissions"];
    $new_password = $_POST["pass"];

    // Prepare the UPDATE statement
    $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, dob = ?, contact_number = ?, country = ?, permissions = ? WHERE user_id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($link, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sssssssi", $first_name, $last_name, $email, $dob, $contact_number, $country, $permissions, $user_id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // The update was successful, now update the password if provided
        if (!empty($new_password)) {
            $query = "UPDATE users SET pass = SHA2(?, 256) WHERE user_id = ?";

            // Prepare the statement
            $stmt = mysqli_prepare($link, $query);

            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "si", $new_password, $user_id);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                // The password update was successful
                header("Location: admin.php");
                exit();
            } else {
                // An error occurred during the password update
                echo "Error updating password: " . mysqli_error($link);
            }
        } else {
            // Redirect to admin page after successful update
            header("Location: admin.php");
            exit();
        }
    } else {
        // An error occurred during the update
        echo "Error updating user details: " . mysqli_error($link);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($link);
}
?>
