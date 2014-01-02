<?php
if ($_GET['randomId'] != "O4ufCa92ZRox6xqPDRqmt3OIFnK2pWGwW5_hhHuqKIYEwp7oucUtQzw_nUODxwhN") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
