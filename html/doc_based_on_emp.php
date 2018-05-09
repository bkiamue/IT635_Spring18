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

<h1>Document Based On Employee</h1>

<form action = "doc_submit.php">

<label for "date"> Date Created </label>
<input type = text name = "date" required
      autofocus atocomplete - "off"
      placeholder = "Date Created"
      id = "date"<br></br>

<label for "description"> Description </label>
<input type = text name = "description" required
            autofocus autocomplete = "off"
            placeholder = "Date created"
            id = "date"<br></br>

<label for "description"> Description </label>
<input type = text name = "description" required
           autofocus autocomplete = "off"
           placeholder = "Descrition"
           id = "description"<br></br>

<label for "location"> Location </label>
<input type = text name = "location" required
          autofocus autocomplete - "off"
          placeholder = "location"
          id = "location"<br></br>

<input type = submit value="Submit">

</form>

           



