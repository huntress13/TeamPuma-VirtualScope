<?php
session_start();

//deletes all the values in thesession variables
session_unset();
session_destroy();

header("Location: ../index.php");
exit();
