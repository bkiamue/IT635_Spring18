
dy>

<h1> Assigned employee to manager </h1>

<form action="./manager_submit.php" method="POST">

<label for "manager"> Manager </label>


<select name='manager' id="manager">

<?php
$link = mysqli_connect("localhost", "root", "0210Betania@", "it635");
$sql = "select employee_id, firstname, lastname from employee where role = 'manager';";

$row = $link->query($sql);

while ($result=$row->fetch_assoc()){

unset($employee_id, $firstname, $lastname);
$employee_id=$result['employee_id'];
$firstname=$result['firstname'];
$lastname=$result['lastname'];

echo '<option value="'.$employee_id.'">'.$firstname.' '.$lastname.'</option>';

}


?>


</select>

<label for "employee"> Employee </label>


<select name='employee' id="employee">

<?php
$link = mysqli_connect("localhost", "root", "0210Betania@", "it635");
   $sql = "select employee_id, firstname, lastname from employee where role is NULL;";

$row = $link->query($sql);

while ($result=$row->fetch_assoc()){

unset($employee_id, $firstname, $lastname);
$employee_id=$result['employee_id'];
$firstname=$result['firstname'];
$lastname=$result['lastname'];

echo '<option value="'.$employee_id.'">'.$firstname.' '.$lastname.'</option>';

}


?>


</select>


<input type="submit" value="Submit">

</form>

</body>
</html>

