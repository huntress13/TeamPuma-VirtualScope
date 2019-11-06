<?php
    session_start(); //start the session
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
    $loggedIn = isset($_SESSION['loggedIn']) ? $_SESSION['loggedIn'] : FALSE;
    $userType = isset($_SESSION['userType']) ? $_SESSION['userType'] : 'none';
?>