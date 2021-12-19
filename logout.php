<?php
session_start();
echo "Please wait logging you out";
session_destroy();
header ("location: /jsite/index.php");
?>