<?php
 //new one after modified it
session_start();
include 'connection.php';
if ($_SESSION["role"] != 1) { // 1 for Restaurant
    header("location:Home.php");
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM `restaurant` WHERE id='$id'";
$results = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($results);
$nameRes = $row['name'];
$phoneRes = $row['phone'];
$specialityRes = $row['speciality'];
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
        <title> A Meal For You - Restaurant Homepage </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <script>
            function getNames(id) {
                $('#Reci').html("");
                $('#here').html("");
                $(document).ready(function () {
                    $.ajax({
                        url: "NEW_NewRecipientList.php",
                        data: "MealID=" + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            //var json = JSON.parse(data);
                            //alert(json);
                            $(".fl-table").show();
                            for (var i = 0; i < data.length; i++) {
                                var tr_str = data[i]+"<br>";
                                $("#here").append(tr_str);
                            }
                            $("#Reci").append("Recipients");

                        }
                    });
                });

            }
        </script>
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
                <span>Restaurant Homepage</span>
            </div>
        </header>

        <main>

            <div class="container1">
                <img src="images/22.jpg" alt="Restaurant" height="450">
            </div>

            <br>
            <br>
            <!-- Welcome Restaurant Name!-->
            <?php
            echo '<h1 class="J1">Welcome ' . $nameRes . '!</h1>';
            ?>
            <h3 class="J2">
                <ul>
                    <?php
                    echo '<li>Phone: ' . $phoneRes . '</li>';
                    echo '<li>Specialty: ' . $specialityRes . '</li>';
                    ?>
                </ul>

            </h3>
            <br>
            <br>
            <h2 class="J3"> Available Meals </h2>
            <br>
            <table class="fl-table">
                <thead>
                    <tr>
                        <th colspan="1"> Meals </th>
                        <th></th>
                        <th><a href="<?php echo "AddNewMeal.php?RestaurantId=" . $id; ?>">Add Meal +</th></a>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM meal WHERE restaurant_id='$id'";
                    $results = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($results)) {
                        $name = $row["name"];
                        print '<tr>'
                                . '<td><a href="MealInformation.php?RestaurantId=' . $row['id'] . '&Display=1">' . $row['name'] . '</a></td>'
                                //. '<td><div><a onclick="getNames(' . $row['id'] . ');" href="recipientList.php?RestaurantId=' . $row['id'] . '">Display Recipients</a></td></div>'
                                . '<td><button onclick="getNames( ' . $row['id'] . ' )">Display Recipients</button></td>'
                                . '<td><a href="editMealRestaurant.php?RestaurantId=' . $row['id'] . '">Edit meal</a></td>'
                                . '</tr>';
                    }
                    ?>

                </tbody>
            </table>
            <table class='fl-table' style='display:none'>
                <thead>
                    <tr>
                        <th colspan='2' id='Reci'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><div id="here"></div></td></tr>
                </tbody> 
            </table>


        </main>

        <footer>
            <img src="images/ksu.png " alt="copy rights " width="120 " height="50 ">
            <p>&#169; A Meal For You | IT329 Project </p>
        </footer>

    </body>

</html>