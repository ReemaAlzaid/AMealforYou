<?php
session_start();
include 'connection.php';
if ($_SESSION["role"] != 1) { //if not resturant
    header("location:Home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="AmealForYou.css">
        <link rel="shortcut icon" href="images/Logo.png" type="images/Logo.png" >  <!-- icon in URL -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,100&display=swap" rel="stylesheet">
        <script src="AmealForYou.js">
        </script>
        <title>A Meal For You - Recipient List</title>
    </head>
    <body>


        <header>
            <a href="Home.html">
                <img id="hompageLogo" src="images/Logo.png" alt="logo" width="300" height="300"></a>
            <!--         breadcrumb         -->
            <div class="breadcrumb">
                <a href="Home.php">Home</a>
                <span> &#62; </span>
                <span><a href="RestaurantHomepage.php">Restaurant Homepage</a></span>
                <span> &#62; </span>
                <span>Recipient List</span>
            </div>
        </header>

        <main>
            <fieldset>
                <legend>Recipient List</legend>

                <ul class="list"> 

                    <?php

                echo "<table class='fl-table'>"
                    ."<thead>"
                        ."<tr>"
                            ."<th colspan='3'> Recipients </th>"
                        ."</tr>"
                    ."</thead>"
                    ."<tbody>";
                        
                        $mla = $_GET['RestaurantId'];
                        $qr = "SELECT recipient_id  FROM reservation WHERE menu_id= $mla";
                        if (!$res = mysqli_query($connection, $qr)) {

                            echo '<script> alert("error") </script>';
                        }

                        while ($rr = mysqli_fetch_assoc($res)) {
                            $r = $rr['recipient_id'];
                            $s = "SELECT * FROM recipient WHERE id = '$r'";
                            $res1 = mysqli_query($connection, $s);

                            while ($rr1 = mysqli_fetch_assoc($res1)) {
                                $r1 = $rr1['name'];

                                echo "<tr> <td>$r1</td> </tr>";
                            }
                        }
                
                    ?>  
            
                </tbody> 
            </table>

                    </main>



                    </body>
                    <footer>
                        <img src="images/ksu.png " alt="copy rights " width="120 " height="50 ">
                        <p>&#169; A Meal For You | IT329 Project </p>
                    </footer>
                    </html>