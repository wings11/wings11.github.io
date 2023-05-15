<?php
	session_start();
  include('ConnectDB.php');
  if($_SESSION["loggedIn"] != true){
      echo 'not logged in';
      header("Location: AdminLogin.php");
      exit;
  }



	$cusid=$_SESSION['AdminID'];

	if (isset($_POST['button']))
	{

		$Password=$_POST['txtpassword'];
    $newPassword1=$_POST['txtnewpassword1'];
    $newPassword2=$_POST['txtnewpassword2'];
		$query="SELECT * FROM admin WHERE AdminID='$cusid' AND Password='$Password'";
		$result=mysqli_query($connection,$query);
		$count=mysqli_num_rows($result);
    if($newPassword1 != $newPassword2)
        {
            echo "<script>window.alert('Passwords not matched!');</script>";
        }else{
          if ($count>0)
          {



            $sql = "UPDATE admin SET Password='$newPassword1' WHERE AdminID='$cusid'";

            if (mysqli_query($connection, $sql)) {
            echo "<script>alert('Password Successfully change');</script>";

            } else {
              echo "Error " . mysqli_error($connection);
            }

            mysqli_close($connection);





          }
          else
          {
            echo "<script>alert('Password Not Correct');</script>";
          }

        }

	}
 ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Change Password</title>
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
        <a href="AdminHome.php" class="h2">READBOOKS</a>
   </div>
</header>
    <div class="form-container">
        <form action="achangepassword.php" method="post">
            <h4 >Change Password</h4 >
            <input type="password" name="txtpassword" placeholder="Current Password!" required class="box">
              <input type="password" name="txtnewpassword1" placeholder="New Password!" required class="box">
              <input type="password" name="txtnewpassword2" placeholder="Renter New Password!" required class="box">
            <td></td>
			<td><input type="submit" name="button" value="Change" class="button"></td>
			<section>
                   <a href="AdminHome.php" class="button">Home</a>
                </section>
		</form></div></body>


</html>
