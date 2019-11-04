<?php
if (isset($_POST['deletecpwd-submit'])) {

	require 'dbh.inc.php';

	//fetch info from admin
	$cpid = $_POST['cpid'];
	
		$sql = "DELETE FROM class_passwords WHERE cpid = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				//checking to see if sql statement is valid
				header("Location: ../loginpage.php?error=sqlstatementerror");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "d", $cpid);
					mysqli_stmt_execute($stmt);


					header("Location: ../classpasswordpage.php");
					exit();
			}

	
	msqli_stmt_close($stmt);
	mysqli_close($conn);
	}



else{
	//if user did not access the page through the normal way without clicking the signup button
	header("Location: ../index.php");
	exit();
}