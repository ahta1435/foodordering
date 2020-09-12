<?php
session_start();
include("connection.php");
$query1="select * from fooditem";
$sql="select * from category";
$que1=mysqli_query($conn,$query1);
$s=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>food ordering</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<a href="https://icons8.com/icon/43327/dotted"></a>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" >
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div id="main" style="width:screen.width;height:900px;margin:0px;">
 	<div class="header" id="header">
		<div class="logo" style="height:100%;width:50%;float:left;"><a href="index.php">FOODIE</a></div>
		<div style="width:50%;height:100%;float:left;">
		<div style="width:20%;height:100%;float:left;"></div>
		<div style="width:20%;height:100%;float:left;"></div>
			<?php if(isset($_SESSION['user'])){ ?>

        <div style="width:20%;height:100%;float:left;margin-top:30px;" ><a href="logout.php" ><input id="login" type="submit" class="btn btn-danger " value="logout" name="btn"></a></div>
        <div style="width:20%;height:100%;float:left;position:rightfixed;margin-top:30px;"><?php echo $_SESSION["user"];?></div>
        <?php }else{ ?>
       <div style="width:20%;height:100%;float:left;margin-top:30px;"><a href="login.php" ><input id="login" type="submit" class="btn btn-success " value="login" name="btn"></a></div>
         <?php } ?>
         <div style="width:20%;height:100%;float:left;position:rightfixed;"><a href="cart.php"><img src="https://img.icons8.com/dotty/80/000000/add-shopping-cart.png"></a></div>
		</div>
		</div>
	<div id="contents" style="width:100%;height:85%;">
	<div id="menu"  style="border:1px solid #333;float:left;height:100%;width:16%;text-align:center;margin:8px;border-radius:8px;text-decoration:none;">
	<div>CATEGORY</div>
	<ul>
	<?php
	while($bw=mysqli_fetch_object($s))
	{
	?>       
   <li><a href="filter2.php?action=change&category=<?php echo $bw->categoryname;?>" ><input  type="button" class="btn btn-outline-primary btn-block" value="<?php echo $bw->categoryname?>" onclick='func();'></a></li>
	<?php }?>
      </ul>
    </div>
	
	<?php
	if(isset($_GET["action"]))
    {
	  if($_GET["action"]=="change")
	   {
	   	if(isset($_SESSION["cat"]))
	   	{
	   		$item=array_column($_SESSION["cat"] , "1");
	   		if(!in_array($_GET["category"], $item))
	   		{
	   			unset($_SESSION["cat"]);
	   			$_SESSION["cat"]=$_GET["category"];
	   				$cat=$_SESSION["cat"];
		         $sq="select * from fooditem where categoryname='".$cat."'";
		          $re=mysqli_query($conn,$sq);
		          echo $re;
		          while($row=mysqli_fetch_object($re))
		          {
		          ?>	
    <div id="cont" style="width:80%;height:100%;float:left;display:block;">	
	<div class="col-md-4" id="items" style="float:left;">
     <tr>
     	<form action="cart.php" method="post">
   <img src="foodimages/<?php echo $row->filename; ?>" height="100px" width="100px"></br>
   <DIV><b><?php echo $row->foodname;?></b></DIV>
   <div><b><?php echo $row->price?></b></div>
   <div><button type="submit" name="add_to_cart" class="btn btn-warning my-3">ADD TO CART<i class="fas fa-shopping cart"></i></button></div>

	<input type="hidden" name="id" value="<?php echo $row->foodid?>">
	<input type="hidden" name="name" value="<?php echo $row->foodname; ?>" />
	<input type="hidden" name="price" value="<?php echo $row->price; ?>" />
	</form>
   </div>
   <?php
      }
   ?>
   <?php
	   			}
	   		}

	   	}
	   	else{
	   		$arr=array(
               '$_GET["category"]'
	   		);
	   		$_SESSION["cat"][0]=$arr;
	   	}
		
	   }	
?>
	</div>
	</div>
</div>
<div style="margin-bottom:-120px;width:100%;height:100px;background-color:#000000;">
<div style="text-align:center;color:#ffffff;"><a href=#>@cpy</a></div>
</div>
</body>
</html>