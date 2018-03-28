<?php

//First we start a session
session_start();

//We then check if the user has clicked the login button
if (isset($_POST['submit'])) {

	//Then we include the database connection
	include_once 'dbh.inc.php';
	//And we get the data from the login form
	$uid = $_POST['username'];
	$pwd = $_POST['password'];

	//Error handlers
	//Error handlers are important to avoid any mistakes the user might have made when filling out the form!
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	}
	else {

		//Check if username exists in the database USING PREPARED STATEMENTS
		$sql = "SELECT * FROM employee WHERE username='$uid';";
		$row = $conn->query($sql);
		If (!empty($row)) 
		{


			$result = $row->fetch_assoc();
			if (password_verify($pwd,$result['password'])){


				$_SESSION['employee_id'] = $result['employee_id'];
				$_SESSION['department'] = $result['department'];
				// $_SESSION['employee_id'] = $row['employee_id'];
				// $_SESSION['employee_id'] = $row['employee_id'];
				$sql2="UPDATE employee SET session='$uid', session_expiration=DATE_ADD(NOW(),INTERVAL 2 HOUR) WHERE username='$uid';";
				$conn->query($sql2);
				header("location: ../index.php?login=success");
				exit();
			}else{

				header("Location: ../index.php?credential=invalid");
				exit ();
			}
		} else{
			header("Location: ../index.php?username=unknown");
			exit ();
		}
	}
}
?>
