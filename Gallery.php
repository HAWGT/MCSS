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
<?php
if (!isset($_GET['submit'])){
echo "<form method='get' action='Gallery.php'><label for='user'>User:</label><input type='text' name='user' class='input'><br><input type='submit' name='submit' value='Submit' class='input'><br></form>";
}
?>
<?php
error_reporting(0);
$user = $_GET['user'];
if (isset($_GET['submit'])) {
if (isset($user)) {
if (file_exists($user)){
echo "<h3>Posted by: ".$user."<br><a href='Index.php'>Upload your own!</a></h3><h4><a href='Gallery.php'>Another Gallery!</a></h4>";
$images = glob('./'.$user.'/'. "*.png", GLOB_NOSORT);
array_multisort(array_map('filemtime', $images), SORT_NUMERIC, SORT_ASC, $images);
$num = 0;
foreach($images as $image)
{
$tmp = substr($image,-13);
$num = $num + 1;
echo "<a href='http://r4tmcserver.zapto.org/mcss/Photo.php?user=".$user."&photo=".$tmp."'>".$num." - ".$tmp." - ".date ("F d Y H:i:s.", filemtime($image))."</a><br>";
}
}
}
}
?>
<script type='text/javascript'>
insertCounter()
</script>
<h6>Created by R4TH4CK3R 2012</h6>
</center>
</body>
</html>