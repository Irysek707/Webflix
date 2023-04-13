<?php

#Open database connection
require('includes/connect_db.php');

# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}
    ORDER BY booking_date DESC LIMIT 1";

$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {

    echo '<h3>Last booking</h3><div class="container">';
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '<div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Booking ' . $row['booking_id'] . '  </h4>
            <p>Booking date:  ' . $row['booking_date'] . ' </p>
            <center><img src="img/qrcode.png"></center><br/></div><br/><br/>';
    }
}
echo '<div>';


# Close database connection.
mysqli_close($link);

?>