<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<!--<link rel="stylesheet" href="css/style.css" />-->
</head>
<body>


<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required /><br><br>
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />

<?php

if (isset($_REQUEST['username'])){
        // removes backslashes
	$mysqli = new mysqli('mysql.cs.mcgill.ca', 'ecse321-1', '260681489', 'ecse321_2017_1');
	$username = stripslashes($_REQUEST['username']);
	$password = stripslashes($_REQUEST['password']);
	$query = "INSERT into `Directors` (UserName, Password) VALUES ('$username', '$password')";
    $result = mysqli_query($mysqli,$query);
    if($result){
        echo "
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='DirectorLogin.php'>Login</a></div>";
     }
}else{
} 
?>
</form>
</div>

</body>
</html>