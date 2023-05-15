<?php

  session_start();
  $customerid=$_SESSION["CustomerID"];
  function reloadsession($customerid){
    include('ConnectDB.php');
    $query="SELECT * FROM Customer WHERE CustomerID='$customerid'";
    $result=mysqli_query($connection,$query);
    $count=mysqli_num_rows($result);
    if ($count>0)
		{
			$arr=mysqli_fetch_array($result);
      	$_SESSION['subscription']=$arr['subscription'];
  }
}
   reloadsession($customerid);
  if($_SESSION["cusloggedIn"] != true){
      echo 'not logged in';
      header("Location: Customerlogin.php");
      exit;
  }
  elseif($_SESSION["subscription"] == 0){
      echo 'not logged in';
      header("Location: CustomersSale.php");
      exit;
  }elseif($_SESSION["subscription"] == 2){
      echo 'not logged in';
      header("Location: customerhome.php");
      exit;
  }

	include('ConnectDB.php');
	if (isset($_POST['button']))
	{
		$UserEmail=$_POST['txtemail'];
		$Password=$_POST['txtpassword'];
		$query="SELECT * FROM Customer WHERE CustomerEmail='$UserEmail' AND Password='$Password'";
		$result=mysqli_query($connection,$query);
		$count=mysqli_num_rows($result);
		if ($count>0)
		{
			$arr=mysqli_fetch_array($result);
			$_SESSION['CustomerID']=$arr['CustomerID'];
			$_SESSION['FirstName']=$arr['FirstName'];
			$_SESSION['LastName']=$arr['LastName'];
			$_SESSION['subscription']=$arr['subscription'];
			if($_SESSION['subscription']==0){
				header('Location: CustomersSale.php'); exit;
			}else if($_SESSION['subscription']==1){
				header('Location: inreview.php'); exit;
			}else if($_SESSION['subscription']==2){
				header('Location: customerhome.php'); exit;
			}

		}
		else
		{
			echo "<script>alert('Login Fail');</script>";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Payment being Review</title>
   <link href="images/favicon.ico" rel="icon" type="image/x-icon"/>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/stylec.css">

</head>


<body background="Images/bg.jpg">
<header>
    <div class="header1">
        <!--
        <a href="#" class="logo"><i class="fas fa-infinity"></i>Manhua Myanmar</a>-->
        <img class="img-logo"src="Images/OIP.jpg" alt="My Logo">
        <a href="customerhome.php" class="h2">READBOOKS</a>
   </div>
</header>
    <div class="form-container">


        <form action="CustomerLogin.php" method="post">
            <h4> Dear </h4 >
          <h2>Your Payment is being review it may take about 1-2 bussiness hour</h2>
            <td></td>

			<section>

                   <a href="Logout.php" class="button">Logout</a>
                </section>
		</form></div></body>


</html>
