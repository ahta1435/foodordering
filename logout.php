<?php
session_start();
if($_SESSION["user"])
{
	unset($_SESSION["user"]);
	echo'<script>alert("successfully logged out")</script>';
	echo'<script>window.location="main.php"</script>';
}
if($_SESSION["admin"])
{
	unset($_SESSION["admin"]);
	echo'<script>alert("successfully logged out")</script>';
	echo'<script>window.location="login.php"</script>';
}
?>