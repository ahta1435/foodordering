<?php
session_start();
include_once("connection.php");
if($_SESSION["admin"])
{
if(isset($_GET["action"]))
{
	if($_GET["action"]=="edit")
	{
		$id=$_GET["id"];
		$sql="select * from fooditem where foodid='".$id."'";
		$que=mysqli_query($conn,$sql);
?>
<!doctype html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<p>EDIT ITEM</p>
<form action="submission.php" enctype="multipart/form-data" method="post">
<div><label>Choose Category</label><select name="select" class="form-control" >
                            <option required>--choose category--</option>
							<?php
							while($row=mysqli_fetch_object($que))
							{
					        ?>
							<option class="form-control" value="<?php echo $row->categoryname?>"><?php echo $row->categoryname ?></option>
                           </select></div>
 <div><input type="hidden" name="id" value="<?php echo $_GET["id"]?>"></div>                        
<div><label>previous name</label><input type="text" name="fname" id="f1" required class="form-control" value="<?php echo $row->foodname ?>" readonly></div>
<div><label>new name</label><input type="text" name="newname" id="f1" required class="form-control" value="<?php echo $row->foodname ?>" ></div>
<div><label>price</label><input type="number" name="pr" id="p1" required class="form-control" value="<?php echo $row->price ?>" readonly></div>
<div><label>new price</label><input type="text" name="newprice" id="f1" required class="form-control" value="<?php echo $row->price ?>"></div>
<button style="margin-top:10px;" type="submit" name="update" class="btn btn-primary sm">update</button>
</form>
</div>
</div>
</div>
<?php
}
}
}
}else{
?>
<?php
    header("location:login.php");
   }
?>
</body>
</html>