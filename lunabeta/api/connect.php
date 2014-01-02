<?php
//Hello Sir/Mam, I am Code-Luna, I will help you get the rest of me up and running! Fill out the details below.
#################################################################################################################
//please type in your MySQL hostname, usually localhost, unless you're operating luna from a different server
$host		 = "localhost";

//please type in your MySQL account username, please make sure this account has rights to the database specified in $database_name
$mysql_username	 = "txclanco_karan";

//please type the corresponding password to your earlier keyed in MySQL username
$mysql_password	 = "dudeman";

//please type in the database name you've assigned to luna
$database_name	 = "txclanco_luna";
#################################################################################################################

mysql_connect($host, $mysql_username, $mysql_password);
mysql_select_db($database_name);
?>