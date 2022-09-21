<?php
session_start();
include 'connection.php';
$idSession=$_SESSION['id'];
if ($_SESSION["role"] != 1 && $_SESSION["role"] != 2 ) { // if rec res and res
    header("location:Home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- new added -->
        <link rel="stylesheet" href="AmealForYou.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,500;1,100&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="images/Logo.png" type="images/Logo.png" > <!-- icon in URL -->
        <script src="AmealForYou.js">
        </script>
        <title>A Meal For You - Meal Information</title>
    </head>

    <body>
        <header>
            <a href="Home.php">
                <img id="hompageLogo" src="images/Logo.png" alt="logo" width="300" height="300"></a>
            <!--         breadcrumb         -->
            <div class="breadcrumb">
                <a href="Home.html">Home</a>
                <span> &#62; </span>
                <span>Meal Information</span>
            </div>
        </header>

        <br>

        <main>
            <?php
            //Checks the id that is sent in the query string, 
            $oo = $_GET['RestaurantId']; // only this id
            $q = "SELECT * FROM meal WHERE id =" . $oo; //all info (retrieves the meal information from the Meal table
            $query = mysqli_query($connection, $q);
            $r = mysqli_fetch_assoc($query); //read row by row
            $restaurantI = $r['restaurant_id']; 
            $q2 = "SELECT name FROM restaurant WHERE id ='$restaurantI' ";
            $query2 = mysqli_query($connection, $q2);
            $r2 = mysqli_fetch_assoc($query2); //read row by row
            //retrieves the meal information of this restaurant & list of Recipients names.
            ?>

            <br>
            <br>

            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($r['meal_image']); ?>" alt="mealImage" width="300" height="300" style="padding: 40px;
            display: block;
            margin-left: auto;
            margin-right: auto;"></img> 
            
            <h1 class="J1">
                <?php echo $r['name'];?>
            </h1>
            
            <?php
            if($_SESSION["role"] == 1){
            echo '<h3 class="S3" id="Res1">';
                 echo "Restaurant: " . $r2['name'] . "!"; 
            '</h3>';
            
            

              echo '<h3 class="S2">'
               ."<a href='editMealRestaurant.php?RestaurantId=$oo&Display=1';>Edit</a> "
               ."</h3>";    
            }
            ?>
            <?php
             
             if ($_SESSION["role"] == 2) {// if recipient
                $rid = $_SESSION['id'];
                $qr = "SELECT * from reservation WHERE recipient_id='$rid' AND 	menu_id=" . $oo;

                if (!$res = mysqli_query($connection, $qr)) {
                    echo '<script> alert("connection error") </script>';
                }

                $num = mysqli_num_rows($res);
                if ($num > 0) {
                    ?>
                <h3 class="S2">
                    <form action="Remove.php" class="hidform">
                        <input type="hidden" name="RestaurantId" value=<?php echo $oo; ?>>
                        <button type="submit">Remove</button>
                    </form>
                </h3>
                    <?php
                } else {
                    ?>

                <h3 class="S2">
                    <form action="Reserve.php" class="hidform">
                        <input type="hidden" name="RestaurantId" value=<?php echo $oo; ?>>
                        <button type="submit">Reserve</button>
                    </form>
                    </h3>
                    <?php
                }
            }
            ?>  

            <br>

            <!----------------------------------------- Description ----------------------------------------->
            <h4 class="S2">
                <?php echo "Description: " . $r['description'];  ?>
            </h4>
            <!----------------------------------------- Description ----------------------------------------->
            <br>
            <!----------------------------------------- Quantity ----------------------------------------->
            <h4 class="S2">
                <?php echo "Quantity: " . $r['qty']; ?>
            </h4>
            <!----------------------------------------- Quantity ----------------------------------------->

            <br>
            <br>

            <!----------------------------------------- Recipients Table ----------------------------------------->

            
                </tbody> 
            </table>
            <!----------------------------------------- Table ----------------------------------------->

        </main>

        <footer>
            <img src="images/ksu.png " alt="copy rights " width="120 " height="50 ">
            <p>&#169; A Meal For You | IT329 Project </p>
        </footer>

    </body>
</html>