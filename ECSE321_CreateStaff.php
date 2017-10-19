
<html>

<head>

<title>ECSE 321 Website</title>	
<style type"text/css">
	body{
		background: white; }
	
</style>

</head>

<body text="black">
<a  href="http://localhost/ECSE321_SearchStaff.php"> Search </a></li>

<br><br><br>

Here is where we create new staff members

<br></br>

<form action="ECSE321_CreateStaff.php?go" method="post" id="searchform">

<label for="Name">Name:&nbsp &nbsp  &#8194 </label>

<!--<input type="text" name="search" size="25" placeholder="Input Name of Staff">-->
<input type="text" name="Name" size="25" placeholder="Input Name of Staff"><br><br>

<label for="LastName">Lastname:</label>
<input type="text" name="LastName" size="25" placeholder="Input LastName of Staff"><br><br>

<label for="Role">Role: &nbsp &nbsp &nbsp &nbsp </label>
<input type="text" name="Role" size="25" placeholder="Input Role of Staff">


<input type="submit" name="submit" value="Submit">


</form>

<?php

if(isset($_POST['submit']) AND htmlspecialchars($_POST['Name']!= "")AND htmlspecialchars($_POST['LastName'] != "") AND 
htmlspecialchars($_POST['Role'] != "")){
	 /*test if Post works works
	echo "<p>post good</p>";*/
		if(isset($_GET['go'])){
			/*test if Get works works
			echo "<p>get good</p>";*/
			$Name=$_POST['Name']; // set $name to the name which was entered in the Name box
			$LastName=$_POST['LastName']; // set $LastName to the name which was entered in the LastName box
			$Role=$_POST['Role']; // set $Role to the name which was entered in the Role box
			//connect  to the database and select the database table			
			$mysqli = new mysqli('mysql.cs.mcgill.ca', 'ecse321-1', '260681489', 'ecse321_2017_1');
			// Check connection
			if ($mysqli->connect_error) {
				die("Connection failed: " . $mysqli->connect_error);
			} 

			$sql = "INSERT INTO StaffInfo (name, lastname, role)VALUES ('$Name', '$LastName', '$Role')";

			if ($mysqli->query($sql) === TRUE) {
				echo "New Staff created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $mysqli->error;
			}

			$mysqli->close();
		}
	}

elseif(isset($_POST['Name']) AND htmlspecialchars($_POST['Name'] == "") OR isset($_POST['LastName']) AND 
htmlspecialchars($_POST['LastName'] == "") OR isset($_POST['Role']) AND htmlspecialchars($_POST['Role'] == "")) {
	echo "<p>Please enter a valid input</p>";
}




?>

<br>

<!--<textarea readonly rows="3" cols="41">

&nbsp This is where the results will show up 
</textarea>-->


</body>

</html>
