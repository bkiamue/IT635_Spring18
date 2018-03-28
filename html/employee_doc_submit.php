<?php

Session_start();
 
if (isset($_POST['date'] )) 

{

$date = $_POST['date'];
$description = $_POST['description'];
$location = $_POST['location'];
$employee_id = $_SESSION['employee_id'];




$link = mysqli_connect("localhost", "root", "0210Betania@", "it635");
$sql = "insert into document (date_created, description, doc_location, employee_id) values ('$date', '$description', '$location', $employee_id); ";

$row = $link->query($sql);
if (!$row)
{
header('Location: ./employeemain.html?submit=error');
exit();


}
else {
header('Location: ./employeemain.html?submit=success');
exit();

}
}
 ?>

