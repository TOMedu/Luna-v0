<?php
$say = $_GET['ar'];
<html>
  <head>
    <script src="speakClient.js"></script>
  </head>
  <body onLoad="speak('<?php echo $say; ?>')">Talk</button>
    <div id="audio"></div>
  </body>
</html>

