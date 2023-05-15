<?php 
include('ConnectDB.php');
 session_start();
   
    if($_SESSION["loggedIn"] != true){
        echo 'not logged in';
        header("Location: AdminLogin.php");
        exit;
    }

   
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Books List</title>
     <link href="images/favicon.ico" rel="icon" type="image/x-icon"/>
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style>

legend{ 
        text-align: center;
        border:0;
        padding:0;
        display:block;
        width:100%;
        padding:0;
        margin-bottom:20px;
        font-size:50px;
        line-height:inherit;
        color:#333;
        border:0 solid #000;
        border-bottom:1px solid #000;
    }
    button a{
        color: #000;
    }
    button{
        position: relative;
        background-color: transparent;
        border: 4;
        color: #000;
        right: -45%;
        font-size: 3rem;
    }
    button:hover{
        background-color: #fff;
    }



tbody>tr:hover{background-color:#fff}

        th,td,legend{
            color: #000;
            border-bottom:1px solid #000;
            text-align: center;
            align-items: center;
        }
        fieldset{min-width:0;padding:0;margin:0;border:0}
        fieldset{border:1px solid Black;margin:0 2px;padding:.35em .625em .75em}
        table{border-collapse:collapse;border-spacing:0} /**table border line tway phyout tr**/
        th{
            padding: 1rem;
        }
        td{
            padding: 1rem;
        }
        fieldset a{
            color: #E50914;
        }
        *::SELECTION{
            color: #E50914;
            background-color: #000 ;
        }

        :hover{
           color: #E50914;
        }

        th{
            font-size: 1.6rem;
        }
        td{
            font-size: 1rem;
        }
         body{
            background-repeat: repeat;

         }
        

     </style>


 </head>
 <body  background="Images/bg.jpg">
 <form action="AdminRegister.php" method="post">

            <fieldset>
                <legend>Books Information</legend>
                <table class="table table-hover"  background="Images/bg.jpg">
                                <thead>
                                    <tr>
                                <th algin='left'>Book ID</th>
                                <th algin='left'>Book's Name</th>
                                <th algin='left'>Author's Name</th>
                                <th algin='left'>Category</th>
                                <th algin='left'>Type</th>
                                <th algin='left'>Publisher Name</th>
                                <th algin='left'>Published Date</th>
                                <th align='center'>Book's Description</th>
                                <th algin='left'>Cover Photo</th>
                                <th algin='left'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            $query="SELECT * FROM book ORDER BY BookID";
                            $ret=mysqli_query($connection,$query);
                            $num_results=mysqli_num_rows($ret);
                            if ($num_results==0) {
                                echo "<h6>No Record Found</h6>";
                            }
                            else{
                                for($i=0;$i<$num_results;$i++)
                                {
                                   $row=mysqli_fetch_array($ret);
                                   $BookID=$row["BookID"];
                                    echo "<tr>";
                                    echo "<td>".$row["BookID"]."</td>";
                                    echo "<td>".$row["BookName"]."</td>";
                                    echo "<td>".$row["Author"]."</td>";
                                    echo "<td>".$row["Category"]."</td>";
                                    echo "<td>".$row["Type"]."</td>";                              
                                    echo "<td>".$row["PublisherName"]."</td>";
                                    
                                    echo "<td>".$row["PublishedDate"]."</td>";
                                    echo "<td>".$row["des"]."</td>";
                                     echo "<td><img src=".$row["BPath"]." width='150px' height='200px'></td>";
                                   
                                    echo "<td><a href='BookUpdate.php?BookID=$BookID'>Edit</a>|<a href='BookDelete.php?BookID=$BookID'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                echo "</table>";        }
                            ?>
                        </tbody>
                </table>
            </table>
           
        </form></fieldset>
        <br><br><br>
        <button><a href="AdminHome.php"><td>Home</td></a></button>
             </body>
 </html>