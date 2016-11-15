<?
session_start();
session_unset();
session_destroy();
header('Location: /scal/login');
?>