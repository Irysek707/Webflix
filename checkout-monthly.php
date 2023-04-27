<?php

session_start();

# Open database connection.
require('includes/connect_db.php');

#Get user_id from session
$user_id = $_SESSION['user_id'];


// Check if the user already has an active subscription
$sql = "SELECT * FROM subscriptions WHERE user_id = '$user_id' AND expiration_date >= NOW()";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 0) {
    // The user does not have an active subscription, so add a new one
    $subscription_id = uniqid(); // Generate a unique ID for the new subscription
    $subscription_date = date("Y-m-d"); // Set the subscription date as the current date
    $status = "active";
    $expiration_date = date("Y-m-d", strtotime("+30 days")); // Set the expiration date as 30 days from the current date

    $sql = "INSERT INTO subscriptions (subscription_id, subscription_date, status, expiration_date, user_id)
VALUES ('$subscription_id', '$subscription_date', '$status', '$expiration_date', '$user_id')";
    mysqli_query($link, $sql);
} else {
    // The user already has an active subscription, so update the expiration date if it has expired
    $row = mysqli_fetch_assoc($result);
    $current_date = date("Y-m-d");
    $expiration_date = $row['expiration_date'];

    if ($expiration_date < $current_date) {
        $expiration_date = date("Y-m-d", strtotime("+30 days")); // Set the expiration date as 30 days from the current date
        $sql = "UPDATE subscriptions SET expiration_date = '$expiration_date' WHERE subscription_id = '" . $row['subscription_id'] . "'";
        mysqli_query($link, $sql);
    } else {
        $expiration_date = date("Y-m-d", strtotime($row['expiration_date'] . "+30 days")); // Set the expiration date as 30 days from the current expiration date
        $sql = "UPDATE subscriptions SET expiration_date = '$expiration_date' WHERE subscription_id = '" . $row['subscription_id'] . "'";
        mysqli_query($link, $sql);

    }
}

?>