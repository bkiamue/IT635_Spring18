<?php

Session_start();
 
if (isset($_POST['location'] )) 

{

$date = $_POST['date'];
$description = $_POST['description'];
$location = $_POST['location'];
$employee_id = $_SESSION['employee_id'];


/*$link = mysqli_connect("localhost", "root", "0210Betania@", "it635");
$sql = " insert into document (date_created, description, doc_location, employee_id) values ('$date', '$description', '$location', $employee_id);"; 

$row = $link->query($sql);
*/
require_once '/var/www/html/vendor/autoload.php';
$conn = new MongoDB\Client("mongodb://jcraze:jcraze@ds243049.mlab.com:43049/it635");

$client = $conn->it635->document;
$row = $client->insertOne( [ "date" => "$date" , "description" => "$description", "location" => "$location", "employee_id" => "$employee_id" ] );
if (!$row)
{
header('Location: ./employee_doc_submit.php?submit=error');
exit();


}
else {
header('Location: ./employee_doc_submit.php?submit=success');
exit();

}
}
 ?>

