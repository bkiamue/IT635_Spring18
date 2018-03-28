<?php 
     include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
	<h2>Welcome To The City Of Crooks Document Management Systems</h2>
        <h2>We are Keeping an EYE on You</h2>

		<?php
			if (isset($_SESSION['u_id'])) {
				echo "You are logged in!";
			}
		?>
	</div>
</section>
<?php
	include_once 'footer.php';
?>
 <!DOCTYPE html>
 <html>
 <head>
 <title>Menu Option</title>
 <meta charset="utf-8">
 <meta name="author" content="BSK">
    <!.. internal styles,,>
     <style>
     {
         margin: 0px;
         padding: 0px;
     }
    body {
        font-family: verdana;
        background-color: #ABC;
        padding: 50px;
    }
    h1 {
        text-align: center;
        border-bottom: 2px solid #009;
        margin-bottom: 50px;
}
   /* rules for navigation menu */
   /* =================================== */
   ul#navmeu li ul.sub1, ul.sub2 {
       list-style-type: none;
   }
      ul#navmeu li {
          outline: 1px solid red;
          width: 125px;
          text-align: center;
      }
      ul#navmenu a {
          text-decoration: none;
          display: block;
      }

     </style>
 </head>
     <body>

     <h1>Navigation Menu</h1>
     <ul id="navmenu">
         <li><a href="employeemain.html">Employees</a></li>
         <li><a href="manager.php">Managers</a></li>
         <li><a href="emp-manager.php">Employees to Managers</a></li>
         <li><a href="doc-manager.php">Documents by Managers</a></li>
         <li><a href="doc-date.php">Documents by Date</a></li>
         <li><a href="doc-department.php">Documents by Depatments</a></li> 
         <li><a href="doc-search.php">Search Documents from Others</a></li>
     </ul>
     </body>
   </html>
