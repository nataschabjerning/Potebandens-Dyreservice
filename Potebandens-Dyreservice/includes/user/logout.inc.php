<?php
    // destroy session to unset username/id
    session_start();
    session_unset();
    session_destroy();

    // send user back to front page
    header("location: ../../index.php");
    exit();