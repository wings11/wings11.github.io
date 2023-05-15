<?php
	session_start();
	include('ConnectDB.php');
	if (isset($_POST['button']))
	{
		$UserEmail=$_POST['txtemail'];
		$Password=$_POST['txtpassword'];
		$query="SELECT * FROM customer WHERE CustomerEmail='$UserEmail' AND Password='$Password'";
		$result=mysqli_query($connection,$query);
		$count=mysqli_num_rows($result);
		if ($count>0)
		{
			$arr=mysqli_fetch_array($result);
			$_SESSION["cusloggedIn"]=true;
			$_SESSION['CustomerID']=$arr['CustomerID'];
			$_SESSION['FirstName']=$arr['FirstName'];
			$_SESSION['LastName']=$arr['LastName'];
			$_SESSION['subscription']=$arr['subscription'];
			if($_SESSION['subscription']==0){
				header('Location: CustomersSale.php'); exit;
			}else if($_SESSION['subscription']==1){
				header('Location: customerreview.php'); exit;
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
   <title>Log In</title>
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
        <img class="img-logo"src="Images/index1.png" alt="My Logo">
        <a href="index.php" class="h2">READBOOKS</a>
   </div></header>
    <div class="form-container">


        <form action="CustomerLogin.php" method="post">
            <h4 >Sign in to READBOOK</h4 >
            <input type="email" name="txtemail" placeholder="example@email.com" required class="box">
            <input type="password" name="txtpassword" placeholder="Enter Your Password!" required class="box">
            <td></td>
			<td><input type="submit" name="button" value="Log in" class="button"></td>
			<section>
                	<label>Don't have an Account?</label>
                   <a href="CustomerRegister.php" class="button">Register Now!</a>
                </section>
		</form></div></body>


</html>
