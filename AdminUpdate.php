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
		$aid=$_POST['txtaid'];
		$fname=$_POST['txtfname'];
		$sname=$_POST['txtsurname'];
		$gender=$_POST['optgender'];
		$phone=$_POST['txtphone'];
		$dob=date ("Y-m-d",strtotime($_POST['txtdob']));
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];
		$address=$_POST['txtaddress'];


		$Update="UPDATE Admin SET 
		         FirstName='$fname',
		         LastName='$sname',
		         Phone='$phone',
		         AdminEmail='$email',
		         Password='$password',
		         Address='$address',
		         DOB='$dob',
		         Gender='$gender'    
		         WHERE AdminID='$aid'";
			$result=mysqli_query($connection,$Update);
			if ($result) 
			{
				echo "<script>window.alert('Admin Update Successful');</script>";
				echo "<script>window.location='AdminRegister.php';</script>";
			}
			else
			{
				echo "<script>window.alert('Admin Cannot Update');</script>";
				echo "<script>window.location='AdminRegister.php';</script>";
			}				
	}

	if(isset($_GET['AdminID'])) 
	{
		$AdminID=$_GET['AdminID'];
		$query="SELECT * FROM Admin WHERE AdminID='$AdminID'";
		$ret=mysqli_query($connection,$query);
		$arr=mysqli_fetch_array($ret);
	}
	else
	{
		echo "<script>window.alert('Please Choose AdminID.');</script>";
		echo "<script>window.location='AdminRegister.php';</script>";
	}
 ?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Update</title>
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
        <img class="img-logo"src="Images/index1.png" alt="My Logo">
        <a class="h2">READBOOKS</a>
   </div></header>
   <div class="form-container">
		<form action="AdminUpdate.php" method="POST">
			<h3>Edit Your Information!</h3>
			<table align="center" cellpadding="5">
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="txtaid" value="<?php echo $arr['AdminID']; ?>" class="box" required>
						</td>
					</tr>
					<tr>
						<td>First Name  </td>
						<td>
							<input type="text" name="txtfname" value="<?php echo $arr['FirstName']; ?>" class="box" required>
						</td>
					</tr>
					<tr>
						<td>Last Name  </td>
						<td>
							<input type="text" name="txtsurname" value="<?php echo $arr['LastName']; ?>" class="box" required>
						</td>
					</tr>
					<tr>
						<td>Phone  </td>
						<td>
							<input type="text" name="txtphone" value="<?php echo $arr['Phone']; ?>" class="box" required>
						</td>
					</tr>
					<tr>
						<td>Admin Email  </td>
						<td>
							<input type="text" name="txtemail" value="<?php echo $arr['AdminEmail']; ?>" class="box" required>
						</td>
					</tr>
					<tr>
						<td>Password  </td>
						<td><input type="text" name="txtpassword" value="<?php echo $arr['Password']; ?>" class="box" required></td>
					</tr>
					<tr>
						<td>Address  </td>
						<td><input type="text" name="txtaddress" value="<?php echo $arr['Address']; ?>" class="box" required></td>
					</tr>
					<tr>
						<td>Date of Birth  </td>
						<td><input type="date" name="txtdob" value="<?php echo $arr['DOB']; ?>" class="box" required></td>
						</td>
					</tr>
					<td>Select Gender</td>
						<td>
						<select name="optgender" class="box">
                <option disabled selected>Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
                </select></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<?php 
								if (isset($_GET['Mode'])) 
								{
									echo "<input type='submit' name='btnupdate' value='Update' class='button'>";
								}
								else
								{
									echo "<input type='submit' name='btnsave'  value='Save' class='button'>";
								}
							 ?>
							 <input type="reset" name="btncancel" value="Cancel" class="button">
						</td>
					</tr>
				</table>
		</form>
	</body>
</html>