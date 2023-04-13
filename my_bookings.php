<title>ECinema | My bookings</title>

<?php

#Set page title and display header section
$page_title = 'Bookings';
include('includes/logout.php');

include(('last_booking.php'));

#Open database connection
require('includes/connect_db.php');

# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}
    ORDER BY booking_date DESC";

$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    echo '<br/><h3>Booking history</h3><div class="container">';
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '<div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Booking ' . $row['booking_id'] . '  </h4>
            <p>Booking date:  ' . $row['booking_date'] . ' </p></div>';
    }
} else {
    echo '<h3>Booking history</h3><div class="container">
            <br>
            <div class="alert alert-dark" role="alert"><br/>
            <p>You have no bookings.</p>
            </div>
            </div>';
}




# Close database connection.
mysqli_close($link);


?>