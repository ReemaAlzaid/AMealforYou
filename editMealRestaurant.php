<?php
session_start();
include 'connection.php';
if ($_SESSION["role"] != 1) { // 1 for Restaurant
    header("location:Home.php");
}
$getID = $_GET['RestaurantId'];
$sql = "SELECT * FROM meal WHERE id='$getID'";
$results = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($results);
$nameRes = $row['name'];
$quantityRes = $row['qty'];
$descriptionRes = $row['description'];
$imageRes = $row['meal_image'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- new added -->
        <link rel="stylesheet" href="AmealForYou.css">
        <link rel="stylesheet" href="LoginRecipient.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,100&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="images/Logo.png" type="images/Logo.png" >  <!-- icon in URL -->
        <script src="AmealForYou.js">
        </script>
        <title>A Meal For You - Edit a Meal</title>
    </head>
    <body>

        <header>
            <a href="Home.php">
                <img id="hompageLogo" src="images/Logo.png" alt="logo" width="300" height="300"></a>
            <!--         breadcrumb         -->
            <div class="breadcrumb">
                <a href="Home.php">Home</a>
                <span> &#62; </span>
                <span><a href="RestaurantHomepage.php">Restaurant Homepage</a></span>
                <span> &#62; </span>
                <span>Edit a Meal</span>
            </div>
        </header>

        <main>
            <div class="addMeal-box">

                <h2>Edit a Meal</h2>
                <form action="<?php echo 'EditAMeal.php?RestaurantId=' . $getID.''; ?>" method="Post" enctype='multipart/form-data' >

                    <div class="user-box">
                        <input type="text" name="name" id="name" value="<?php echo $nameRes; ?>" required >
                        <label>Name</label>
                    </div>

                    <div class="user-box">
                        <input type="number" name="quantity" value="<?php echo $quantityRes; ?>" id="quantity" required>
                        <label>Quantity</label>
                    </div>

                    <div class="user-box">
                        <input type="textarea" name="description" id="description" value="<?php echo $descriptionRes . "\n"; ?>" required>
                        <label>Description</label>
                    </div>


                    <div class="user-box">
                        <input type="file" name="image" required>
                        <input type="submit" name="submit" value="Upload"> 
                        <label >Add image<span></span></label>
                    </div>

                    <!-- <button class="signup" name="Edit" type="submit">Add</button> -->


                    <div style="color: #554939;">
                    </div>

                </form>
            </div>
        </main>


        <footer>
            <img src="images/ksu.png " alt="copy rights " width="120 " height="50 ">
            <p>&#169; A Meal For You | IT329 Project </p>
        </footer>

    </body>

</html>