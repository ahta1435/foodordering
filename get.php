<?php
include_once("connection.php");
$query="select * from category";
$sql=mysqli_query($conn,$query);
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
#abc{
	width:100%;
	height:100%;
	background-color:rgba(0,0,0,0.6);
	position:relative;
	display:flex;
	justify-content:center;
	align-items:center;
}
form{
	width:500px;
	text-align:center;
	height:300px;
	background-color:white;
	border-radius:8px;
	position:absolute;
}
a{
	margin-top:10px;
	position:absolute;
	top:0;
	right:5px;
}
select{
	
	width:100px;
	height:50px;
	border-radius:4px;
	margin:10px;
	
}
button{
	width:100px;
	height:30px;
	border-radius:4px;
	
}
</style>
</head>
</body>
<div id="abc">
<form action="filter.php" enctype="multipart/form-data" method="post">
<a href="viewcart.php" class="btn btn-primary">view your cart</a>
<h2>Place order?</h2>
<div><label>Category</label><select name="sel">
                            <option>--choose category--</option>
							<?php
							while($row=mysqli_fetch_object($sql))
							{
					        ?>
							<option value="<?php echo $row->categoryname?>"><?php echo $row->categoryname ?></option>
                            <?php
							}
							?></select></div>
							<button type="submit">submit</button>
</form>
</div>
</body>
</html>