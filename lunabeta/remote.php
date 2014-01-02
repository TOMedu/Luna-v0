<?php
session_start();
$user = $_SESSION['lunauser'];
?>
<!-- remote, this is a php component file -->
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="realtime-notifications/src/lib/gritter/js/jquery.gritter.min.js"></script>
<link href="realtime-notifications/src/lib/gritter/css/jquery.gritter.css"rel="stylesheet" type="text/css" />
<script src="http://js.pusher.com/2.1/pusher.min.js"></script>
<script src="realtime-notifications/src/PusherNotifier.js"></script>
  <script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };
    var pusher = new Pusher('db6668e949666407a0bf');
    var channel = pusher.subscribe('<?php echo "luna".$user; ?>');
    channel.bind('speak', function(data) {
      document.getElementById('response').src = "exec/sayer.php?ar="+data.message;
    });
    channel.bind('music', function(data) {
    if(data.message=="hot"){
      document.getElementById('response').src = "exec/run.php?command=jam";
      }
    });
    channel.bind('command', function(data) {
      document.getElementById('response').src = "exec/run.php?command="+data.message;
    });
    channel.bind('pspeak', function(data) {
      document.getElementById('parallelresponse').src = "exec/sayer.php?ar="+data.message;
    });
  </script>
  <!-- end remote -->