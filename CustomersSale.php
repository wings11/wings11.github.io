<?php
session_start();
if($_SESSION["cusloggedIn"] != true){
    echo 'not logged in';
    header("Location: Customerlogin.php");
    exit;
}elseif($_SESSION["subscription"] == 1){
    echo 'not logged in';
    header("Location: customerreview.php");
    exit;
}elseif($_SESSION["subscription"] == 2){
    echo 'not logged in';
    header("Location: customerhome.php");
    exit;
}
	include('ConnectDB.php');
	include('AutoIDFunction.php');


	if(isset($_POST['btnsubmit']))
	{

		$image=$_FILES['txtpath']['name'];
		$folder="TransactionImages/";
			if ($image)
			{
				$filename=$folder.$image;
				$copied=copy($_FILES['txtpath']['tmp_name'], $filename);
				if(!$copied)
				{
					exit("Problem occured.");
				}
			}

				$customerid=$_SESSION["CustomerID"];
      $sql = "UPDATE customer SET PATHS='$filename',subscription='1' WHERE CustomerID=$customerid";

      if (mysqli_query($connection, $sql)) {
      header('Location: customerreview.php'); exit;
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

      mysqli_close($connection);

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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body background="Images/bg.jpg">
	<header>
		<div class="header1">
	        <!--
	        <a href="#" class="logo"><i class="fas fa-infinity"></i>Manhua Myanmar</a>-->
	        <a href="customerhome.php"><img class="img-logo"src="Images/index1.png" alt="My Logo"></a>
	        <a href="customerhome.php" class="h2">READBOOKS</a>
	   </div>
	</header>

	<div class="form-container">
        <form action="CustomersSale.php" method="post" enctype="multipart/form-data">
            <h3>Please Confirm Payment </h3>
<h1>20000 Kyats for unlimited access</h1>
<br>
<h2>KBZPay 09424384935</h2>
<br>
<h2>KBZPay 09424384935</h2>
<br>
</br>
                <tr><h2>Upload your transaction screen shot</h2><input type="file" name="txtpath" required placeholder="Images" class="box"></tr><br>

                <br>
                <br>
                <br>

 							<input type="submit" name="btnsubmit" value="Submit" class="button">
 						<a href="Logout.php" class="button">Logout</a>
     	  </form>
        </div>

</body>
</html>
