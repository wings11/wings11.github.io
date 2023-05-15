<?php
    session_start();
    include('ConnectDB.php');
    if($_SESSION["cusloggedIn"] != true){
        echo 'not logged in';
        header("Location: index.php");
        exit;
    }
    $CustomerID=$_SESSION["CustomerID"];
    ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: #fff;
}


.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}


a {
  text-decoration: none;
  font-size: 22px;
 
}

button:hover, a:hover {
  opacity: 0.7;
}

body{
  background-color: #82ffd0;
}
</style>

</head>
<body>

<h2 style="text-align:center">Your Personal Information </h2>
<?php 
  $sql="SELECT * FROM customer WHERE CustomerID=$CustomerID";
  $result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   $firstname=$row["FirstName"];
   $lastname=$row["LastName"];
   $phone=$row["Phone"];
   $email=$row["CustomerEmail"];
   $address=$row["Address"];
   $dob=$row["DOB"];
  }
} else {
  echo "0 results";
}
 ?>
<div class="card">
  <h1><?php echo $firstname,' ',$lastname; ?></h1>
  <p class="title"></p>
  <p>Phone:<?php echo $phone; ?> </p>
  <p>Email:<?php echo $email; ?> </p>
  <p>Address:<?php echo $address; ?> </p>
  <p>Birthday:<?php echo $dob; ?></p>
  <p><a href="changepassword.php"><button>Change Password</button></a></p>
</div>

</body>
</html>
