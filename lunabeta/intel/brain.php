<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/lunabeta/api/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/lunabeta/api/user.php');
$input = strtolower($_GET['input']);
$_SESSION['conversation'] = $_SESSION['conversation']."<br><b>you: </b>".$input;
$return = mysql_query("SELECT * FROM intel_opentable WHERE input='$input' ORDER BY RAND()  LIMIT 0,1");
$result = mysql_fetch_assoc($return);
$output = $result['output'];
if($output==""){
$return = mysql_query("SELECT * FROM intel_opentable WHERE output='' ORDER BY RAND() LIMIT 0,1") or die(mysql_error());
$result = mysql_fetch_assoc($return);
$output = $result['input'];
$learn = 1;
}
echo $output;
$_SESSION['conversation'] = $_SESSION['conversation']."<br><b>luna: </b>".$output;
if($learn==1){
mysql_query("UPDATE intel_opentable SET output=