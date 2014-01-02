<?php
session_start(); //session start, so we can begin to manipulate sessions
// this is a very basic login script, mainly for user recognition
$remote = $_GET['remote'];
$user = $_SESSION['lunauser']; // assign the logged username to $user
if($user!="" && $remote!="1"){ //if the user is already logged in and somehow got here, push them over to the right page using javascript, which i've found to be faster than html
  echo '<script type="text/javascript">
window.location = "http://tomedu.org/lunabeta/"
</script>';
}
//if that hasn't happened, let's check to see if they are who they say they are
$username = $_POST['username']; //get the username
$password = sha1($_POST['password']); //get and encrypt the password 
mysql_connect("localhost", "txclanco_karan", "dudeman");
mysql_select_db("txclanco_luna"); //include the connection details
$q = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'"); //run a query to see if the presented username and password match
if(mysql_num_rows($q)===1){ //if there is one row with a match, success
	$_SESSION['lunauser'] = $username; //we start a session 'lunauser' with the username of the user we've just allowed to access Luna
	 if($remote=="1"){
	  echo '<script type="text/javascript"> 
window.location = "http://tomedu.org/lunabeta/mobile/"
</script>';
}
else {
	  echo '<script type="text/javascript"> 
window.location = "http://tomedu.org/lunabeta/"
</script>';
}
} //push them to the right page using javascript
else {
	  echo '<script type="text/javascript"> 
window.location = "http://tomedu.org/lunabeta/login/?error=1"
</script>';
} //if the specified user doesn't exist, or if the match isn't correct, send the user back to the login page with an error
?>