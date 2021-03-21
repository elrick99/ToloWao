<?php
 session_destroy();
unset($_SESSION);
 header("location: index-2.php");
 exit();

?>