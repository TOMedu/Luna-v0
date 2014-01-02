<?php
if ($_GET['randomId'] != "ZPB9qkYgfgw2VvYQfPPB2XvLNy1x0lEVd3n1PbgtQttNL5JauIhhIeaZxClPvf5S") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
