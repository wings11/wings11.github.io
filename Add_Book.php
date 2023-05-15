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
		$author=$_POST['txtauthor'];
		$pdff=$_FILES['txtpdf']['name'];
		// $pdf_type=$_FILES['pdf']['type'];
		// $pdf_size=$_FILES['pdf']['size'];
		$des=$_POST['txtdes'];
		$category=$_POST['optcate'];
		$type=$_POST['opttype'];
		$pname=$_POST['txtpname'];
		$pdate=date ("Y-m-d",strtotime($_POST['txtpdate']));
		$image=$_FILES['txtpath']['name'];
		$folder="Images/";
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
		$folderp="books/";
		if ($pdf) {
			$filenamep=$folderp.$pdf;
			$copiedp=copy($_FILES['txtpdf']['tmp_name'], $filenamep);
			if(!$copiedp)
			{
				exit("Problem Occured.");
			}
		}

			
		


		$checkpoint="SELECT * FROM Book WHERE BookName='$bookname'";
		$ret=mysqli_query($connection,$checkpoint);
		$count=mysqli_num_rows($ret);
		
		if($count>0)
		{
			echo "<script>window.alert('BookName Already Exists');</script>";
			echo "<script>window.location='Add_Book.php';</script>";
		}
		else
		{
			$insert="INSERT INTO Book(BookID,BookName,Author,Category,Type,BPath,PDF,PublisherName,PublishedDate, des) VALUES( '$bid','$bookname', '$author', '$category', '$type', '$filename','$filenamep', '$pname', '$pdate','$des')";
			$insertret=mysqli_query($connection,$insert);

			$insertpdf="INSERT INTO pdf(BookID,PDFFILE) values('$bid','$pdff')";
			$insertpdfret=mysqli_query($connection,$insertpdf);
			
			if($insertret)
			{
				echo "<script>window.alert('Successfully Add Book!');</script>";
				echo "<script>window.location='Add_Book.php';</script>";
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
	        <a href="adminhome.php"><img class="img-logo"src="Images/index1.png" alt="My Logo"></a>
	        <a href="adminhome.php" class="h2">READBOOKS</a>
	   </div>
	</header>

	<div class="form-container">        
        <form action="Add_Book.php" method="post" enctype="multipart/form-data">
            <h3>Enter Book Information!</h3>
            	<input type="text" name="txtbookid" value="<?php echo AutoID('Book','BookID','B-',5); ?>" hidden  required>
                <input type="text" name="txtbookname" placeholder="Enter Book Name Here!" required class="box" required>
                <input type="text" name="txtauthor" placeholder="Enter Book Author's Name Here!" required class="box" required>
			<select name="optcate" class="box">
                <option disabled selected>Select Category</option>
                <option value="Romance">Romance</option>
                <option value="Horror">Horror</option>
                <option value="Fantasy">Fantasy</option>
                <option value="History">History</option>
                <option value="Fiction">Fiction</option>
                <option value="Mystery">Mystery</option>
                <option value="Literature">Literature</option>
            </select>

            <select name="opttype" class="box">
                <option disabled selected>Select Book Type</option>
                <option value="Novel">Novel</option>
                <option value="Cartoon">Cartoon</option>
                <option value="Education">Education</option>
                <option value="Other">Other</option>
			</select>
				<input type="text" name="txtpname" placeholder="Enter Publisher Name!" required class="box">
                <tr><h2>Enter Published Date</h2><input type="date" name="txtpdate" placeholder="Published Date" required class="box">
                <input type="text" name="txtdes" placeholder="Enter Book Description Here!" required class="box" required>
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