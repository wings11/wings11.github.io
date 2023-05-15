<?php 
session_start();
include 'ConnectDB.php';
if (isset($_REQUEST['BookID']))
	{
		$BookID=$_REQUEST['BookID'];
		$query="SELECT * FROM Book WHERE BookID='$BookID'";
		$ret=mysqli_query($connection,$query);
		$row=mysqli_fetch_array($ret);
		$book=$row['BookName'];
        $imgpath=$row['BPath'];
        $category=$row['Category'];
        $authorname=$row['Author'];
        $description=$row['des'];
        $pdate=$row['PublishedDate'];
        $pname=$row['PublisherName'];
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book's Detail</title>
	<link href="images/favicon.ico" rel="icon" type="image/x-icon"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 450px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
header{
    top: 0;
    left:0;
    right:0;
    display:flex;

    justify-content: space-between;
    z-index: 10000;
}


header .logo{
    color: #E50914;
    font-size: 2.2rem;
    font-weight: bolder;
}
h2{
	color: white;
}
p,
h2,
.card .g{
	text-align: left;
}


.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #c0e3f5;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
text{
   text-align: left;
}


.card button:hover {
  opacity: 0.7;
}
body{
			background-color: #000;
		}
.card{
	background-color: white;
	}
    *::SELECTION{
    color: #fff;
    background-color: #E50914;
    }
	</style>

</head>
<header>
<a href="customerhome.php" class="logo"><img src="images/favicon.ico">ReadBooks</a>
</header>

<body>

	<h2 style="text-align:center">Book's Details</h2>
<div class="card">
  <img src="<?php echo $imgpath ?>" alt="Denim Jeans" style="width:100%">
  <h1><?php echo $book ?></h1>
  <p>Author Name: <?php echo $authorname ?></p>
  <p>Category: <?php echo $category ?></p>
  <p>Publisher's Name: <?php echo $pname ?></p>
  <p>Published Date: <?php echo $pdate ?></p>
  <p>Description: <?php echo $description ?></p>
  <button><a href="BookDisplay.php?BookID=<?php echo $BookID ?>">Read</a> |			
  <a href="Customerhome.php">Home</a></button>
</div>
</body>