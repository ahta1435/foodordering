<?php
include_once("connection.php");
if(isset($_POST['cat']))
{
$name=$_POST['catname'];
$query="insert into category(categoryname)  value('".$name."')";
$query1="select categoryname from category where categoryname='".$name."'";
$run=mysqli_query($conn,$query1);
$res=mysqli_num_rows($run);
if($res!=0)
{
	echo '<script>alert("category exists")</script>';
	echo '<script>window.location="category.php"</script>';
	
}
else
{
	$flg=mysqli_query($conn,$query);	
	echo '<script>alert("category added successfully")</script>';
	echo '<script>window.location="manage.php"</script>';
	
}
}
if(isset($_POST['food']))
{
	$name1=$_POST['fname'];
	$desc=$_POST['desc'];
	$photo=$_FILES['pic']['name'];
	$price=$_POST['pr'];
	$discount=$_POST['dis'];
	$cat=$_POST['select'];
	$serverpath="foodimages/";
	move_uploaded_file($_FILES["pic"]["tmp_name"], $serverpath."/".$photo);
$que="insert into fooditem(foodname ,price ,filename ,discount,description ,categoryname)  value('".$name1."','".$price."','".$photo."','".$discount."','".$desc."','".$cat."')";
	$que2="select foodname from fooditem where foodname='".$name1."'";
	$res1=mysqli_query($conn,$que2);
	$count=mysqli_num_rows($res1);
	if($count!=0)
	{
		echo '<script>alert("food item exists")</script>';
		echo '<script>window.location="addfood.php"</script>';
	}
	else{
		mysqli_query($conn,$que);
    echo '<script>alert("food item added successfully")</script>';
    echo '<script>window.location="manage.php"</script>';
   
	}
	
}
if(isset($_POST['user']))
{
  $name=$_POST['uname'];
  $password=$_POST['pd'];
  $addr=$_POST['address'];
  $query="insert into user(username,password,address)  value('".$name."','".$password."','".$addr."')";
$query1="select username from user where username='".$name."' and password='".$password."'";
$run=mysqli_query($conn,$query1);
$res=mysqli_num_rows($run);
if($res!=0)
{
	echo '<script>alert("user exists")</script>';
	echo  '<script>window.location="register.php"</script>';
}
else
{
	$flg=mysqli_query($conn,$query);	
	echo '<script>alert("registered successfully")</script>';
	echo  '<script>window.location="login.php"</script>';
}
}
if(isset($_POST['update']))
{
    $name=$_POST['newname'];
    $price=$_POST['newprice'];
    $id=$_POST['id'];
    $sql="update fooditem set foodname='".$name."',price='".$price."' where foodid='".$id."'";
    $que=mysqli_query($conn,$sql);
    if($que==1)
    {
    	echo '<script>alert("updated successfully")</script>';
	echo  '<script>window.location="viewitems.php"</script>';
    }
  else
  {
   echo '<script>alert("unable to update")</script>';
	echo  '<script>window.location="viewitems.php"</script>';
  }
}
if($_GET["action"])
{
   if($_GET["action"]=="delete")
   {
      $id=$_GET["id"];
      $sql="delete from fooditem where foodid='".$id."'";
      $que=mysqli_query($conn,$sql);
      if($que==1)
      {
      	echo '<script>alert("deleted successfully")</script>';
	echo  '<script>window.location="viewitems.php"</script>';
      }
      else
      {
      	echo '<script>alert("unable to delete")</script>';
	echo  '<script>window.location="viewitems.php"</script>';
      }

   }
}	
?>