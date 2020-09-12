<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
<style>
	*{
		margin:0px;
		padding:0px;
	}
	.container{
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
	background-color:#f1f1f1;
	border-radius:8px;	
}

</style>
</head>
<body>
<div>
<div style="width:30%;float:left;height:100%;"></div>
<div id="content">
<div class="container">
<form action="submission.php" method="post">
<p>REGISTER USER</p>
<div><label>USER NAME</label><input type="text" name="uname" id="f1" placeholder="enter name" class="form-control" required></div>
<div><label>PASSWORD</label><input type="password" name="pd" id="p1" placeholder="enter password" class="form-control" required></div>
<div><label>Address</label><input type="textarea" class="form-control" name="address" placeholder="enter your address"></div>
<button style="margin-top:10px;" type="submit" name="user" class="btn btn-success" value="submit">submit</button>
</form>
</div>
</div>
</div>
</body>
</html>