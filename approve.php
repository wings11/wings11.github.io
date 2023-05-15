
<?php
 session_start();
   
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }


include('ConnectDB.php');
if(isset($_GET['CustomerID']))
{
  $CustomerID=$_GET['CustomerID'];

  $sql = "UPDATE customer SET subscription='2' WHERE CustomerID='$CustomerID'";

  if (mysqli_query($connection, $sql)) {
    header("Location: admincheck.php");
    exit;
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  mysqli_close($connection);
}
else
{
  echo "$CustomerID";
}

?>
