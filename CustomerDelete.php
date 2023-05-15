<?php 
	include('ConnectDB.php');

   
	if (isset($_GET['CustomerID'])) 
	{
		$iID=$_GET['CustomerID'];
		$query="DELETE FROM customer WHERE CustomerID='$iID'";
		$result=mysqli_query($connection,$query);
		if ($result) 
		{
			echo "<script>window.alert('Customer was Deleted Successfully!');</script>";
			echo "<script>window.location='customerlist.php';</script>";
		}
		else
		{
			echo "<script>window.alert('Book cannot be deleteed!');</script>";
			echo "<script>window.location='customerlist.php';</script>";
		}
	}
	else
	{
		echo "<script>window.location='customerlist.php';</script>";
	}
 ?>