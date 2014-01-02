<?php
session_start();
$user = $_SESSION['lunauser'];
include("connect.php");
function authUser(){
if($user==""){
echo '<script type="text/javascript">window.location = "http://tomedu.org/lunabeta/login"</script>';
}
}
function lunaGetName($user,$part){
$q = mysql_query("SELECT * FROM users WHERE username='$user'");
if(mysql_num_rows($q)===1){
$result = mysql_fetch_assoc($q);
	if($part=="first"){
		echo $result['firstname'];
	}
	if($part=="last"){
		echo $result['lastname'];
	}
	if($part=="full"){
		echo $result['firstname'].' '.$result['lastname'];
	}
}
}
function lunaGetDP($user){
$q = mysql_query("SELECT * FROM users WHERE username='$user'");
if(mysql_num_rows($q)===1){
$result = mysql_fetch_assoc($q);
echo $result['dp'];
}
}
function lunaGetGender($user){
$q = mysql_query("SELECT * FROM users WHERE username='$user'");
if(mysql_num_rows($q)===1){
$result = mysql_fetch_assoc($q);
return $result['gender'];
}
}
// Feel free to add in your own internal-API functions!
?>