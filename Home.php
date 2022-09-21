<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="AmealForYou.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,100&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="images/Logo.png" type="images/Logo.png" >  <!-- icon in URL -->
        <script src="AmealForYou.js">
        </script>
        <title> A Meal For You </title>
    </head>

    <body>
        <header>
            <a href="Home.php">
                <img id="hompageLogo" src="images/Logo.png" alt="logo" width="300" height="300"></a>

            <!--         breadcrumb         -->
            <div class="breadcrumb">
            </div>
        </header>

        <main>
            <div class="intro-container">
                <img src="images/donate.jpg" alt="Food">
                <div class="intro-child">
                    <p> A Meal For You is a donation platform where any kind of restaurant can list the remaining meals at the end of the day so other people can reserve them </p>
                </div>
            </div>

            <div class="flex-container">
                <div class="flex-child">
                    <h1>
                        <a href="RestaurantLogin.php"> Resturant Log-in </a>
                    </h1>
                    <a href="RestaurantLogin.php">
                        <img src="images/Chef.png " alt="Resturant" width="200 " height="200 "></a>
                    <h2>New Restaurant?</h2>
                    <h3>
                        <a href="RestaurantSignup.php"> Sign-up </a>
                    </h3>
                </div>
                <div class="flex-child">
                    <h1>
                        <a href="RecipientLogin.php"> Recipient Log-in </a>
                    </h1>
                    <a href="RecipientLogin.php ">
                        <img src="images/Tray.png " alt="Recipient" width="200 " height="200 "></a>
                    <h2>New Recipient?</h2>
                    <h3>
                        <a href="RecipientSignup.php"> Sign-up</a>
                    </h3>
                </div>

            </div>
        </main>


        <footer>
            <img src="images/ksu.png " alt="copy rights " width="120 " height="50 ">
            <p>&#169; A Meal For You | IT329 Project </p>
        </footer>

    </body>

</html>