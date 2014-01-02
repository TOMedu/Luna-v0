<?php
session_start();
session_destroy();
  echo '<script type="text/javascript">
window.location = "http://tomedu.org/lunabeta/login/"
</script>';
?>