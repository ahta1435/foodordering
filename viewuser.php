<?php
session_start();
include_once("connection.php");
$que="select * from user";
$que1=mysqli_query($conn,$que);
$res=mysqli_num_rows($que1);
?>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
if(isset($_SESSION["admin"]))
{
?>
<table class="table">
 <thead>
      <tr>
          <th scope="col">userid</th>
		  <th scope="col">Name</th>
		  <th scope="col">ADDRESS</th>
		  <th scope="col">Date-time</th>           
     </tr>
  </thead>
<?php
while($row=mysqli_fetch_object($que1))
{
?>
<tr>
            <td><?php echo $row->userid?></td>          
			<td><?php echo $row->username ?></td>        
			<td><?php echo $row->address?></td>
			<td><?php echo $row->created_at ?></td>
</tr> 
<?php
}
}else{
	header("location:login.php");
?>
<?php
}
?>

</body>
</html>