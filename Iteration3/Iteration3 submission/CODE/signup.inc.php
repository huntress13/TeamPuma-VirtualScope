<?php
if (isset($_POST['signup-submit'])) {

	require 'dbh.inc.php';

	//fetch info from the sign up form from user
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$classpwd = $_POST['classpwd'];
	$username = $_POST['uid'];
	$password = $_POST['pwd'];
	$starid = $_POST['starid'];
	$passwordRepeat = $_POST['pwd-repeat'];
	//hard coded login type because majority of the time
	//a new account created will be a student or non admin users
	$userType = "student";
	//checks to see if classpwd is not empty then
	//runs a db query to check to see if it exist
	//if exist the code will count the rows
	//the value should always be 1
	if (!empty($classpwd)) {
		$sql = "SELECT class_password from class_passwords where class_password=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}else{
			//take infor from user gave us and put in the database
			//passed in with stmt and the type string
			mysqli_stmt_bind_param($stmt, "s", $classpwd);
			//passing more than one param
			//($stmt, "ss", $username, $pwd)
			//execute statment into the database
			mysqli_stmt_execute($stmt);
			//now need to check if there is a match
			//by storing results in $stmt
			mysqli_stmt_store_result($stmt);
			$classPwdCheck = mysqli_stmt_num_rows($stmt);
			//should be 1 if classpassword matches
		}
	//user input error handling
	//checks to see if fields are empty
	if(empty($username) || empty($firstname) || empty($password) ||empty($starid) || empty($lastname) ||empty($passwordRepeat) || empty($classpwd)){
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&starid".$starid);
		exit();
	}else if($classPwdCheck == 0) {
		header("Location: ../signup.php?error=classplassword");
		exit();
	}else if($password !== $passwordRepeat){
		//checks to see if password and repeatpassword are the same
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&starid".$starid);
		exit();
	}else{
		//not in else if because will need to check at all time to
		//make sure the user does not use a username already in used
		//done in a safe way with prepared statement without risking security
		//done so with place holder ?
		$sql = "SELECT username FROM users WHERE username=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}else{
			//take infor from user gave us and put in the database
			//passed in with stmt and the type string
			mysqli_stmt_bind_param($stmt, "s", $username);
			//passing more than one param
			//($stmt, "ss", $username, $pwd)
			//execute statment into the database
			mysqli_stmt_execute($stmt);
			//now need to check if there is a match
			//by storing results in $stmt
			mysqli_stmt_store_result($stmt);
			$usernameCheck = mysqli_stmt_num_rows($stmt);
			//should be zero or 1
			if ($usernameCheck>0) {
				header("Location: ../signup.php?error=usertaken&starid=".$starid);
				exit();
			}else{
				$sql = "INSERT INTO users (first_name, last_name, star_id, password, username, user_type) VALUES (?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}else{
					//hash password first then insert new user info record
					//hashing with b crypt
					//don't use outdated hasing such as SHA or MD6
					$hashPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $starid, $hashPwd,$username, $userType);
					mysqli_stmt_execute($stmt);

					header("Location: ../index.php");
					exit();
					}
				}
			}
		}
	}
	msqli_stmt_close($stmt);
	msqli_close($conn);
}
else{
	//if user did not access the page through the normal way without clicking the signup button
	header("Location: ../signup.php");
	exit();
}
