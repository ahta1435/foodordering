<?php
$servername="localhost";
$username="root";
$password="";
$db="project";
$conn=mysqli_connect($servername,$username,$password)or die("error:".mysqli_error($conn));
$select=mysqli_select_db($conn,$db)or die("error:".mysqli_error($conn));
?>