<?php
    session_start();
    include('ConnectDB.php');
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }

	include('ConnectDB.php');
	include('AutoIDFunction.php');


	if(isset($_POST['btnsubmit']))
	{
		$bid=$_POST['txtbookid'];
		$bookname=$_POST['txtbookname'];
		$pdff=$_FILES['txtpdf']['name'];
		$des=$_POST['txtdes'];
		$image=$_FILES['txtpath']['name'];
		$folder="Navimg/";
			if ($image)
			{
				$filename=$folder.$image;
				$copied=copy($_FILES['txtpath']['tmp_name'], $filename);
				if(!$copied)
				{
					exit("Problem occured.");
				}
			}

		$pdf=$_FILES['txtpdf']['name'];
		$folderp="navbooks/";
		if ($pdf) {
			$filenamep=$folderp.$pdf;
			$copiedp=copy($_FILES['txtpdf']['tmp_name'], $filenamep);
			if(!$copiedp)
			{
				exit("Problem Occured.");
			}
		}

			
		


		$checkpoint="SELECT * FROM navbar WHERE NavBookName='$bookname'";
		$ret=mysqli_query($connection,$checkpoint);
		$count=mysqli_num_rows($ret);
		
		if($count>0)
		{
			echo "<script>window.alert('BookName Already Exists');</script>";
			echo "<script>window.location='navaddbook.php';</script>";
		}
		else
		{
			$insert="INSERT INTO navbar(NavBookID,NavbookName,NavBDes,NavBPath,NavBPDF) VALUES( '$bid','$bookname', '$des', '$filename','$filenamep')";
			$insertret=mysqli_query($connection,$insert);

			
			
			if($insertret)
			{
				echo "<script>window.alert('Successfully Added Book!');</script>";
				echo "<script>window.location='navaddbook.php';</script>";
			}
			else
			{
				echo "<p>Error in Book Page:".mysqli_error($connection)."</p>";
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
   <title>Add Slider Books</title>
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
	        <a href="adminhome.php"><img class="img-logo"src="Images/index1.png" alt="My Logo"></a>
	        <a href="adminhome.php" class="h2">READBOOKS</a>
	   </div>
	</header>

	<div class="form-container">        
        <form action="navaddbook.php" method="post" enctype="multipart/form-data">
            <h3>Enter Book Information!</h3>
            	<input type="text" name="txtbookid" value="<?php echo AutoID('navbar','NavBookID','NB-',5); ?>" hidden  required>
                <input type="text" name="txtbookname" placeholder="Enter Book Name Here!" required class="box" required>
				<input type="text" name="txtdes" placeholder="Enter Book's Description!" required class="box">
                <tr><h2>Insert Image</h2><input type="file" name="txtpath" required placeholder="Images" class="box"></tr><br>	
                <tr><h2>Insert PDF Document</h2>
                <input id='pdf' type="file" name="txtpdf" placeholder="PDF" required class="box"></tr>
                
                <br>
                <br>
                <br>
                
 							<input type="submit" name="btnsubmit" value="Submit" class="button">
 							<input type="reset" name="Clear" class="button">
     	  </form>  
        </div>

</body>
</html>