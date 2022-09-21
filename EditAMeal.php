<?php

session_start();
include 'connection.php';
if ($_SESSION["role"] != 1) { // 1 for Restaurant
    header("location:Home.php");
}
if (isset($_POST['name'])) {
    $mName = $_POST['name'];
    $mName = mysqli_real_escape_string($connection, $mName);

    $mQyt = $_POST['quantity'];
    $mQyt = mysqli_real_escape_string($connection, $mQyt);

    $mDesc = $_POST['description'];
    $mDesc = mysqli_real_escape_string($connection, $mDesc);

    $img = $_FILES['image']['tmp_name'];

    $Image = base64_encode(file_get_contents(addslashes($img)));

    $getID = $_GET['RestaurantId'];

    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo "<script> alert('Upload failed with error code " . $_FILES['image']['error'] . "); </script>";
        echo '<script> location.replace("editMealRestaurant.php?RestaurantId=' . $getID . '"); </script>';
    }

    $info = getimagesize($_FILES['image']['tmp_name']);
    if ($info === FALSE) {
        echo "<script> alert('Unable to determine image type of uploaded file'); </script>";
        echo '<script> location.replace("editMealRestaurant.php?RestaurantId=' . $getID . '"); </script>';
    }


    $sql = "UPDATE meal SET name='$mName',qty='$mQyt',description='$mDesc',meal_image='$Image' WHERE id='$getID'";

    if (mysqli_query($connection, $sql) == true) {
        echo '<script> alert("Meal edited successfully") </script>';
        echo '<script> location.replace("MealInformation.php?RestaurantId=' . $getID . '&Display=1"); </script>';
        // echo '<script> location.replace("MealInformation.php"); </script>';
    } else {

        echo '<script> alert("connection error") </script>';
        echo '<script> location.replace("editMealRestaurant.php?RestaurantId=' . $getID . '"); </script>';
    }
} else {
    $id = $_GET['RestaurantId'];
    $sql = "SELECT * FROM meal WHERE id='$id'";
    $results = mysqli_query($connection, $sql);
    $results = mysqli_fetch_assoc($results);
    $mName = $results['name'];
    $mName = mysqli_real_escape_string($connection, $mName);
    
    $mQyt = $results['qty'];
    $mQyt = mysqli_real_escape_string($connection, $mQyt);

    $mDesc = $results['description'];
    $mDesc = mysqli_real_escape_string($connection, $mDesc);

    $img = $results['meal_image'];

    $Image = base64_encode(file_get_contents(addslashes($img)));

    $getID = $_GET['RestaurantId'];

    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo "<script> alert('Upload failed with error code " . $_FILES['image']['error'] . "); </script>";
        echo '<script> location.replace("editMealRestaurant.php?RestaurantId=' . $id . '"); </script>';
    }

    $info = getimagesize($_FILES['image']['tmp_name']);
    if ($info === FALSE) {
        echo "<script> alert('Unable to determine image type of uploaded file'); </script>";
        echo '<script> location.replace("editMealRestaurant.php?RestaurantId=' . $id . '"); </script>';
    }


    $sql = "UPDATE meal SET name='$mName',qty='$mQyt',description='$mDesc',meal_image='$Image' WHERE id='$id'";

    if (mysqli_query($connection, $sql) == true) {
        echo '<script> alert("Meal edited successfully") </script>';
        echo '<script> location.replace("MealInformation.php?RestaurantId=' . $id . '&Display=1"); </script>';
        // echo '<script> location.replace("MealInformation.php"); </script>';
    } else {

        echo '<script> alert("connection error") </script>';
        echo '<script> location.replace("editMealRestaurant.php?RestaurantId=' . $id . '"); </script>';
    }
}
 
