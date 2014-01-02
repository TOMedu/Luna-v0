<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet' type='text/css'>
<title>CMD | Luna</title>
<style>
#prompt{width:980px;height:190px;background-color:#383636;font-family:'Anaheim','Consolas';color:#fff;position:absolute;top:0;left:0;outline:none;font-size:16px;resize:none;border-radius:4px;padding:10px;border:none;}
.button{border:1px solid #3079ed;color: #fff;text-shadow: 0 1px rgba(0,0,0,0.1);background-color: #4d90fe;background-image: -webkit-gradient(linear,left top,left bottom,from(#4d90fe),to(#4787ed));background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);background-image: -o-linear-gradient(top,#4d90fe,#4787ed);background-image: linear-gradient(top,#4d90fe,#4787ed);display: inline-block;min-width:54px;text-align:center;font-size:12px;font-weight: bold;height:27px;padding:0 8px;line-height:27px;-webkit-border-radius: 2px;-moz-border-radius:2px;border-radius: 2px;cursor:pointer;}.button:hover{border:1px solid #2f5bb7;color: #fff;text-shadow: 0 1px rgba(0,0,0,0.3);background-color: #357ae8;background-image: -webkit-gradient(linear,left top,left bottom,from(#4d90fe),to(#357ae8));background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);background-image: -o-linear-gradient(top,#4d90fe,#357ae8);background-image: linear-gradient(top,#4d90fe,#357ae8);}.button:active{-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);}
#run{position:absolute;z-index:50;top:150px;left:910px;}
body{font-family:'Anaheim','Consolas';}
</style>
</head>
<body>
<form action="execute.php" method="post">
<textarea id="prompt" name="cmd" placeholder="luna/modules/cmd >>">
</textarea>
<input type="submit" class="button" id="run" value="Run">
</form>