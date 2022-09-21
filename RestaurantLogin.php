<?php
include 'connection.php';
if (isset($_POST['login'])) {

    $phoneNumber = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM restaurant WHERE phone='$phoneNumber';";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $restaurantPassword = $row['password'];
        if (password_verify($password, $restaurantPassword)) {
            session_start();
            $sql = "SELECT id FROM restaurant WHERE phone='$phoneNumber';";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION["id"] = $row['id'];
            $_SESSION["role"] = 1;
            header("Location:NEW_RestaurantHomepage.php");
        } else {
            echo "<script>
        	 alert('Incorrect password, enter your password again');
        	 </script>";
        }
    } else {
        echo "<script>
		 alert('Incorrect phone number, enter your phone number again');
		 </script>";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>A Meal For You - Resturant Login </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="AmealForYou.css">
        <link rel="shortcut icon" href="images/Logo.png" type="images/Logo.png" >  <!-- icon in URL -->
        <link rel="stylesheet" href="LoginRestaurant.css">
        <script src="AmealForYou.js">
        </script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,100&display=swap" rel="stylesheet">
    </head>

    <body>
        <header>
            <a href="Home.php">
                <img id="hompageLogo" src="images/Logo.png" alt="logo" width="300" height="300"></a>

            <!--         breadcrumb         -->
            <div class="breadcrumb">
                <a href="Home.php">Home</a>
            </div>
        </header>

        <div class="signup_split">
            <div class="LeftSide">
                <section class="copy">
                    <div class="slide">
                        <h1><strong>Restaurant Log In</strong></h1>
                        <p></p>
                    </div>
                </section>

            </div>
            <div class="RightSide">

                <form class="RegisterForm" action="RestaurantLogin.php" method ="POST">
                    <section class="copy">
                        <h2>Log In</h2>
                        <div class="Login">
                            <p>Don't have an account? <a href="RestaurantSignup.php"><strong>Sign Up</strong></a></p>
                        </div>
                    </section>
                    <div id="checkphone">
                        <p>* Enter your phone number</p>
                    </div>
                    <div class="input-container-phone">
                        <label for="phone">Phone Number</label>
                        <input id="phone" type="tel" name="phone" placeholder="011XXXXXXX" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="">
                    </div>
                    <div id="checkpassword">
                        <p>* Enter your password</p>
                    </div>
                    <div class="input-container-password">
                        <label for="password">Password</label>
                        <input id="password" name="password" placeholder="*********" type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="">
                        <i class="bi bi-eye-slash" aria-hidden="true"></i>
                    </div>
                    <button class="signup" name="login" type="submit">Log In</button>
                    <section class="legal">
                        <p><span class="small">
                                By continuing, you agree to accept our
                                <br>
                                <p>Privacy Policy & Terms of Service</p>
                            </span></p>
                    </section>
                </form>
            </div>
        </div>
        <footer>
            <img src="images/ksu.png " alt="copy rights " width="120 " height="50 ">
            <p>&#169; A Meal For You | IT329 Project </p>
        </footer>
    </body>


</html>