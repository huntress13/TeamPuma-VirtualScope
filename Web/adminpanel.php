<?php require "includes/sessionsconfig.inc.php";

    if($userType != "admin"){
        header("Location: index.php");
    }
?>

<html>
Hello World!
</html>