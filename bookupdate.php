<?php 
	include('ConnectDB.php');
	 session_start();
   
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }
	if(isset($_GET['BookID']))
	{
		$bookid=$_GET['BookID'];
		$query="SELECT * FROM Book WHERE BookID='$bookid'";
		$ret=mysqli_query($connection,$query);
		$arr=mysqli_fetch_array($ret);
	}
	else
	{
		echo "<script>window.alert('Please Choose bookid.');</script>";
		
	}
	
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Book's Information</title>
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
	        <a href="customerhome.php"><img class="img-logo"src="Images/index1.png" alt="My Logo"></a>
	        <a href="customerhome.php" class="h2">READBOOKS</a>
	   </div>
	</header>

	<div class="form-container">        
        <form action="bookupdate2.php" method="post" enctype="multipart/form-data">
            <h3>Update Book Information!</h3>
            	<input type="text" name="txtbookid" value="<?php echo $arr['BookID']; ?>" hidden  required>
                <input type="text" name="txtbookname" value="<?php echo $arr['BookName']; ?>" required class="box" required>
                <input type="text" name="txtauthor" value="<?php echo $arr['Author']; ?>" required class="box" required>
			<select name="optcate" class="box">
                <option disabled selected>Select Category</option>
                <option value="Romance" <?php if($arr['Category'] == 'Romance'): ?> selected="selected"<?php endif; ?>>Romance</option>
                <option value="Horror" <?php if($arr['Category'] == 'Horror'): ?> selected="selected"<?php endif; ?>>Horror</option>
                <option value="Fantasy" <?php if($arr['Category'] == 'Fantasy'): ?> selected="selected"<?php endif; ?>>Fantasy</option>
                <option value="History" <?php if($arr['Category'] == 'History'): ?> selected="selected"<?php endif; ?>>History</option>
                <option value="Fiction" <?php if($arr['Category'] == 'Fiction'): ?> selected="selected"<?php endif; ?>>Fiction</option>
                <option value="Mystery" <?php if($arr['Category'] == 'Mystery'): ?> selected="selected"<?php endif; ?>>Mystery</option>
                <option value="Literature" <?php if($arr['Category'] == 'Literature'): ?> selected="selected"<?php endif; ?>>Literature</option>
            </select>

            <select name="opttype" class="box">
                
                <option value="Novel" <?php if($arr['Type'] == 'Novel'): ?> selected="selected"<?php endif; ?>>Novel</option>
                <option value="Cartoon" <?php if($arr['Type'] == 'Cartoon'): ?> selected="selected"<?php endif; ?>>Cartoon</option>
                <option value="Education" <?php if($arr['Type'] == 'Education'): ?> selected="selected"<?php endif; ?>>Education</option>
                <option value="Other" <?php if($arr['Type'] == 'Other'): ?> selected="selected"<?php endif; ?>>Other</option>
			</select>
				<input type="text" name="txtpname" value="<?php echo $arr['PublisherName']; ?>" required class="box">
              	<input type="text" name="txtdes" value="<?php echo $arr['des']; ?>" required class="box">
                <br>
                <br>
                <br>
                
 							<input type="submit" name="btnupdate" value="Update" class="button">
 							<input type="reset" name="Clear" class="button">
     	  </form>  
        </div>

</body>
</html>