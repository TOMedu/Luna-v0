<?php
$sayi = $_GET['ar'];
$say = str_replace("'","",$sayi);
?>
<html>
  <head>
  <link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
    <script src="speakClient.js"></script>
  </head>
  <body style="font-family:'Roboto','Gill Sans MT','Calibri','Lucida Grande','Arial';font-size:48px;" onLoad="speak('<?php echo $say; ?>')"><center>Remote: <b><? echo $say; ?></b>
    <div id="audio"></div>
  </body>
</html>