<?php
session_start();
session_destroy();
header("Location:http://localhost/IS/login/logueo.php");
?>