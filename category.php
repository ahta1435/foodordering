<?php
session_start();
include_once("connection.php");
$query="select * from category";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
$row=mysqli_fetch_object($res);
if(($_SESSION["admin"]))
{
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
*{
	margin:0;
	padding:0;	
}
#container{
	background-color:#f1f1f1;
	dispaly:block;
	text-align:center;
	justify-content:center;
	width:50%;
	height:50%;
	margin-top:20%;
	padding:10px;
	margin-left:auto;
	margin-right:auto;
	border:1px solid;
    border-radius:8px;	
}
#content{
	width:40%;
	height:100%;
	float:left;
	border:1px solid;
	background-color:rgba(0,0,0,0.4);
	border-radius:8px;	
}
</style>
<title>Category</title>
</head>
<body>
<div>
<div style="width:30%;height:100%;float:left;"></div>
<div  id="content">
<div id="container">
<p>INSERT NEW CATEGORY</p>
<form action="submission.php" enctype="multipart/form-data"  method="post">
<div><label>Categoryname</label><input type="text" name="catname" id="cat1" autocomplete="off" class="form-control" required></div>
<button style="margin-top:10px;" type="submit" name="cat" class="btn btn-primary sm">Submit</button>
</form>
</div>
</div>
</div>
<?php
}else{
?>
<?php
   header("location:login.php");
}
?>
</body>
</html>