<?php #DISPLAY COMPLETE LOGGED OUT PAGE

#Access session.
session_start();

#Redirect if not logged in.
if (!isset($_SESSION['admin_id'])) {
    require('admin_login_tools.php');
    load();
}

#Clear existing variables.
$_SESSION = array();

#Destroy the session.
session_destroy();

#Display body section.
include('admin.php');


?>