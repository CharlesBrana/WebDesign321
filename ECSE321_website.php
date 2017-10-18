
<?php
/*mysql_connect("mysql.cs.mcgill.ca","ecse321-1","260681489") or die(mysql_error());
mysql_select_db("ecse321_2017_1") or die(mysql_error());

/*mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("db") or die(mysql_error());
$output='';
//collect
if(isset($_POST['name'])){
	$nameq = $_POST['name'];
	$query = mysql_query("SELECT * FROM StaffInfo WHERE name LIKE '%$nameq%'") or die (mysql_error());
	//$query =mysql_query("SELECT * FROM StaffInfo WHERE name LIKE '%$nameq%' OR lastname LIKE'%$nameq%'") or die (mysql_error());
	$count = mysql_num_rows($query);
	
	if($count < 3){
		$output = 'There was no search results';
	}else{
		while($row = mysql_fetch_array($query)){
			$fname = $row['name'];
			$lname = $row['lastname'];
			$id = $row['id'];
			
			$output .= $fname ." ". $lname;
			
		}		
	}


}


*/
?>




<html>

<head>

<title>ECSE 321 Website</title>	
<style type"text/css">
	body{
		background: white; }
	
</style>

</head>

<body text="black">

Please input name of employee

<br></br>

<form action="ECSE321_website.php?go" method="post" id="searchform">

<label for="Name">Name:</label>

<input type="text" name="search" size="25" placeholder="Search for Staff">
<input type="submit" name="submit" value="Search">


</form>
<?php
$count = 0;
if(isset($_POST['submit']) AND htmlspecialchars($_POST['search']) != ""){
	echo "<p>post good</p>";
	$count = $count ++;
	if(isset($_GET['go'])){
		echo "<p>get good</p>";
		//connect  to the database 
		$db=mysql_connect ("mysql.cs.mcgill.ca",  "<ecse321-1>", "<260681489>") or die ('I cannot connect  to the database because: ' . mysql_error());
		//-select  the database to use 
	  	$mydb=mysql_select_db("ecse321_2017_1"); 
		//query the database table
		$sql="name, lastname FROM StaffInfo WHERE  name LIKE '%" . $name . "%' OR LastName LIKE '%" . $name  ."%'";
	}
}
elseif( $count!=0 AND htmlspecialchars($_POST['search']) == "" ){
	echo "<p>Please enter a search query</p>";
}
elseif(isset($_POST['submit']) == false AND $count != 0) {
	echo "<p>Please enter a search query</p>";
}

//else{
	//echo "<p>Please enter a search query</p>";
//}





?>

<br>

<!--<textarea readonly rows="3" cols="41">

&nbsp This is where the results will show up 
</textarea>-->


</body>

</html>
