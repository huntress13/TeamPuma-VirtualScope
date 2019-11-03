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
			$mysqli = new mysqli( 'localhost', 'root', '', 'virtualscope' );
			$sql ='SELECT uid, first_name, last_name, star_id, username, password, user_type FROM users WHERE username=?';
			$stmt = $mysqli -> prepare($sql);
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($uid, $firsts_name, $last_name,$star_id, $dbusername, $dbpwd, $user_type);
			$stmt->fetch();
			/* fetch values */

			        // printf("%s %s\n", $uid, $first_name, $last_name, $star_id, $dbusername, $dbpwd, $user_type);

			    $pwdCheck = password_verify($password, $dbpwd);
				if($pwdCheck == false){
					header("Location: ../loginpage.php?error=wrongpwd");
					exit();
				}else if($pwdCheck == true){
						//else if to make sure the pwd is actually valid
						//start a session variable
						//create a global variable of the user when they are sign into the
						//website
						session_start();
						$_SESSION['id']=$uid;
						$_SESSION['name']=$first_name;
						$_SESSION['username']=$dbusername;
						$_SESSION['userType']=$user_type;
						$_SESSION['loggedIn'] = TRUE;

						//TO DO: CODE TO SEND TO DATABASE TO TRACK LOGIN RECORD
						$sql = "INSERT INTO logins VALUES (?, LOCALTIMESTAMP);";
						$stmt2 = mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt2, $sql)){
							header("Location: ../loginpage.php?error=sqlerror");
							exit();
						}else{
							//take infor from user gave us and put in the database
							//passed in with stmt and the type string
							mysqli_stmt_bind_param($stmt2, "d", $_SESSION['id']);
							//passing more than one param
							//($stmt, "ss", $username, $pwd)
							//execute statment into the database
							mysqli_stmt_execute($stmt2);
							header("Location: ../homepage.php");
							exit();
						}
				}else{
					//in case it's not true or false
					//rarely will happen
					header("Location: ../loginpage.php?error=wrongpwd");
					exit();
				}

			/* close statement */
			//$stmt->close();


	}



		// else{
		// 	header("Location: ../loginpage.php?error=nouser");
		// }
}else{
	header("Location: ../index.php");
	exit();
}
