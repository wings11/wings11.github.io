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
		$bid=$_POST['txtbookid'];
		$bookname=$_POST['txtbookname'];
		$author=$_POST['txtauthor'];
		$category=$_POST['optcate'];
		$type=$_POST['opttype'];
		$pname=$_POST['txtpname'];
		
		$Update="UPDATE book SET 
		         BookName='$bookname',
		         Author='$author',
		         Category='$category',
		         Type='$type',
				 PublisherName='$pname'
		         WHERE BookID=$bid";
			$result=mysqli_query($connection,$Update);
			if ($result) 
			{
				echo "<script>window.alert('Book Update Successful');</script>";
				echo "<script>window.location='booklist.php';</script>";
			}
			else
			{
				echo mysqli_error($connection);
			
			}				
	}

	
 ?>



