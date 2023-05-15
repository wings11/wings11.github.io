<?php 
	include('ConnectDB.php');
	 session_start();
   
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }
	
	if (isset($_POST['btnsubmit'])) 
	{
		$cid=$_POST['txtcustomerid'];
		$fname=$_POST['txtfname'];
		$lname=$_POST['txtsurname'];
		$phone=$_POST['txtphone'];
		$txtemail=$_POST['txtemail'];
		$txtaddress=$_POST['txtaddress'];
		
		$Update="UPDATE customer SET 
		         FirstName='$fname',
		         LastName='$lname',
		         Phone='$phone',
		         CustomerEmail='$txtemail',
				Address='$txtaddress'
		         WHERE CustomerID=$cid";
			$result=mysqli_query($connection,$Update);
			if ($result) 
			{
				echo "<script>window.alert('Customer Update Successful');</script>";
				echo "<script>window.location='customerlist.php';</script>";
			}
			else
			{
				echo mysqli_error($connection);
			
			}				
	}
 ?>
