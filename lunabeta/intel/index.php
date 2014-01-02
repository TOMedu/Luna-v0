<?php
session_start();
$conversation = $_SESSION['conversation'];
echo $conversation;
?>
<form action="brain.php" method="get">
<input type="text" name="input">
<input type="submit">
</form>
