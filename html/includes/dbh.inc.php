<?php
//session_start();

  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword = "0210Betania@";
  $dbName = "it635";
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
		
			if (mysqli_connect_errno())
             {   	
		echo "fail to connect: ".mysqli_connect_error();
		exit ();

         }     

if (!mysqli_ping ($conn))
{
echo mysqli_error($conn);
}
    ?>

