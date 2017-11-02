
<html>

<head>

<title>Update Staff</title>	
<style type"text/css">
	body{
		background: white; }
	
</style>

</head>

<body text="black">
<a  href="http://localhost/ECSE321/Staff/ECSE321_SearchStaff.php"> Search Staff </a></li> <br><br>
<a  href="http://localhost/ECSE321/Staff/ECSE321_CreateStaff.php"> Add Staff</a></li>


<br><br><br>

<h3>Here is where we update information of existing staff members</h3>
<br>

<form action="ECSE321_UpdateStaff.php?go" method="post" id="searchform">


<label for="StaffID">StaffID:&nbsp &nbsp &nbsp &#8194 </label>
<input type="text" name="StaffID" size="25" placeholder="Input Staff ID" required><br><br>

<p>Update from this point on:</p>
<!-- update info from this point on-->
<br>

<label for="Role">Role: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
<input type="text" name="Role" size="25" placeholder="Update Role of Staff"> <br> <br>

<label for="Payment">Payment: &nbsp &nbsp &#8201 </label>
<input type="number_format" name="Payment" size="25" placeholder="Update Payment of Staff"><br> <br>

<label for="Progress">Progress: &nbsp &nbsp &nbsp </label>
<input type="number_format" name="Progress" size="25" placeholder="Update Progress of Staff"><br> <br>

<label for="Lab">Lab: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8201 </label>
<input type="number_format" name="Lab" size="25" placeholder="Update Staff Lab"><br><br>

<label for="TravelCost">Travel Cost: &#8201 </label>
<input type="number_format" name="TravelCost" size="25" placeholder="Update Travel Cost of Staff">



<input type="submit" name="submit1" value="Submit"><br>

<?php



if(isset($_POST['submit1'])) {	
	//echo "<p>post good</p>"; //test to see if button works
	if(isset($_GET['go'])){
		//echo "<p>get good</p>"; //test to see if action works
		//StaffID ----------
		$StaffID = $_POST['StaffID'];
		if(is_numeric($StaffID) == TRUE){
			
			//connect  to the database and select the database table			
			$mysqli = new mysqli('mysql.cs.mcgill.ca', 'ecse321-1', '260681489', 'ecse321_2017_1');
			//query the database table
			$sql="SELECT Name, StaffID FROM StaffInfo WHERE  StaffID LIKE '$StaffID'";
			$result= mysqli_query	($mysqli, $sql);
			if($result->num_rows >0){
				while($row=mysqli_fetch_array($result)){
					$Name = $row['Name'];
					$StaffID = $row['StaffID'];
					//-display the result of the array 
					
					// for later: echo "<li>" . "<a  href=\"search.php?id=$LastName\">"   .$FirstName . " " . $LastName .  
		
					echo "<ul>" .$Name . " ID = ". $StaffID . " </ul>\n";		
					
					
					
					//Role------------------------------------------------------	
					$Role=$_POST['Role'];
					if (preg_match('/[^-a-zA-Z\s]/', $Role) == false AND htmlspecialchars($_POST['Role'] != "" )){
						//echo "<p>Role good</p>"; 
						$sql1 = "UPDATE StaffInfo SET Role='$Role' WHERE StaffID='$StaffID'";
						if ($mysqli->query($sql1) === TRUE) {
							echo "<p>Staff Role updated successfully<p>";
						}
					}
					else if (preg_match('/[^-a-zA-Z\s]/', $Role) == true AND htmlspecialchars($_POST['Role'] != "" )) {
						echo "<p>Please input valid Role</p>";
					}//--------------------------------------------Role
					
					
						
					//Payment -------------------------------------------------------
					$Payment=$_POST['Payment'];
					if(is_numeric($Payment) == true){
						//echo "<p>Payment good</p>";
						$sql2 = "UPDATE StaffInfo SET Payment='$Payment' WHERE StaffID='$StaffID'";
						if ($mysqli->query($sql2) === TRUE) {
							echo "<p>Staff Payment updated successfully<p>";
						}
					}
					else if (is_numeric($Payment) == false AND htmlspecialchars($_POST['Payment'] != "" )) {
						echo "<p>Please input valid Payment</p>";
					}//--------------------------------------------Payment	
						
					
					
					
					//Progress--------------------------------------------------
					$Progress=$_POST['Progress'];
					if(is_numeric($Progress) == true){
						//echo "<p>Progress good</p>";
						$sql3 = "UPDATE StaffInfo SET Progress='$Progress' WHERE StaffID='$StaffID'";
						if ($mysqli->query($sql3) === TRUE) {
							echo "<p>Staff Progress updated successfully<p>";
						}
					}	
					else if (is_numeric($Progress) == false AND htmlspecialchars($_POST['Progress'] != "" )) {
						echo "<p>Please input valid Progress</p>";	
					}//--------------------------------------------Progress
					
					
					
					//Lab-------------------------------------------------------
					$Lab=$_POST['Lab'];
					if(is_numeric($Lab) == true){
						//echo "<p>Lab good</p>";
						$sql4 = "UPDATE StaffInfo SET Lab='$Lab' WHERE StaffID='$StaffID'";
						if ($mysqli->query($sql4) === TRUE) {
							echo "<p>Staff Lab updated successfully<p>";
						}						
					}
					else if (is_numeric($Lab) == false AND htmlspecialchars($_POST['Lab'] != "" )) {
						echo "<p>Please input valid Lab</p>";	
					
					}//--------------------------------------------Lab
					
					//TravelCost------------------------------------------------
					$TravelCost=$_POST['TravelCost'];
					if(is_numeric($TravelCost) == true){
						//echo "<p>TravelCost good</p>";
						$sql5 = "UPDATE StaffInfo SET TravelCost='$TravelCost' WHERE StaffID='$StaffID'";
						if ($mysqli->query($sql5) === TRUE) {
							echo "<p>Staff TravelCost updated successfully<p>";
						}						
					}
					else if (is_numeric($TravelCost) == false AND htmlspecialchars($_POST['TravelCost'] != "" )) {
						echo "<p>Please input valid TravelCost</p>";	
					
					
					}//--------------------------------------------TravelCost
					
					
				}
				$mysqli->close(); //END of the mysqli
			}
			else { 
			echo "<p>No search results were found, please input a valid Staff ID</p>\n";}
		}
		else{
			echo "<p>Please input a valid ID number</p>";
		}//------------------------------------------------StaffID
	}
}

?>

</form>

</body>

</html>
