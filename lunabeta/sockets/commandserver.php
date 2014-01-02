<?php
session_start();
$user = $_SESSION['lunauser'];
$ch = "luna".$user;
require_once('realtime-notifications/examples/php/lib/squeeks-Pusher-PHP/lib/Pusher.php');
$app_key = 'db6668e949666407a0bf';
$app_secret = 'f307dc48da103bad7923';
$app_id = '49385';
$m = $_POST['command'];
$pusher = new Pusher($app_key, $app_secret, $app_id);
$data = array('message' => $m);
$pusher->trigger($ch, 'command', $data);
?>
<script type="text/javascript">
<!--
window.location = "http://tomedu.org/lunabeta/mobile/#lunaspeak"
//-->
</script>