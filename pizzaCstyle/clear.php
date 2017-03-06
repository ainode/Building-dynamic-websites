<?
session_start();
unset($_SESSION["cart"]);
session_destroy();
require_once("begin.php");
?>
Your cart is empty