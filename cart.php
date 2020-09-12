<?php
session_start();
include_once("connection.php");
if($_SESSION["user"])
{
if(isset($_POST["add_to_cart"]))
{	
  if(isset($_SESSION["cart"]))
  { 
   $item_array_id = array_column($_SESSION["cart"], "id");
		if(!in_array($_POST["id"], $item_array_id))
		{
			$count = count($_SESSION["cart"]);
			$item_array = array(
		    	'id'			=>	$_POST["id"],
				'name'			=>	$_POST["name"],
				'price'		     =>	$_POST["price"]
			);
			$_SESSION["cart"][$count] = $item_array;
		}
		else{
				echo '<script>alert("item already added")</script>';
				echo '<script>window.location="cart.php"</script>';
			}	
	}
else
{
	$item_array = array(
			'id'			=>	$_POST["id"],
			'name'			=>	$_POST["name"],
			'price'		    =>	$_POST["price"]	
		);
		$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values)
		{
			if($values["id"] == $_GET["id"])
			{
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
	if($_GET["action"]=="add")
	{
		if($_SESSION["user"])
		{ 
	    
         foreach($_SESSION["cart"] as $keys=>$values)
          {     
			   $ar=array($values['name'],$values['price']);
		  }
			   foreach($ar as $values)
				  $str=$values;
				  echo $str;
           $ql="insert into orderdetails(item,price) where values('".$item."','".$t."')";
		   $que=mysqli_query($conn,$ql);				
          
           if($que==1)
            {
        	echo'<script>alert("order has been placed")</script>';
        	echo'<script>window.location="main.php"</script>';
			unset($_SESSION['cart']);
             }
		}
		else
		{
			echo'<script>window.location="login.php"</script>';
		}
	    
	}
	
}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div style="clear:both float:left;width:100%;"></div>
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">PRICE</th>
						<th width="30%">quantity</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["cart"]))
					{
						$total = 0;
						foreach($_SESSION["cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><div id="item"><?php echo $values["name"] ; ?></div></td>
						<td><div id="price"><?php echo $values["price"]; ?></div></td>
						<td>
						<div><input type="number" name="quantity" class="form-control" id="quant"  value="1"></div>
						</div>
						</td>
						<td><?php echo $values["price"]; ?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="btn btn-primary sm btn-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ( $values["price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right"></td>
						<td align="right" name="total">RS<?php echo number_format($total, 2); ?></td>
						<td><a href="cart.php?action=add&price=<?php echo number_format($total, 2); ?>" role="button" class="btn btn-primary sm ">BUY</a></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
			
			<div style="float:left;width:70%;"></div>
			<div style="float:left;width:30%;"><a href="main.php">continue shopping</a></div>
</body>
<?php
}else
{
	header("location:login.php");
}
?>
</html>