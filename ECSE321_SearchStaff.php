
<html>

<head>

<title>ECSE 321 Website</title>	
<style type"text/css">
	body{
		background: white; }
	
</style>

</head>

<body text="black">
<a  href="http://localhost/ECSE321_CreateStaff.php"> Add Staff </a></li>
<br><br><br>
Please input name of employee

<br></br>

<form action="ECSE321_SearchStaff.php?go" method="post" id="searchform">

<label for="Name">Name:</label>

<input type="text" name="search" size="25" placeholder="Search for Staff">
<input type="submit" name="submit" value="Search">


</form>

<?php

if(isset($_POST['submit']) AND htmlspecialchars($_POST['search']) != ""){
	/* test if Post works works
	echo "<p>post good</p>";*/
	if(isset($_GET['go'])){
		/* test if Get works works
		echo "<p>get good</p>";*/
		$name=$_POST['search']; // set $name to the name which was entered in the search box
		//connect  to the database and select the database table			
		$mysqli = new mysqli('mysql.cs.mcgill.ca', 'ecse321-1', '260681489', 'ecse321_2017_1');
		//query the database table
		$sql="SELECT name, lastname, role FROM StaffInfo WHERE  name LIKE '%" . $name . "%' OR lastname LIKE '%" . 
$name  ."%' OR  CONCAT( name, ' ', lastname)	 Like '%" . $name  ."%'";
		$result= mysqli_query	($mysqli, $sql);
		
		while($row=mysqli_fetch_array($result)){ 
		  $FirstName  =$row['name'];    
		  $LastName=$row['lastname']; 
		  $Role=$row['role']; 
			//-display the result of the array 
			echo "<ul>\n"; 
			// for later: echo "<li>" . "<a  href=\"search.php?id=$LastName\">"   .$FirstName . " " . $LastName .  
"</a></li>\n"; 
			echo "<li>" .$FirstName . " " . $LastName . " ".': '  . $Role . " </a></li>\n";		
			echo "</ul>"; 
		}
	  
	} $mysqli->close();
}

elseif( isset($_POST['search']) AND htmlspecialchars($_POST['search'] == "")){
	echo "<p>Please enter a search query</p>";
}





?>

<br>

</body>

</html>
