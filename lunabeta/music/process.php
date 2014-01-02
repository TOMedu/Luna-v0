<?php
include($_SERVER['DOCUMENT_ROOT']."/lunabeta/api/user.php");
include($_SERVER['DOCUMENT_ROOT']."/lunabeta/api/connect.php");
$name = $_POST['name'];
$embed = $_POST['src'];
$chunks = explode('"',$embed);
echo $chunks[5];
$chunks[5] = $chunks[5]."&autoplay=1";
echo "<br><br>";
$chunk = implode('"',$chunks);
mysql_query("INSERT INTO music(id,owner,name,embed) VALUES('','$user','$name','$chunk')");
?>
Successfully Added<br>
<a href="index.php">Back to Music</a><br><a href="../">Back to Luna</a>