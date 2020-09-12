<?php
session_start();
$_SESSION["admin"];
if(($_SESSION["admin"]))
{
?>
<html>
<head>
<style>
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<h4>hello!!<?php echo $_SESSION["admin"];?><p><a href="logout.php"><input type="button" class="btn btn-danger sm"  value="logout"></a></p></h4>
<div>
<a href="category.php"  role="button" class="btn btn-primary btn-block"  id="btn1">ADD NEW CATEGORY?</a>
<a  role="button" class="btn btn-primary btn-block"  id="btn2" href="addfood.php">ADD A NEW FOOD ITEM?</a>
<a href="viewitems.php"  role="button" class="btn btn-primary btn-block" id="btn3">VIEW FOOD ITEMS</a>
<a href="orderdetails.php" role="button" class="btn btn-primary btn-block"  id="btn4">ORDER DETAILS</a>
<a href="viewuser.php" role="button" class="btn btn-primary btn-block"  id="btn5">VIEW USERS</a>
</div>
<?php
}
else
{
	header("location:login.php");
}
?>
</body>
</html>
