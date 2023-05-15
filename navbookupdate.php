<?php 
	include('ConnectDB.php');
	 session_start();
   
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }
	if(isset($_GET['NavBookID']))
	{
		$NavBookID=$_GET['NavBookID'];
		$query="SELECT * FROM navbar WHERE NavBookID='$NavBookID'";
		$ret=mysqli_query($connection,$query);
		$arr=mysqli_fetch_array($ret);
	}
	else
	{
		echo "<script>window.alert('Please Choose navbookid.');</script>";
		
	}
	
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Books</title>
   <link href="images/favicon.ico" rel="icon" type="image/x-icon"/>

   <!-- font awesome cdn link  -->
    <!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
</head>
<body background="Images/bg.jpg">
	<header>
		<div class="header1">
	        <!--
	        <a href="#" class="logo"><i class="fas fa-infinity"></i>Manhua Myanmar</a>-->
	        <a href="adminhome.php"><img class="img-logo"src="Images/index1.png" alt="My Logo"></a>
	        <a href="adminhome.php" class="h2">READBOOKS</a>
	   </div>
	</header>

	<div class="form-container">        
        <form action="navbookupdate2.php" method="post" enctype="multipart/form-data">
            <h3>Update Slider Book Information!</h3>
            	<input type="text" name="txtnavbookid" value="<?php echo $arr['NavBookID']; ?>" hidden  required>
                <input type="text" name="txtnavbookname" value="<?php echo $arr['NavBookName']; ?>" required class="box" required>
                <input type="text" name="txtdes" value="<?php echo $arr['NavBDes']; ?>" required class="box" required>
                <br>
                <br>
                <br>
 							<input type="submit" name="btnupdate" value="Update" class="button">
 							<input type="reset" name="Clear" class="button">
     	  </form>  
        </div>

</body>
</html>