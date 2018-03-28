<?php 
if (isset($_POST['submit'])) {



	include_once 'dbh.inc.php';


	$department =(int)$_POST['department'];
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname =   mysqli_real_escape_string($conn, $_POST['lastname']);
	$email =  mysqli_real_escape_string($conn, $_POST['email']);
	$username =  mysqli_real_escape_string($conn, $_POST['username']);
	$password =  mysqli_real_escape_string($conn, $_POST['password']);


	if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {


		if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				/*
				   if (mysqli_ping ($conn)){
				   header("Location: ../signup.php?database='".mysqli_error($conn)."'");
				   exit();


				   }
				 */



				$sql = "SELECT * FROM employee WHERE employee_id='username';";

				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);


				if ($resultCheck > 0)  
				{
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//Hashing the password
					$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO employee (firstname, lastname, email, username, password, department)
						VALUES ('$firstname', '$lastname', '$email', '$username', '$hashedpwd', $department);";

					if (!mysqli_query($conn, $sql))
					{

						header("Location: ../signup.php?error='".mysqli_error($conn)."'");
						exit ();

					} 
					header("Location: ../signup.php?signup=success");
					exit();



					//Create second prepared statement
					$stmt2 = mysqli_stmt_init($conn);


					if(!mysqli_stmt_prepare($stmt2, $sql)) {
						header("Location: ../index.php?login=error");
						exit();
					} else {
						//Bind parameters to the placeholder
						mysqli_stmt_bind_param($stmt2, "sssss", $firstname, $lastname, $email, $username, $hashedpassword);

						//Run query in database
						mysqli_stmt_execute($stmt2);
						header("Location: ../signup.php?signup=success");
						exit();
					}

					//Close second statement
					mysqli_stmt_close($stmt2);
				}
			}
		}
	}
}


else {
	header("Location: ../signup.php");
	exit();
}

