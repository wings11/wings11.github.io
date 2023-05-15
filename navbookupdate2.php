<?php 
	include('ConnectDB.php');
	 session_start();
   
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }

	if (isset($_POST['btnupdate'])) 
	{
		$NavBookID=$_POST['txtnavbookid'];
		$NavBookName=$_POST['txtnavbookname'];
		$description=$_POST['txtdes'];
		
		$Update="UPDATE navbar SET 
		         NavBookName='$NavBookName',
		         NavBDes='$description',
		         WHERE NavBookID=$NavBookID";
			$result=mysqli_query($connection,$Update);
			if ($result) 
			{
				echo "<script>window.alert('Slider Book Updated Successful');</script>";
				echo "<script>window.location='navbooklist.php';</script>";
			}
			else
			{
				echo mysqli_error($connection);
			
			}				
	}

	
 ?>