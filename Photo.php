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
error_reporting(0);
$user = $_GET['user'];
$photo = $_GET['photo'];
if (isset($user)){
if (isset($photo)){
echo "<h3>Posted by: ".$user."<br>At: ".date ("F d Y H:i:s.", filemtime("./".$user."/".$photo))."<br><a href='Index.php'>Upload your own!</a></h3><a href='Gallery.php?user=".$user."&submit=Submit'><h4>Gallery of: ".$user."</h4></a>";
echo "<img src='/mcss/".$user."/".$photo."'></img>";
}
}
?>
<br>
<form method='post'>
<script type='text/javascript'>
insertCounter()
</script>
<h6>Created by R4TH4CK3R 2012</h6>
</center>
</body>
</html>