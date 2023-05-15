<?php




    include('ConnectDB.php');

    if (isset($_POST['btnsubmit']))
    {
        $fname=$_POST['txtfname'];
        $sname=$_POST['txtsurname'];
        $gender=$_POST['optgender'];
        $phone=$_POST['txtphone'];
        $dob=date ("Y-m-d",strtotime($_POST['txtdob']));
        $email=$_POST['txtemail'];
        $password=$_POST['txtpassword'];
        $cpassword=$_POST['txtcpassword'];
        $address=$_POST['txtaddress'];
        $check="SELECT * FROM customer WHERE CustomerEmail = '$email'";
        $checkret = mysqli_query($connection,$check);
        $count=mysqli_num_rows($checkret);
        if ($count>0)
        {
            echo"<script>window.alert('Email Already Exits');</script>";
        }
        elseif($password != $cpassword)
            {
                echo "<script>window.alert('Passwords not matched!');</script>";
            }
        else
        {
            $insert="INSERT INTO customer(FirstName,LastName,Phone,CustomerEmail,Password,Cpassword,Address,DOB,Gender)VALUES('$fname','$sname','$phone','$email','$password','$cpassword','$address','$dob','$gender')";
            $insertret=mysqli_query($connection,$insert);
            if ($insertret)
            {
                echo "<script>window.alert('Customer Account Created');</script>";
				echo"<script>window.location+'CustomerLogin.php';</script>";
            }
            else
            {
                echo "<p>Error in Registratin Page: ".mysqli_error($connection)."</p>";
            }
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


        <form action="CustomerRegister.php" method="post">
            <h3>Enter Your Information!</h3>
                <input type="text" name="txtfname" placeholder="Enter Your First Name Here!" required class="box" required>
                <input type="text" name="txtsurname" placeholder="Enter Your Last Name Here!" required class="box" required>
                <select name="optgender" class="box" required>
                <option disabled selected>Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
                </select>
                <input type="text" name="txtphone" placeholder="+95---------" required class="box">
                <tr><h2>Enter Your Birthday</h2><input type="date" name="txtdob" placeholder="Date Of Birth" required class="box"></tr>
                <input type="email" name="txtemail" placeholder="example@email.com" required class="box">
                <input type="password" name="txtpassword" placeholder="Enter Your Password!" required class="box">
                <input type="password" name="txtcpassword" placeholder="Re-enter Your Password!" required class="box">
                <input type="text" name="txtaddress" placeholder="Enter Address:[NO. / Street / Township]" required class="box">
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
