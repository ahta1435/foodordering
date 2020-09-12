<?php
session_start();
include_once("connection.php");
$query="select * from category";
$que=mysqli_query($conn,$query);
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
	text-align:center;
	width:60%;
	height:100%;
	padding:10px;
	margin-left:auto;
	margin-right:auto;
	border:1px solid;
    border-radius:8px;	
	
}
#content{
	padding:2px;
	width:60%;
	height:100%;
	float:left;
	border:1px solid;
	background-color:rgba(0,0,0,0.4);
	border-radius:8px;	
	position:relative;
}
  </style>
</head>
<body>
<div>
<div style="width:20%;height:100%;float:left;"></div>
<div  id="content">
<div id="container">
<p>ADD ITEM</p>
<form action="submission.php" enctype="multipart/form-data" method="post">
<div><label>Choose Category</label><select name="select" class="form-control" >
                            <option required>--choose category--</option>
							<?php
							while($row=mysqli_fetch_object($que))
							{
					        ?>
							<option class="form-control" value="<?php echo $row->categoryname?>"><?php echo $row->categoryname ?></option>
                            <?php
							}
							?></select></div>
<div><label>FOOD ITEM</label><input type="text" name="fname" id="f1" required class="form-control"></div>
<div><label>price</label><input type="number" name="pr" id="p1" required class="form-control" min="0"></div>
<div><label>description</label><input type="text" name="desc" id="d1" class="form-control"></div>
<div><label>discount</label><input type="number" name="dis" id="dis1" required class="form-control" min="0"></div>
<div><label style="margin-top:20px;" >Image</label><input type="file" name="pic" id="pic" required   ></div>
<button style="margin-top:10px;" type="submit" name="food" class="btn btn-primary sm">ADD</button>
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