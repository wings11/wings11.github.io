<?php
    session_start();
    include('ConnectDB.php');
    if($_SESSION["cusloggedIn"] != true){
        echo 'not logged in';
        header("Location: index.php");
        exit;
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum scale=1">
    <title>READBOOKS</title>
    <link href="images/favicon.ico" rel="icon" type="image/x-icon"/>

    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">


</head>
<body>

    <header>

        <a href="customerhome.php" class="logo"><img src="images/favicon.ico">ReadBooks</a>
       <!-- <img class="img-logo"src="ManhuaMyanmar.png" alt="My Logo">-->
        <nav class="navbar">
             <a href="customerhome.php">Home</a>
             <a class="btn active" href="novels.php">Novels</a>
             <a href="cartoons.php">Cartoons</a>
             <a href="education.php">Education</a>
             <a href="others.php">Others</a>
        </nav>
        <div class="icons">
            <a href="tel:+9597777777"><i class="fa fa-phone" id="phone"></i></a>
            <a href="mailto:support@readbooks.com"><i class="fa fa-envelope" id="email"></i></a>
        </div>
        <div class="content">
            <a href="Logout.php">Logout</a>
            <span>|</span>
            <a href="customeracc.php">Your Account</a>
        </div>
    </header>


   <section class="mncontainer">
    <form action="BookDisplay.php" method="get">
    <div class="container1">
        <h2>Novels</h2>
        <?php
            if (isset($_POST['btnsearch']))
                {
                    $data=$_POST['txtsearch'];

                    $book="SELECT * FROM Book
                    WHERE BookName = '$data'
                    OR Category = '$data'
                    ORDER BY BookName";
                    $ret=mysqli_query($connection,$book);
                    $num_result=mysqli_num_rows($ret);
                    if ($num_result==0)
                    {
                        echo "<p>No Match Found</p>";
                    }
                    else
                    {
                        for ($a=0; $a < $num_result; $a+=4)
                        {
                            $num_result1=mysqli_num_rows($ret);
                            echo "<tr>";
                            for ($b=0; $b < $num_result1; $b++)
                            {
                                $row=mysqli_fetch_array($ret);
                            ?>
            <td>
                     <div class="box"><img src="<?php echo $row1['BPath'];?>">
                <div class="content">
                    <h4><?php echo $row1['BookName']; ?></h4>
                    <h3><?php echo $row1['Author']; ?></h3>
                </div>
            </div></td>
            <?php
            }
            echo "</tr>";
            }
             }

         }
         else
                {
                    $searchdata1="SELECT * FROM Book WHERE Type='Novel' ORDER BY BookName";
                    $ret1=mysqli_query($connection,$searchdata1);
                    $num_result1=mysqli_num_rows($ret1); // 8

                    // start=0; end<8; in 4
                    for ($c=0; $c < $num_result1; $c+=4)
                    {
                        $book1="SELECT * FROM Book WHERE Type='Novel' ORDER BY BookName LIMIT $c,4";
                        // 0,4  4,4   8,4
                        $retp1=mysqli_query($connection,$book1);
                        $num_result2=mysqli_num_rows($retp1);// 4
                        echo "<tr>";
                            for ($d=0; $d < $num_result2; $d++)
                            {
                                $row1=mysqli_fetch_array($retp1);
                                $bookid=$row1['BookID'];
                            ?>
                                <td>
                                    <input type="hidden" name="txtBookID" value="<?php echo $bookid; ?>">
                                    <a href="bookdisplay.php?BookID=<?php echo $bookid ?>">
                                    <div class="box"><img src="<?php echo $row1['BPath']; ?>">
                <div class="content">
                    <h4><?php echo $row1['BookName']; ?></h4>
                    <h3><?php echo $row1['Author']; ?></h3>
                </div>
            </div>
                                </a></td>

                            <?php
                            }
                        echo "</tr>";
                    }
                }


             ?>

    </div>
</form>
  </section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
    <script type="text/javascript" src="js/mmenu.min.js"></script>
</body>
</html>
