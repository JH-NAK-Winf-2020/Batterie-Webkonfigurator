<?php
session_start();
session_destroy();
 
// echo "Logout war erfolgreich";
include("login-formular.html");
exit();
?>
