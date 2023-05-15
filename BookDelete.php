<?php 
	include('ConnectDB.php');
	if (isset($_REQUEST['BookID'])) 
	{
		$iID=$_REQUEST['BookID'];
		$query="DELETE FROM book WHERE BookID='$iID'";
		$result=mysqli_query($connection,$query);
		if ($result) 
		{
			echo "<script>window.alert('Book was Deleted Successfully');</script>";
			echo "<script>window.location='booklist.php';</script>";
		}
		else
		{
			echo "<script>window.alert('Book cannot be deleteed!');</script>";
			echo "<script>window.location='booklist.php';</script>";
		}
	}
	else
	{
		echo "<script>window.location='booklist.php';</script>";
	}
 ?>