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
<form method='post' action='Index.php' enctype="multipart/form-data">
<label for="user">User:</label>
<input type='text' name='user' class='input'>
<br>
<label for="pass">Pass:</label>
<input type='password' name='pass' class='input'>
<br>
<label for="file">File:</label>
<input type='file' name='file' id="file" class='input'>
<br>
<input type='submit' value='Submit' name='submit' class='input'>
<br>
</form>
<?php
error_reporting(0);
ob_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$user = strip_tags($user);
$pass = strip_tags($pass);
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);
$pass = hash('sha256', $pass);

include ("Config.php");

$folder = './'.$user.'/';
$name = $folder . basename($_FILES['file']['name']);
$photo = randomname().'.png';
$newname = $folder.$photo;

if (isset($_POST['submit'])) {
if (isset($user)){
if (isset($pass)){

mysql_connect("$host", "$username", "$password")or die("ERROR!"); 
mysql_select_db("$db_name")or die("ERROR!");
$sql="SELECT * FROM $tbl_name WHERE username='$user' and password='$pass'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1){

	if (!file_exists($user)){
		mkdir($user);
	}
if ($_FILES["file"]["type"] == "image/png"){
	 move_uploaded_file($_FILES['file']['tmp_name'],$name);
	 rename($name,$newname);
	 echo '<br><textarea rows="5" cols="70" id="editor" class="input">http://r4tmcserver.zapto.org/mcss/Photo.php?user='.$user.'&photo='.$photo.'</textarea>';
}
}
}
}
}
function randomname() {
$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
srand((double)microtime()*1000000);
$pass = '';
$i = 0;
while($i <= 8) {
$num = rand() % 33;
$tmp = substr($chars, $num, 1);
$pass = $pass . $tmp;
$i++;
}
return $pass;
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