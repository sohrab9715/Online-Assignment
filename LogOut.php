<?php
session_start();
session_unset();
session_destroy();
//echo '<script language = "javascript">alert("Logout Successfully");</script>';
header("location:index.html");

?>