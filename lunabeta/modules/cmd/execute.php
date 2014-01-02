<?php
include($_SERVER['DOCUMENT_ROOT'].'/lunabeta/api/user.php');
include($_SERVER['DOCUMENT_ROOT'].'/lunabeta/api/luna.php');
if($user==""){
  echo '<script type="text/javascript">
window.location = "http://tomedu.org/lunabeta/login/"
</script>';
}
$command = $_POST['cmd'];

# COMMANDS #
if($command=="luna"){
echo lunaGetVersion();
}
if (strpos($command,'luna exec command ') !== false) {
   $cmdph = array("luna exec command ");
    $newphrase = str_replace($cmdph, "", $command);
      echo '<script type="text/javascript">
window.parent.location = "http://tomedu.org/lunabeta/exec/run.php?command='.$newphrase.'"
</script>';
}



?>
<link href='http://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet' type='text/css'><style>body{font-family:'Anaheim','Consolas';}</style>