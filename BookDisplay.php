<?php 
session_start();
include 'ConnectDB.php';
if($_SESSION["cusloggedIn"] != true){
        echo 'not logged in';
        header("Location: CustomerLogin.php");
        exit;
    }
if (isset($_REQUEST['BookID']))
	{
		$BookID=$_REQUEST['BookID'];
		$query="SELECT * FROM Book WHERE BookID='$BookID'";
		$ret=mysqli_query($connection,$query);
		$row=mysqli_fetch_array($ret);
		$pdf=$row['PDF'];
	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display PDF</title>
	<link href="images/favicon.ico" rel="icon" type="image/x-icon"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="style1.css"> 

	

</head>
<header>
<a href="customerhome.php" class="logo"><img src="images/favicon.ico">ReadBooks</a>
<nav class="navbar">
             <a href="customerhome.php">Home</a>
        </nav>
</header>
<body>
		
			<embed src="<?php echo $pdf; ?>" type="application/pdf" width="100%" height="1000px" />
			
		
</body>
</html>