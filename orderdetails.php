<?PHP
include_once("connection.php");
$query="select * from orderitem";
$que=mysqli_query($conn,$query);
$res=mysqli_num_rows($que);
if($res==0)
{
   echo	"no item found";
   
}
else
{
?>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table class="table">
 <thead>
      <tr>
          <th scope="col">orderid</th>
		  <th scope="col">Name</th>
          <th scope="col">item</th>
		  <th scope="col">Price</th>
		  <th scope="col">order Date</th>           
</tr>
           
 </thead>
       <?php
         while($row=mysqli_fetch_object($que))
           {
       ?>
       <tr>
            <td><?php echo $row->orderid?></td>          
			<td><?php echo $row->username ?></td>        
			<td><?php echo $row->total?></td>
			<td>RS.<?php echo $row->item ?></td>
		  <td><?php echo $row->date ?></td>
           </tr> 
       <?php
         }
}
           ?>
    </table>
</body>
</html>