<?php
session_start();
$name=$_SESSION['uname'];
print_r($_SESSION['uname']);
include_once("connection.php");
$query="select * from orderitem where username='".$name."'";
$que=mysqli_query($conn,$query);
$res=mysqli_num_rows($que);
if($res==0)
{
	echo "cart is empty";
}
else
{
?>
<html>
<head>
</head>
<body>
<a href=# class="button" id="btn1">clickme</a>
<table>
<?php
while($row=mysqli_fetch_object($que))
{ 
?>
<tr>
<h3>your orders are:</h3>
<td><?php echo $name ?></td>
<td><?php echo $row->item ?></td>
<td><?php echo $row->total ?></td>
</tr>
</table>
</div>
</div>
<?php
}
}
?>
</body>
<script>
</script>
</html>