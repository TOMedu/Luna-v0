<?php
require_once('realtime-notifications/examples/php/lib/squeeks-Pusher-PHP/lib/Pusher.php');
$app_key = 'db6668e949666407a0bf';
$app_secret = 'f307dc48da103bad7923';
$app_id = '49385';
$n = $_GET['n'];
$pusher = new Pusher($app_key, $app_secret, $app_id);
$data = array('message' => $n);
$pusher->trigger('my_notifications', 'notification', $data);