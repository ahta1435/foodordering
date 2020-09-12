<?php
session_start();
include_once("connection.php");
if($_SESSION["admin"])
{
$query="select * from fooditem";
$res=mysqli_query($conn,$query);
?>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div id="main" style="display:block;">
<table class="table">
 <thead>
      <tr>
          <th scope="col">IMAGE</th>
          <th scope="col">FOOD Id</th>
		  <th scope="col">category</th>
          <th scope="col">Name</th>
		  <th scope="col">Price</th>
		  <th scope="col">DISCOUNT</th>
          <th scope="col">Description</th>
		  <th scope="col">ACTION</th>
</tr>
           
 </thead>
       <?php
         while($row=mysqli_fetch_object($res))
           {
       ?>
       <tr>
			<td><img src="foodimages/<?php echo $row->filename ?>" height="100px" width="100px"></td>
            <td><?php echo $row->foodid?></td>          
			<td><?php echo $row->categoryname ?></td>        
			<td><?php echo $row->foodname?></td>
			<td>RS.<?php echo $row->price ?></td>
             <td><?php echo $row->discount ?></td>
		  <td><?php echo $row->description ?></td>
		  <td><a href="edit.php?action=edit&id=<?php echo $row->foodid ?>"><span  class="btn btn-primary sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
		  <a href="submission.php?action=delete&id=<?php echo $row->foodid ?>" ><span  id="delete" class="btn btn-danger sm"><i class="fa fa-scissors" aria-hidden="true"></i></span></a></td>
		  <td><thead></thead><td>
           </tr>		   
       <?php
         }
           ?>
    </table>
</div>
<?php
}
else{
	?>
	<?php
       header("location:login.php");
   }
	?>
</body>
</html>