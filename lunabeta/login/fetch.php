<?php
$user = $_GET['u']; //get username from ajax url request
mysql_connect("localhost","txclanco_karan","dudeman"); //connect to mysql
mysql_select_db("txclanco_luna"); //select database
$q = mysql_query("SELECT * FROM users WHERE username='$user'"); //run query to select the row in which the specified user is present
$row = mysql_fetch_assoc($q); //create an associative array by assigning mysql column headings as array items for '$row'
$dp = $row['dp']; //assign $dp to the array value of $row['dp'] - this is simply to make coding the rest of this file less of a hassle! dp is an abbreviation for display picture
if($dp=="" && $user!==""){ //if no username was submitted, or if the user doesn't exist, we'll tell the user that they're making a mistake before logging in
echo "notexist.png"; //show the 'sorry this user doesn't exist' picture
}
elseif($user==""){ //if the username isn't present, we'll call them anonymous!
echo "anon.png";
}
else{
echo $dp; // echo the display picture
}
?>