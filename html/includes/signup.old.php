<?php 

	if (isset($_POST['submit'])) {

		
		include_once 'dbh.inc.php';
	
		
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

					
					$sql = "SELECT * FROM employee WHERE employee_id='username'";
                                        $result = mysql_query($conn, $sql);
                                        $resultcheck = mysql_num_rows($result);
                                        if ($resultCheck > 0)  

					$stmt = mysqli_stmt_init($conn);
					
					
					if(!mysqli_stmt_prepare($stmt, $sql)) {
					    header("Location: ../index.php?login=error");
					    exit();
					} else {
					

					
						mysqli_stmt_bind_param($stmt, "s", $uid);

						//Run query in database
						mysqli_stmt_execute($stmt);

						//Check if user exists
					
						mysqli_stmt_store_result($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);
						if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=usertaken");
							exit();
						} else {
							//Hashing the password
							$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
							//Insert the user into the database
							$sql = "INSERT INTO employee (firstname, lastname, email, username, password)
							VALUES (1, '$firstname', '$lastname', '$email', $username, '$hashedpwd');";
                                                        mysqli_query($conn, $sql);
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
						}
					}
				}
			}
		}

		//Close first statement
		mysqli_stmt_close($stmt);
		//Close second statement
		mysqli_stmt_close($stmt2);

	} else {
		header("Location: ../signup.php");
		exit();
	}

