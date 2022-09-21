<?php
 //old one 
include 'connection.php';
$mla = $_GET['MealID'];
$q= "SELECT name From recipient WHERE id IN(SELECT recipient_id FROM reservation WHERE menu_id=" . $mla . ")";

$result = mysqli_query($connection, $q);
$num = mysqli_num_rows($result);
                   
$RecipientName = array();

if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
          $RecipientName[] = $row["name"]."<br>";
    }
} else {
      $RecipientName[] = "There are no recipients yet!"."<br>";
}
echo json_encode($RecipientName);
?>