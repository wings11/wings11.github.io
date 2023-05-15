<?php 
	include('ConnectDB.php');
	if (isset($_REQUEST['NavBookID'])) 
	{
		$iID=$_REQUEST['NavBookID'];
		$query="DELETE FROM navbar WHERE NavBookID='$iID'";
		$result=mysqli_query($connection,$query);
		if ($result) 
		{
			echo "<script>window.alert('Book was Deleted Successfully!');</script>";
			echo "<script>window.location='navbooklist.php';</script>";
		}
		else
		{
			echo "<script>window.alert('Book cannot be deleteed!');</script>";
			echo "<script>window.location='navbooklist.php';</script>";
		}
	}
	else
	{
		echo "<script>window.location='navbooklist.php';</script>";
	}
 ?>