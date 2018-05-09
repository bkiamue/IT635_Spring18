<?php

     include_once 'header.php';
	session_start();
?>

<section class = "main-container">
    <div class="main-wrapper">
    <h2>Documents Managed By Manger</h2>

<br><br>



<center>



<form action = "doc_search.php" method="post">



<label for "employee"> Employee </label>
<input type = text name = "employee" required
          autofocus autocomplete - "off"
          placeholder = "employee"
          id = "employee"<br></br>

<input type = submit value="Submit">

</form>


<?php
if (isset($_POST['employee'] )) {

$employee = $_POST['employee'];



$link = mysqli_connect("localhost", "root", "0210Betania@", "it635");

/*$row = $link->query($sql);
if (!$row)
{
header('Location: ./doc_owned_manager.php?submit=error');
exit();


}
else {

  $res = $row->fetch_assoc();
  //$id =$res['employee_id'];
  $dept =$res['department'];

*/
  $docsql = "select document.* from document INNER JOIN employee ON document.employee_id = employee.employee_id WHERE employee.lastname LIKE '%$employee%';";
$docrow = $link->query($docsql);
if ($docrow) {
//echo "<p>Stuff works.</p>";

echo "<table style='border:1px solid black;'>
<tr>
<th>doc_id</th>
<th>date_created</th>
<th>description</th>
<th>doc_location</th>
<th>employee_id</th>
</tr>
";

while ($drow = $docrow->fetch_assoc()) {
  echo "<tr>";
  $doc_id = $drow['doc_id'];
  $date_created = $drow['date_created'];
  $description = $drow['description'];
  $doc_location = $drow['doc_location'];
  $employee_id = $drow['employee_id'];
  echo "<td>".$doc_id."</td><td>".$date_created."</td><td>".$description."</td><td>".$doc_location."</td><td>".$employee_id."</td></tr>";
}
echo "</table>";
}


exit();

}

?>           
</center>


