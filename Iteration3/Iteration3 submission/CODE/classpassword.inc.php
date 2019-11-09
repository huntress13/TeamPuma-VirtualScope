<?php
if (isset($_POST['addcpwd-submit'])) {

	require 'dbh.inc.php';

	//fetch info from admin
	$course_name = $_POST['course_name'];
	$section = $_POST['section'];
	$class_password = $_POST['class_password'];

	//confirm all fields are filled in, if not, exit
	if (empty($course_name) || empty($section) || empty($class_password)){
		header("Location: ../loginpage.php?error=emptyfield");
		exit();
	}else{
		$sql = "INSERT INTO class_passwords(course_name, section, class_password) VALUES (?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				//checking to see if sql statement is valid
				header("Location: ../loginpage.php?error=sqlstatementerror");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "sss", $course_name, $section, $class_password);
					mysqli_stmt_execute($stmt);


					header("Location: ../classpasswordpage.php");
					exit();
			}

	}
	msqli_stmt_close($stmt);
	mysqli_close($conn);
}



else{
	//if user did not access the page through the normal way without clicking the signup button
	header("Location: ../index.php");
	exit();
}