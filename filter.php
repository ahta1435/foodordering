<?php
include_once("connection.php");
$sel=$_POST['sel'];
$query="select * from fooditem where categoryname='".$sel."'";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
if($count==0)
{
	echo "No. items found";
}
else
{
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
</style>
</head>
<body>
<table class="table">
<tr>
<thead>   
          
          <td scope="col">IMAGE</td>
          <td scope="col">Name</td>
		  <td scope="col">price</td>
		  <td scope="col">discount</td>
		  <td scope="col">description</td>
		  <td scope="col">Quantity</td>
</thead>
</tr>	  
  <?php
         while($row=mysqli_fetch_object($res))
           {
       ?>
	   <tr>
			<td><img src="foodimages/<?php echo $row->filename ?>" width="100px" height="100px"></td>        
			<td><?php echo $row->foodname?></td>
			<td>RS.<?php echo $row->price ?></td>
             <td><?php echo $row->discount ?></td>
		      <td><?php echo $row->description ?></td>
           
                        <form action="cart.php" method="post">
                         <input type="hidden" name="id" value="<?php echo $row->foodid?>">
						<input type="hidden" name="name" value="<?php echo $row->foodname; ?>" />
						<input type="hidden" name="price" value="<?php echo $row->price; ?>" />
                        <td><input type="text" name="quantity" value="1" class="form-control " /></td>
						<td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" ></td>
	                  </form>
          </tr>

       <?php
         }
}
?>
</table>
</body>
</html>