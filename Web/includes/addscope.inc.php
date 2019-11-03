<?php
    require 'dbh.inc.php';
    if(isset($_POST['addscope-submit']))
    {
        $microscopeName = 'microscope'.$_POST['next_microscope_number'];
        $sql = 'INSERT INTO microscopes (microscope_name) VALUES (?)';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../microscopeconfig.php?error=sqlerror");
			exit();
		}else{
			// Bind microscope name into sql statement
			mysqli_stmt_bind_param($stmt, "s", $microscopeName);

			//execute statment into the database
            mysqli_stmt_execute($stmt);
            header("Location: ../microscopeconfig.php");
			exit();
        }
    }
?>