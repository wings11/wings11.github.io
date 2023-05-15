<?php 
	include('ConnectDB.php');
	 session_start();
   
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }


    
	if(isset($_GET['CustomerID'])) 
	{
		$bookid=$_GET['CustomerID'];
		$query="SELECT * FROM customer WHERE CustomerID='$bookid'";
		$ret=mysqli_query($connection,$query);
		$arr=mysqli_fetch_array($ret);
	}
	else
	{
		echo "<script>window.alert('Please Choose bookid.');</script>";
		
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
				echo "<script>window.alert('Admin Update Successful');</script>";
				echo "<script>window.location='booklist.php';</script>";
			}
			else
			{
				echo mysqli_error($connection);
			
			}				
	}
 ?>

 <!DOCTYPE html>
 <html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
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
        <a href="customerhome.php"><img class="img-logo"src="Images/index1.png" alt="My Logo"></a>
        <a href="customerhome.php" class="h2">READBOOKS</a>
   </div></header>
    <div class="form-container">


        <form action="CustomerUpdate2.php" method="post">
            <h3>Enter Your Information!</h3>
            <input type="text" name="txtcustomerid" value="<?php echo $arr['CustomerID']; ?>" hidden  required>
                <input type="text" name="txtfname" value="<?php echo $arr['FirstName']; ?>" required class="box" required>
                <input type="text" name="txtsurname" value="<?php echo $arr['LastName']; ?>" required class="box" required>
                <input type="text" name="txtphone" value="<?php echo $arr['Phone']; ?>" required class="box">

                <input type="email" name="txtemail" value="<?php echo $arr['CustomerEmail']; ?>" required class="box">
                <input type="text" name="txtaddress" value="<?php echo $arr['Address']; ?>" required class="box">
                <br>
                <br>
                <br>

                            <input type="submit" name="btnsubmit" value="Submit" class="button">
                            <input type="reset" name="Clear" class="button">


                <section>
                	<label>Already have an account?</label>
                   <a href="CustomerLogin.php" class="button">Log in now!</a>
                </section>
        </form>
     </body>
 </html>
