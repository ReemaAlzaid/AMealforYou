
<?php

session_start();
include 'connection.php';
if ($_SESSION["role"] != 2) { // 2 for Recipient
    header("location:Home.php");
}
/*
  $sql1 = "SELECT * FROM reservation WHERE recipient_id=" . $_SESSION['id'];
  $results1 = mysqli_query($connection, $sql1);
  $RecipentsMeals = mysqli_fetch_assoc($results1);

  $sql2 = "SELECT * FROM meal WHERE id=" . $RecipentsMeals['menu_id'];
  $results2 = mysqli_query($connection, $sql2);

  $reserveDB = "INSERT INTO reservation (id,recipient_id,menu_id)
  VALUES('$LastID', '$name1', '$password1')";

 */ 
$mealid = $_GET['RestaurantId'];
$rrid = $_SESSION['id'];
$check1 = "select * from reservation where recipient_id ='$rrid' and menu_id =$mealid";
$c=mysqli_query($connection, $check1);
$cc= mysqli_fetch_assoc($c);
if (isset($cc['id'])) {
    echo '<script> alert("You can only reserve one meal"); </script>';
    echo '<script> location.replace("RecipientHomepage.php"); </script>';
    exit();
}
else{
$getid = "SELECT * FROM `reservation` ORDER BY `reservation`.`id` DESC";
$getid = mysqli_query($connection, $getid);
$getid = mysqli_fetch_assoc($getid);
$id = $getid['id'] + 1;
$rid = $_SESSION['id'];
$MealID = $_GET['RestaurantId']; // only this id

$q1 = "UPDATE meal SET qty = qty-1 WHERE id =" . $MealID;  //all info (retrieves the meal information from the Meal table
if (mysqli_query($connection, $q1)) {
    $reserveDB = "INSERT INTO reservation (id,recipient_id,menu_id)
        VALUES('$id', '$rid', '$MealID')";
    if (mysqli_query($connection, $reserveDB)) {
        echo '<script> alert("Meal has been successfully reserved"); </script>';
        echo '<script> location.replace("RecipientHomepage.php"); </script>';
    } else {
        echo '<script> alert("connecton error"); </script>';
        echo '<script> location.replace("RecipientHomepage.php"); </script>';
    }
}
}
?>


