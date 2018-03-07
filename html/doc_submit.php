<?php

($dbh = mysql_connect("localhost", "root", "0210Betania@")) or die ("Unable to connect to MySQL database.");

mysql_select_db("it635");

$date = $_REQUEST ["date"];
$date = mysql_real_escape_string ($date);
$description = $_REQUEST ["description"];
$description = mysql_real_escape_string ($description);
$location = $_REQUEST ["location"];
$location = mysql_real_escape_string ($location);

$docSubmitted = "INSERT INTO document (date_created, description, doc_location, employee_id) VALUES ('$date', '$description', '$location', '2')";

($query = mysql_query($docSubmit)) or die (mysql_error());

echo $query;

?>
