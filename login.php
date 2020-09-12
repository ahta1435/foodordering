<?php
include_once("connection.php");
session_start();
if(isset($_POST['submit']))
{
$name=$_POST["user"];
$pass=$_POST["pass"];
$que="select * from user where username='".$name."' and password='".$pass."'";
$que1=mysqli_query($conn,$que);
$row=mysqli_fetch_object($que1);
if($row!=null)
{
	echo '<script>alert("login successful")</script>';
	$_SESSION["user"]=$name;
	header("location:main.php");
}
else
{
	echo '<script>alert("invalid username or password")</script>';
	echo '<script>window.location="login.php"</script>';
	
}
}
if(isset($_POST['submit2']))
{
 $n=$_POST['admin'];
 $pass=$_POST['pass'];
 $que="select * from admin where name='".$n."' and password='".$pass."' ";
 $que1=mysqli_query($conn,$que);
  $row=mysqli_fetch_object($que1);
 if($row!=null)
 {
	 echo '<script>alert("login successful")</script>';
	    $_SESSION["admin"]=$n;
	echo '<script>window.location="manage.php"</script>';
	 
 }
 else
{
	echo '<script>alert("invalid username or password")</script>';
	echo '<script>window.location="login.php"</script>';
	
}
}
?>
<html>
<head>
<meta name="viewport" content="width:device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<div id="bod">
<div id="user">
<div style="width:70%;border:1px solid;padding:30px;">
<form action="login.php" method="post">
<div>USER LOGIN</div>
<div><input type="text" id="txtuser" name="user" placeholder="Username" autocomplete="off" class="form-control"required></div>
<div><input type="password" id="txtpass" name="pass" placeholder="password" required class="form-control"></div>
<div align="center"><button id="btn1" name="submit" class="btn btn-success sm">Login</button></div>
<p>DONT have an account? <a href="register.php">REGISTER HERE</a>.</p>
</form>
</div>
</div>
<div id="admin">
<div style="width:70%;border:1px solid;padding:30px;">
<form action="login.php" method="post">
<div>ADMIN LOGIN</div>
<div><input type="text" id="txtuser" name="admin" placeholder="name" autocomplete="off" class="form-control"required></div>
<div><input type="password" id="txtpass" name="pass" placeholder="password" required class="form-control"></div>
<div align="center"><button id="btn1" name="submit2" class="btn btn-success sm">Login</button></div>
</form>
</div>
</div>
</div>
</body>
</html>