<?php
include("connect.php");
$command = $_GET['c'];
$cmdph = array("start ","play ","play my ","my "," playlist"," music"," jam","luna "," luna","let ","me ","to ","listen ","come "," bitch","bitch ");
$newphrase = str_replace($cmdph, "", $command);
$user = "karankanwar";
echo '<br>';
$q = mysql_query("SELECT * FROM music WHERE owner='$user' AND name LIKE '%$newphrase%' ORDER BY id DESC LIMIT 1") or die(mysql_error());
$row = mysql_fetch_assoc($q);
echo $row['embed'];