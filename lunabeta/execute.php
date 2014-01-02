<?php
$command = $_GET['command'];
if($command=="Hello"){
$return = "Hello, sir. Would you like anything?";
}
?>
<html>
  <head>
    <script src="exec/speakClient.js"></script>
  </head>
  <body>
    <body onLoad="speak('<?php echo $return; ?>')"><?php echo $return;?>
    <div id="audio"></div>
  </body>
</html>

