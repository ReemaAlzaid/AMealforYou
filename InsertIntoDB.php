<?php

session_start();
include 'connection.php';

if ($_SESSION["role"] != 1) { // 1 for Restaurant
    header("location:Home.php");
}
    

    if (isset($_POST['name'])) {
        $mName = $_POST['name'];
        $mName = mysqli_real_escape_string($connection, $mName);

        $mQty = $_POST['quantity'];
        $mQty = mysqli_real_escape_string($connection, $mQty);

        $mDesc = $_REQUEST['description'];
        $mDesc = mysqli_real_escape_string($connection, $mDesc);

        $img = $_FILES['image']['tmp_name'];
        $Image = base64_encode(file_get_contents(addslashes($img)));

        $getID = $_GET['RestaurantId'];

        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo "<script> alert('Upload failed with error code " . $_FILES['image']['error'] . "); </script>";
            echo '<script> location.replace("AddNewMeal.php?RestaurantId=' . $getID . '"); </script>';
        }

        $info = getimagesize($_FILES['image']['tmp_name']);
        if ($info === FALSE) {
            echo "<script> alert('Unable to determine image type of uploaded file'); </script>";
            echo '<script> location.replace("AddNewMeal.php?RestaurantId=' . $getID . '"); </script>';
        }

        /*
          $status = $statusMsg = '';
          $status = 'error';

          if (!empty($_FILES["image"]["name"])) {

          // Get file info
          $fileName = basename($_FILES["image"]["name"]);
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

          // Allow certain file formats
          $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
          if (in_array($fileType, $allowTypes)) {
          $image = $_FILES['image']['tmp_name'];
          $imgContent = addslashes(file_get_contents($image));
         */
        $idForMeal="SELECT * FROM `meal` ORDER BY `id` DESC";
        $idForMeal=mysqli_query($connection, $idForMeal);
        $idForMeal= mysqli_fetch_assoc($idForMeal);
        $IDMeal=$idForMeal['id']+1;
        $q = "INSERT INTO meal(id,restaurant_id,name,qty,description,meal_image) VALUES ('$IDMeal','$getID','$mName','$mQty','$mDesc','$Image')";

        if (mysqli_query($connection, $q)) {
            echo '<script> alert("Meal added successfully") </script>';
            header('location:MealInformation.php?RestaurantId=' . $IDMeal);
        } else {

            echo '<script> alert("connection error") </script>' . mysqli_error($connection);
            echo '<script> location.replace("AddNewMeal.php?RestaurantId=' . $getID . '"); </script>';
        }
    }
    /*else {

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
            echo '<script> location.replace("AddNewMeal.php?RestaurantId=' . $id . '"); </script>';
        }

        $info = getimagesize($_FILES['image']['tmp_name']);
        if ($info === FALSE) {
            echo "<script> alert('Unable to determine image type of uploaded file'); </script>";
            echo '<script> location.replace("AddNewMeal.php?RestaurantId=' . $id . '"); </script>';
        }

        $q = "INSERT INTO meal(restaurant_id, name, qty, description, meal_image) VALUES ('$IDMeal','$mName','$mQty','$mDesc','$Image')";

        if (mysqli_query($connection, $q)) {
            $sql = "SELECT id from meal WHERE restaurant_id ='$RestaurantId'AND name='$mName' AND qty='$mQty' AND description='$mDesc'";
            $result = mysqli_query($connection, $sql);
            $RR = mysqli_fetch_assoc($result);

            echo '<script> alert("Meal added successfully") </script>';
            header('location:MealInformation.php?RestaurantId=' . $IDMeal);
        } else {
            echo '<script> alert("connection error") </script>' . mysqli_error($connection);
            echo '<script> location.replace("AddNewMeal.php?RestaurantId=' . $getID . '"); </script>';
        }
    }
     * */

?>

