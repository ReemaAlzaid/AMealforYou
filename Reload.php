<?php
include'connection.php';
session_start();

                $sql44 = "SELECT * FROM `restaurant` ORDER BY `restaurant`.`id` ASC";
                $results44 = mysqli_query($connection, $sql44);
                while ($a = mysqli_fetch_assoc($results44)) {
                    $sql0 = "SELECT * FROM meal WHERE restaurant_id=" . $a['id'];
                    $results0 = mysqli_query($connection, $sql0);
                    $qty0 = mysqli_fetch_assoc($results0);
                    if ($qty0['qty'] <= 0) {
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