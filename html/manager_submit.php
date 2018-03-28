<?php

Session_start();
 
if (isset($_POST['manager'] )) 

{

$manager = $_POST['manager'];
$employee = $_POST['employee'];
//$location = $_POST['location'];
//$employee_id = $_SESSION['employee_id'];




$link = mysqli_connect("localhost", "root", "0210Betania@", "it635");
$sql = " select department from employee where employee_id='$manager';";

$dep = $link->query($sql);
while ($dpt = $dep->fetch_assoc()) {
$department= $dpt['department'];
}

$sql = "update employee set department = $department where employee_id=$employee;";

$row = $link->query($sql);

if (!$row)
{
header('Location: ./manager.php?submit=error');
exit();


}
else {
header('Location: ./manager.php?submit=success');
exit();

}
}
 ?>

