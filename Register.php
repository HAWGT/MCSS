<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Minecraft Database</title>
<link rel="stylesheet" type="text/css" href="Layout.css" />
<script type='text/javascript' src='Scripts.js'></script>
<style type="text/css">
body,td,th {
	color: #0F0;
	font-family: consolas;
	font-weight: bold;
}
body {
	background-color: #333;
}
}
a:link {
	color: #0FF;
}
a:visited {
	color: #0FF;
}
a:hover {
	color: #0FF;
}
a:active {
	color: #0FF;
}
</style>
</head>
<body>
<center>
<h1>Minecraft Database</h1>
<?php
include("nav.php");
?>
<form method='post' action='Register.php'>
<label for="user">User:</label>
<input type='text' name='user' class='input'>
<br>
<label for="pass">Pass:</label>
<input type='password' name='pass' class='input'>
<br>
<label for="cpass">Repeat Pass:</label>
<input type='password' name='cpass' class='input'>
<br>
<input type='submit' value='Submit' name='submit' class='input'>
<br>
</form>
<?php
error_reporting(0);
ob_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$user = strip_tags($user);
$pass = strip_tags($pass);
$cpass = strip_tags($cpass);
$user = stripslashes($user);
$pass = stripslashes($pass);
$cpass = stripslashes($cpass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);
$cpass = mysql_real_escape_string($cpass);
include ("Config.php");
if (isset($_POST['submit'])) {
if ($user&&$pass&&$cpass) {
if ($pass==$cpass) {
	
	$pass = hash('sha256', $pass);
	$cpass = hash('sha256', $cpass);
	
	mysql_connect("$host", "$username", "$password")or die("ERROR!"); 
	mysql_select_db("$db_name")or die("ERROR!");
	$sql="SELECT * FROM $tbl_name WHERE username='$user' and password='$pass'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	
	if ($count==0){
	$run="
	INSERT INTO users VALUES ('$user','$pass')
	";
	$done=mysql_query($run);
	echo 'Done!';
	} else {
	echo 'User Already Exists!';
	}
	
}
}
}
ob_end_flush();
?>
<script type='text/javascript'>
insertCounter()
</script>
<h6>Created by R4TH4CK3R 2012</h6>
</center>
</body>
</html>