<?php
session_start();
// set time-out period (in seconds)
 $inactive = 10;

// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("location:lock.php");
    }
}

$_SESSION["timeout"] = time();
?>
