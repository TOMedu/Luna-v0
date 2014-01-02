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
    var channel = pusher.subscribe('my_notifications');
    channel.bind('notification', function(data) {
    if(data.message=="0"){
      document.getElementById('test').src = "";
      }
      if(data.message=="1"){
      document.getElementById('test').src = "//www.youtube.com/embed/iapEt-L0pMQ?autoplay=1";
      }
      if(data.message=="2"){
      document.getElementById('test').src = "//www.youtube.com/embed/3JV74i4yvcA?autoplay=1";
      }
      if(data.message=="3"){
     document.getElementById('test').src = "//www.youtube.com/embed/-NPNcRuaGQI?autoplay=1";
      }
    });
  </script>
  <iframe src="" id="test"></iframe>