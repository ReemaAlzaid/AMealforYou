<?php
session_start();

/*
 *
 *
 *
 *
 * SELECT
  m.*
  FROM
  meal m
  INNER JOIN reservation r
  ON r.menu_id = m.id

  WHERE
  r.menu_id = m.id;


 */
include 'connection.php';

if ($_SESSION["role"] != 2) { // 2 for Recipient
    header("location:Home.php");
}

$recipientId = $_SESSION['id'];
$sql = "SELECT * FROM `recipient` WHERE id='$recipientId'";
$results = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($results);
$recipientName = $row['name'];
$recipientMobile = $row['mobile'];
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="AmealForYou.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,100&display=swap"
              rel="stylesheet">
        <link rel="shortcut icon" href="images/Logo.png" type="images/Logo.png">  <!-- icon in URL -->
        <script src="AmealForYou.js">
        </script>
        <title> A Meal For You - Recipient Homepage</title>
    </head>

    <?php
    if (!empty($_SESSION["role"])) {
        ?>
        <a href="logout.php">
            <button class="signout">Sign out</button>
        </a>

        <?php
    }
    ?>

    <body>
        <header>
            <a href="Home.php">
                <img id="hompageLogo" src="images/Logo.png" alt="logo" width="300" height="300"></a>

            <!--         breadcrumb         -->
            <div class="breadcrumb">
                <a href="Home.php">Home</a>
                <span> &#62; </span>
                <span>Recipient Homepage</span>
            </div>
        </header>

        <main>

            <div class="container1">
                <img src="images/Rec.jpg" alt="Recipient" height="500">
            </div>

            <br>
            <br>
            <!-- Welcome Recipient Name!-->
            <h1 class="J1">Welcome <?php echo $recipientName; ?>!</h1>
            <h3 class="J2">
                Mobile: <?php echo $recipientMobile; ?>
            </h3>
            <br>
            <h2 class="J3"> Available Meals </h2>

            <br>
            <div id='reload'>
                <?php
                $check=false;
                $sql44 = "SELECT * FROM `restaurant` ORDER BY `restaurant`.`id` ASC";
                $results44 = mysqli_query($connection, $sql44);
                while ($a = mysqli_fetch_assoc($results44)) {
                    $sql0 = "SELECT * FROM meal WHERE restaurant_id=" . $a['id'];
                    $results0 = mysqli_query($connection, $sql0);
                    $qty0 = mysqli_fetch_assoc($results0);
                    if ($qty0['qty'] <= 0 ) {
                        continue;
                    }
                        echo '<table class="fl-table">'
                        . '<thead>'
                        . '<tr>'
                        . " <th colspan='3'>" . $a['name'] . "</th>"
                        . ' </tr>'
                        . ' </thead>'
                        . '<tbody>
                    <tr style="background-color:#e1a06b; color:white;">
                        <td> Meals</td>
                        <td> Description</td>
                        <td> Action</td>
                    </tr>';
                        $sql11 = "SELECT * FROM reservation WHERE recipient_id=" . $_SESSION['id'];
                        $results11 = mysqli_query($connection, $sql11);

                        while ($RecipentsMeals = mysqli_fetch_assoc($results11)) {
                            $sql22 = "SELECT * FROM meal WHERE id=" . $RecipentsMeals['menu_id'];
                            $results22 = mysqli_query($connection, $sql22);
                            while ($Meals = mysqli_fetch_assoc($results22)) {
                                if ($a['id'] == $Meals['restaurant_id']) {
                                    $idres = $Meals['restaurant_id'];
                                    echo
                                    '<tr>'
                                    . '<td><a href="MealInformation.php?RestaurantId=' . $Meals['id'] . '&Display=0">' . $Meals['name'] . ' </a></td>'
                                    . '<td>' . $Meals['description'] . ' </td > '
                                    . '<td><button onclick="RemoveMeal(' . $Meals['id'] . ')" value="Remove" class="Remove" style="color:#e63900">Remove</button></td>'
                                    . '</tr > ';
                                }
                            }
                        }
                        $sql = "SELECT * FROM `meal`where qty>0 and restaurant_id=" . $a['id'];
                        $results = mysqli_query($connection, $sql);
                        while ($rowMeal = mysqli_fetch_assoc($results)) {
                            echo '<tr > '
                            . '<td ><a href = "MealInformation.php?RestaurantId=' . $rowMeal['id'] . '&Display=0">' . $rowMeal['name'] . ' </a ></td > '
                            . '<td>' . $rowMeal['description'] . ' </td > '
                            . '<td> <button onclick="ReserveMeal(' . $rowMeal['id'] . ')" value="Reserve" class="Reserve" style="color:#00b33c">Reserve</button></td > '
                            . '</tr > ';
                            
                        }
                        echo'</tbody>'
                        . '</table>';
                    }
                
                ?>

            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script>
            function ReserveMeal(id) {
                $(document).ready(function () {
                    $.ajax({
                        type: "GET",
                        url: "Reserve.php?RestaurantId=" + id,
                        success: function () {
                            alert("Meal Successfully Reserved");
                            $("#reload").load('Reload.php');
                        }
                    });

                });

            }
            function RemoveMeal(id) {
                $(document).ready(function () {
                    $.ajax({
                        type: "GET",
                        url: "Remove.php?RestaurantId=" + id,
                        success: function () {
                            alert("Meal Successfully Removed");
                            $("#reload").load('Reload.php');
                        }
                    });
                });
            }

            </script>

        </main>


        <footer>
            <img src="images/ksu.png " alt="copy rights " width="120 " height="50 ">
            <p>&#169; A Meal For You | IT329 Project </p>
        </footer>

    </body>

</html>