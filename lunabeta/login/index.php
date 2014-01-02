<?php
include($_SERVER['DOCUMENT_ROOT'].'/lunabeta/api/user.php');
if($user!=""){
  echo '<script type="text/javascript">
window.location = "http://tomedu.org/lunabeta/"
</script>';
}
?>
<!doctype html>
<html>
<head>
<title>Login | Luna</title>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/x-icon" href="../jarvis.ico"> 
</head>
<style>
.button{border:1px solid #3079ed;color: #fff;text-shadow: 0 1px rgba(0,0,0,0.1);background-color: #4d90fe;background-image: -webkit-gradient(linear,left top,left bottom,from(#4d90fe),to(#4787ed));background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);background-image: -o-linear-gradient(top,#4d90fe,#4787ed);background-image: linear-gradient(top,#4d90fe,#4787ed);display: inline-block;min-width:54px;text-align:center;font-size:12px;font-weight: bold;height:27px;padding:0 8px;line-height:27px;-webkit-border-radius: 2px;-moz-border-radius:2px;border-radius: 2px;cursor:pointer;}.button:hover{border:1px solid #2f5bb7;color: #fff;text-shadow: 0 1px rgba(0,0,0,0.3);background-color: #357ae8;background-image: -webkit-gradient(linear,left top,left bottom,from(#4d90fe),to(#357ae8));background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);background-image: -o-linear-gradient(top,#4d90fe,#357ae8);background-image: linear-gradient(top,#4d90fe,#357ae8);}.button:active{-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);}
body{
	background:url('bg.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#main,#secondary{
	background-color:#fafafa;
	width:750px;
	height:400px;
	border-radius:2px;
}
#container{
	width:750px;
	height:450px;
	position:absolute;
	left:50%;
	top:150px;
	margin-left:-375px;
}
#secondary{
	margin-top:50px;
	height:60px;
}
#face{
	width:200px;
	height:200px;
	position:absolute;
	margin-top:-70px;
	left:50%;
	margin-left:-103px;
	background-color:#000;
	background:url(anon.png);
	background-size:200px 200px;
	border:3px solid #fafafa;
	background-repeat:no-repeat;
	box-shadow: 0 0 5px #fafafa;
}
#form{
}
input[type=password], input[type=text] { 
	font-family:'Roboto';
	font-size:18px; 
	height:30px; 
	width:300px; 
	border-radius:5px; 
	padding:5px; border:1px solid #B0B0B0;
	padding-left:9px; 
} 

input[type=text]:hover, input[type=password]:hover { 
	border:1px solid #909090; 
} 

input[type=text]:focus, input[type=password]:focus {
		outline:none;border: 1px solid #4d90fe;
		box-shadow: 0 0 5px #479deb;
}
</style>
<body>
	<div id="container">
			<div id="face">
	</div>
<div id="main">

<center><br><br><br><br><br><br><br><br><br><br>
	<div id="form">
<form action="auth.php" method="post">
	<input type="text" name="username" id="username" placeholder="Username" value="karankanwar"><br><br>
	<input type="password" name="password" placeholder="Password" value="dudeman"><br><br>
	<button class="button">Login</button>
</form>
	</div>
</center>
</div>

<div id="secondary">
	</div>
</div>
<script>
$('#username').blur(function(){
	var u = $('#username').val();
	$.get('fetch.php?u='+u, function(data) {
$('#face').css('backgroundImage','url('+data+')');
});
});
</script>