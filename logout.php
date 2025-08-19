<?php
session_start();       // Start the session so we can clear it
session_destroy();     // Destroy all session data (log out)
header("Location: login.php"); // Send user back to login page
exit();                // Stop running any more code
?>
