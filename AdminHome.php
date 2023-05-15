 <?php

    session_start();
    include('ConnectDB.php');
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="stylead.css">
	<link href="images/favicon.ico" rel="icon" type="image/x-icon"/>
</head>
<body background="Images/bg.jpg">
	<div class="head">
		<h3 class="Menu" id="Logo">ReadBooks</h3>
		<div class="btn"><a href="adminlogout.php" class="myButton"><h1>Log Out</h1></a>
            <a href="adminacc.php" class="myButton"><h1>Admin Account</h1></a></div>
	</div>

	<?php 

	include "ConnectDB.php";
$sql = "SELECT * from customer";
if ($result = mysqli_query($connection, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
 }

 $sql2 = "SELECT * from customer WHERE subscription=2";
if ($result = mysqli_query($connection, $sql2)) {
    // Return the number of rows in result set
    $rowcount2 = mysqli_num_rows( $result );
 }
$total =$rowcount2*20000;

 $sql3 = "SELECT * from customer WHERE subscription=1";
if ($result = mysqli_query($connection, $sql3)) {
    // Return the number of rows in result set
    $rowcount3 = mysqli_num_rows( $result );
 }
 $sql4 = "SELECT * from book";
 if ($result4 = mysqli_query($connection, $sql)){
 	$rowcount4 = mysqli_num_rows( $result4 );
 }
?>

<div class="grid-container">
  <div class="grid-item"><a href="CustomerList.php" class="myButton"><h1>Total Customer : <?php echo "$rowcount" ?> </h1></a><br><br></div>
  <div class="grid-item"><a href="admincheck.php" class="myButton"><h1>Pending Customer : <?php echo "$rowcount3" ?> </h1></a><br><br></div>
  <div class="grid-item"><div class="myButton"><h1>Total Subscribers : <?php echo "$rowcount2" ?></h1></div><br><br></div>
  <div class="grid-item"><a href="#" class="myButton"><h1>Total Income :  <?php echo "$total" ?> Kyats</h1></a></div>
  <div class="grid-item"><a href="AdminRegister.php" class="myButton"><h1>Create Admin Account</h1></a></div>
  <div class="grid-item"><a href="booklist.php" class="myButton"><h1>Total Number of Books :  <?php echo "$rowcount4" ?></h1></a></div></div>
  
  
<div class="but"><a href="AdminList.php" class="myButton"><h1>Manage Admins</h1></a>
<a href="customerlist.php" class="myButton"><h1>Manage Customers</h1></a></div>
<div class="but"><a href="Add_Book.php" class="myButton"><h1>Add New Books</h1></a>
<a href="booklist.php" class="myButton"><h1>Manage Books</h1></a></div>
<div class="but"><a href="navaddbook.php" class="myButton"><h1>Add New Slider Books</h1></a>
<a href="navbooklist.php" class="myButton"><h1>Edit Slider Books</h1></a></div>


		
		
</html>
