
<html>

<head>

<title>ECSE 321 Website</title>	
<style type"text/css">
	body{
		background: white; }
	
</style>

</head>

<body text="black">
<a  href="http://localhost/ECSE321/Staff/ECSE321_CreateStaff.php"> Add Staff </a></li><br><br>
<a  href="http://localhost/ECSE321/Staff/ECSE321_UpdateStaff.php"> Update Staff</a></li><br><br><br>
<h3>Please input name of employee</h3>

<br>

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
		if (preg_match('/[^a-zA-Z]/', $name) == true){
			echo "Please enter valid input";
		}
			else{
			//connect  to the database and select the database table			
			$mysqli = new mysqli('mysql.cs.mcgill.ca', 'ecse321-1', '260681489', 'ecse321_2017_1');
			//query the database table
			$sql="SELECT Name, LastName, Role, StaffID FROM StaffInfo WHERE  Name LIKE '%" . $name . "%' OR LastName LIKE '%" . 
		$name  ."%' OR  CONCAT( Name, ' ', LastName)	 Like '%" . $name  ."%'";
			$result= mysqli_query	($mysqli, $sql);
			if($result->num_rows >0){
				while($row=mysqli_fetch_array($result)){ 
				  $FirstName  =$row['Name'];    
				  $LastName=$row['LastName']; 
				  $Role=$row['Role']; 
				  $StaffID = $row['StaffID'];
					//-display the result of the array 
					echo "<ul>\n"; 
					// for later: echo "<li>" . "<a  href=\"search.php?id=$LastName\">"   .$FirstName . " " . $LastName .  
		"</a></li>\n"; 
					echo "<li>" .$FirstName . " " . $LastName . " ".': '  . $Role  . ";  ID = ". $StaffID . " </li>\n";		
					echo "</ul>"; 
				}$mysqli->close();
			}
			else { 
			echo "<li>No search results were found</li>\n";}
		}
	} 
}

elseif( isset($_POST['search']) AND htmlspecialchars($_POST['search'] == "")){
	echo "<p>Please enter a valid search query</p>";
}

?>

<br>

</body>

</html>
