<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <title>  A Meal For You - - Resturant signup </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="AmealForYou.css">
        <link rel="shortcut icon" href="images/Logo.png" type="images/Logo.png" >  <!-- icon in URL -->
        <link rel="stylesheet" href="SignupResturant.css">
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
                        <h1><strong>Restaurant Sign Up</strong></h1>
                        <p></p>
                    </div>
                </section>

            </div>
            <div class="RightSide">
                <form name="RegisterFormRestaurant" action="CheckSignup.php" method="post">
                    <section class="copy">

                        <h2>Sign Up</h2>
                        <div class="Login">
                            <p>Already have an account? <a href="RestaurantLogin.php"><strong>Log In</strong></a></p>
                        </div>

                    </section>

                    <div id="checkname">
                        <p>* Enter your Name</p>
                    </div>

                    <div id="checkname1">

                        <p>Only letters and white space allowed</p>

                    </div>

                    <div class="input-container-name">
                        <label for="name">Full Name</label>
                        <input id="name" placeholder="Enter restaurant name" type="text" name="name" value="">
                    </div>
                    <div id="checkphone">
                        <p>* Enter your phone number</p>
                    </div>
                    <div id="checkphone1">

                    </div>
                    <div class="input-container-phone">
                        <label for="phone">Phone Number</label>
                        <input id="phone" type="tel" name="phone" placeholder="011XXXXXX" value="">
                    </div>
                    <div id="message">
                        <h3>Password must contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    <div id="checkpassword">
                        <p>* Enter a password</p>
                    </div>
                    <div id="checkpassword1">

                    </div>
                    <div class="input-container-password">
                        <label for="password">Password</label>
                        <input id="password" placeholder="*********" type="password" name="password"  value="">
                        <i class="bi bi-eye-slash" aria-hidden="true"></i>
                    </div>
                    <div id="checkspeciality">
                        <p>* Enter your speciality</p>
                    </div>
                    <div id="checkspeciality1">

                    </div>
                    <div class="input-container-speciality">
                        <label for="speciality">Speciality</label>
                        <input id="speciality" placeholder="Chinese" type="text" name="speciality" value="">
                    </div>
                    <button class="signup" onclick="return CheckRegisterRestaurant()" type="submit">Sign Up</button>
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
        <script>
            var myInput = document.getElementById("password");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            myInput.onfocus = function () {
                document.getElementById("message").style.display = "block";
            }

            myInput.onblur = function () {
                document.getElementById("message").style.display = "none";
            }


            myInput.onkeyup = function () {

                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }

                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }

                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }
        </script>
    </body>

</html>