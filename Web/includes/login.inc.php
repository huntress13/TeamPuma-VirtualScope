<?php
if(isset($_POST['login-submit'])){
	require 'dbh.inc.php';
	//login with either email or username
	$username = $_POST['username'];
	$password =$_POST['pwd'];

	if (empty($username) || empty($password)){
		header("Location: ../loginpage.php?error=emptyfield");
		exit();
	}else{
			$sql = "SELECT * FROM users WHERE username=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				//checking to see if sql statement is valid
				header("Location: ../loginpage.php?error=sqlerror");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				$results = mysqli_stmt_get_result($stmt);
				//$results is raw data right now
				// so we need to convert it somehow
				//thus we use the following array to store it

				if($row = mysqli_fetch_assoc($results)){
					//checking to see if the password matches
					//below is a boolean value
					$pwdCheck = password_verify($password, $row['password']);
					if($pwdCheck == false){
						header("Location: ../loginpage.php?error=wrongpwd");
						exit();
					}else if($pwdCheck == true){
						//else if to make sure the pwd is actually valid
						//start a session variable
						//create a global variable of the user when they are sign into the
						//website
						session_start();
						$_SESSION['id']=$row['uid'];
						$_SESSION['name']=$row['first_name'];
						$_SESSION['username']=$row['username'];
						$_SESSION['userType']=$row['user_type'];
						$_SESSION['loggedIn'] = TRUE;
						
						//TO DO: CODE TO SEND TO DATABASE TO TRACK LOGIN RECORD
						$sql = "INSERT logins VALUES (?, LOCALTIMESTAMP);";
						$stmt = mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt, $sql)){
							header("Location: ../loginpage.php?error=sqlerror");
							exit();
						}else{
							//take infor from user gave us and put in the database
							//passed in with stmt and the type string
							mysqli_stmt_bind_param($stmt, "d", $_SESSION['id']);
							//passing more than one param
							//($stmt, "ss", $username, $pwd)
							//execute statment into the database
							mysqli_stmt_execute($stmt);
						}
						
						header("Location: ../homepage.php");
						exit();
					}else{
						//in case it's not true or false
						//rarely will happen
						header("Location: ../loginpage.php?error=wrongpwd");
						exit();
					}
				}else{
					header("Location: ../loginpage.php?error=nouser");
				}
			}
		}
}
else{
	header("Location: ../index.php");
	exit();
}
