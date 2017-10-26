
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

<h3>Here is where we create new staff members</h3>
<br>


<form action="ECSE321_CreateStaff.php?go" method="post" id="searchform">

<label for="Name">Name:&nbsp &nbsp  &#8194 </label>
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
			if (preg_match('/[^-a-zA-Z\s]/', $Name) == true){
				echo "Please enter valid input, containing only letters";
			}
			elseif (preg_match('/[^-a-zA-Z\s]/', $LastName) == true){
				echo "Please enter valid input, containing only letter";
			}
			elseif (preg_match('/[^-a-zA-Z\s]/', $Role) == true){
				echo "Please enter valid input, containing only letter";
			}
			
			else{
				$mysqli = new mysqli('mysql.cs.mcgill.ca', 'ecse321-1', '260681489', 'ecse321_2017_1');
				// Check connection
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				} 
				
				/*$query = mysqli_query($mysqli, "select * from StaffInfo");
				$row= mysqli_num_rows($query);
				$ind=0;
				if($row>0){
					while($rowids=mysqli_fetch_array($query)){
						 $already_exists[$ind]=$rowids['StaffID'];
					 }						
				}
				else {
					$already_exists[0]="nothing";					
				}
				*/
				 while(1) {       
					$randomNumber = rand(1, 999999);// generate unique random number               
					$query = "SELECT * FROM StaffInfo WHERE StaffID='".mysqli_real_escape_string ($mysqli, $randomNumber)."'";  // check if it exists in database   
					$res =mysqli_query($mysqli,$query);       
					$rowCount = mysqli_num_rows($res);
					 // if not found in the db (it is unique), then insert the unique number into data_base and break out of the loop
					if($rowCount < 1) {           
						$sql = "INSERT INTO StaffInfo (Name, LastName, Role, StaffID)VALUES ('$Name', '$LastName', '$Role', '$randomNumber')";

				if ($mysqli->query($sql) === TRUE) {
					echo "New Staff created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
				
				
				
				
				$mysqli->close();
					break;
					}   
				
				 }
				
				/*
				$break='false';
				while($break=='false'){
					$rand=mt_rand(10000,999999);

					if(array_search($rand,$alredy_exists)===false){
						$break='stop';
					}else{

					}
				}
				*/
				
				
				//if($result->num_rows >0){
					//while($row=mysqli_fetch_array($result)){ 
				
				//////////////////////////////////////////////////////////////////////////
				
				
				
				
				
				
				
				/*
				$sql = "INSERT INTO StaffInfo (Name, LastName, Role, StaffID)VALUES ('$Name', '$LastName', '$Role', '$rand')";

				if ($mysqli->query($sql) === TRUE) {
					echo "New Staff created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
				*/
				
				
				
				//$mysqli->close();
			}
		}
	}

elseif(isset($_POST['Name']) AND htmlspecialchars($_POST['Name'] == "") OR isset($_POST['LastName']) AND 
htmlspecialchars($_POST['LastName'] == "") OR isset($_POST['Role']) AND htmlspecialchars($_POST['Role'] == "") AND isset($_GET['go']) ) {
	echo "<p>Please enter a valid input</p>";
}




?>

<br>

<h4>Update Info of a Staff Member</h4>

<form action="ECSE321_CreateStaff.php?go2" method="post" id="searchform2">


<label for="StaffID">StaffID:&nbsp &#8194 </label>
<input type="text" name="StaffID" size="25" placeholder="Input Staff ID"><br><br>

<p>Update from this point on:</p>
<!-- update info from this point on-->
<br>

<label for="Role">Role: &nbsp &nbsp &nbsp &nbsp </label>
<input type="text" name="Role" size="25" placeholder="Update Role of Staff"> <br> <br>

<label for="Payment">Payment: &#8201 </label>
<input type="number_format" name="Payment" size="25" placeholder="Update Payment of Staff"><br> <br>

<label for="Progress">Progress: &nbsp  </label>
<input type="number_format" name="Progress" size="25" placeholder="Update Progress of Staff"><br> <br>

<label for="TravelCost">Travel Cost: &#8201 </label>
<input type="number_format" name="TravelCost" size="25" placeholder="Update Travel Cost of Staff">

<input type="submit" name="submit1" value="Submit">

<?php



if(isset($_POST['submit1'])) {	 // AND htmlspecialchars($_POST['Payment']!= "")){
	echo "<p>post good</p>";
	if(isset($_GET['go2'])){
		echo "<p>get good</p>";
		
		$Payment=$_POST['Payment'];
		if(is_numeric($Payment) == true){
			echo "<p>Payment good</p>";
			
		}	
	}
}

?>

</form>

</body>

</html>
