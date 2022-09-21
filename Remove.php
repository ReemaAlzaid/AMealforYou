
<?php
session_start();
include 'connection.php';
if ($_SESSION["role"] != 2) { // 2 for Recipient
    header("location:Home.php");
}
    $mealid = $_GET['RestaurantId'];
    $rrid = $_SESSION['id'];
    $delte = "delete from reservation where recipient_id ='$rrid' and menu_id =$mealid";
    if ($result = mysqli_query($connection, $delte)) {
        $plusOne = "UPDATE meal SET qty = qty+1 WHERE id =" . $mealid; //all info (retrieves the meal information from the Meal table
        if(mysqli_query($connection, $plusOne)){
        echo '<script> alert("Meal has been successfully removed"); </script>';
        echo '<script> location.replace("RecipientHomepage.php"); </script>';
        }
        else{
        echo '<script> alert("connecton error"); </script>';
        echo '<script> location.replace("RecipientHomepage.php"); </script>';
        }
    } else {
        echo '<script> alert("connecton error"); </script>';
        echo '<script> location.replace("RecipientHomepage.php"); </script>';
    }

?>
 