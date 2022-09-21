<?php
header("Content-Type: application/json; charset-UTF-8");
$mla = $_GET['MealID'];
$curl=curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/Phase4/NEW_NewRecipientList.php?MealID=".$mla,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));
$res=curl_exec($curl);
curl_close($curl);
print $res;

