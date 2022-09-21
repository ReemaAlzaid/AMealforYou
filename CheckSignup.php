<?php

session_start();
include "connection.php";
if (isset($_POST['speciality']) == true) { //for Resturant
    $name = $_POST['name'];

    $name1 = mysqli_real_escape_string($connection, $name);

    $password = $_POST['password'];

    $password1 = mysqli_real_escape_string($connection, $password);
    $password1 = password_hash($password1, PASSWORD_DEFAULT);

    $phone = $_POST['phone'];

    $phone1 = mysqli_real_escape_string($connection, $phone);

    $speciality = $_POST['speciality'];

    $speciality1 = mysqli_real_escape_string($connection, $speciality);
    $checkPhone = "";

    $sql = "SELECT phone FROM restaurant ";
    $results = mysqli_query($connection, $sql);
    $checkLoop = true;
    while ($sqlPhone = mysqli_fetch_assoc($results)) {
        if ($sqlPhone['phone'] == $phone1) {
            echo '<script> alert("You already have an account!"); </script>';
            echo '<script> location.replace("RestaurantSignup.php"); </script>';
            $checkLoop = false;
            //exit();
        }
    } echo '<script> document.getElementById("Login1").style.display = "none"; </script>';
    $idd = 0;
    $sql1 = "SELECT * FROM restaurant ORDER BY restaurant.id DESC";
    $results = mysqli_query($connection, $sql1);
    $sqlID = mysqli_fetch_assoc($results);
    $LastID = $sqlID['id'] + 1;
    $sql2 = "INSERT INTO restaurant (id,name,password,phone,speciality)
        VALUES('$LastID', '$name1', '$password1','$phone1','$speciality1')";
    if (mysqli_query($connection, $sql2)) {
        echo '<script> alert("New record created successfully!"); </script>';
        echo '<script> location.replace("NEW_RestaurantHomepage.php"); </script>';
        $_SESSION["id"] = $LastID;
        $_SESSION["role"] = 1;   // 1 for Resturant
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($connection);
    }
} else { //for Recipient
    $name = $_POST['name'];

    $name1 = mysqli_real_escape_string($connection, $name);

    $password = $_POST['password'];

    $password1 = mysqli_real_escape_string($connection, $password);
    $password1 = password_hash($password1, PASSWORD_DEFAULT);

    $phone = $_POST['phone'];

    $phone1 = mysqli_real_escape_string($connection, $phone);

    $sql = "SELECT mobile FROM recipient ";
    $results = mysqli_query($connection, $sql);
    $checkLoop = true;
    while ($sqlPhone = mysqli_fetch_assoc($results)) {
        if ($sqlPhone['mobile'] == $phone1) {
            echo '<script> alert("You already have an account!"); </script>';
            echo '<script> location.replace("RecipientSignup.php"); </script>';
            $checkLoop = false;
            //exit();
        }
    }
    $idd = 0;
    $sql1 = "SELECT * FROM recipient ORDER BY recipient.id DESC";
    $results = mysqli_query($connection, $sql1);
    $sqlID = mysqli_fetch_assoc($results);
    $LastID = $sqlID['id'] + 1;
    $sql2 = "INSERT INTO recipient (id,name,password,mobile)
        VALUES('$LastID', '$name1', '$password1','$phone1')";
    if (mysqli_query($connection, $sql2)) {
        $_SESSION["id"] = $LastID;
        $_SESSION["role"] = 2;   // 2 for Recipient
        echo '<script> alert("New record created successfully!"); </script>';
        echo '<script> location.replace("RecipientHomepage.php"); </script>';
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($connection);
    }
}