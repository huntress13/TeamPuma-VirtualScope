<?php
if(isset($_POST['updatescope-submit'])){
	require 'dbh.inc.php';
	//get the post variables
	$mID = $_POST['mid'];
    $microscopeName = $_POST['microscope_name'];
    $experimentName = $_POST['experiment_name'];
    $courseName = $_POST['course_name'];
    $availability = $_POST['availability'];
    $timeIncrement = $_POST['picture_time_increment'];
    $state = $_POST['state'];

	if (empty($mID) || empty($microscopeName) || empty($timeIncrement)){
		header("Location: ../microscopeconfig.php?error=emptyfield");
		exit();
	}else{
			$sql = "UPDATE microscopes 
                    SET microscope_name=?,
                        experiment_name=?,
                        course_name=?,
                        availability=?,
                        picture_time_increment=?,
                        state=?
                    WHERE mid=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				//checking to see if sql statement is valid
				header("Location: ../index.php?error=sqlerror");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "ssssssd", $microscopeName, $experimentName, $courseName, $availability, $timeIncrement, $state, $mID);
				mysqli_stmt_execute($stmt);
				header("Location: ../microscopeconfig.php");
				exit();
			}
		}
}
else{
	header("Location: ../microscopeconfig.php");
	exit();
}
