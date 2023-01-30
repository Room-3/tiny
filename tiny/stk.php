<?php

if(isset($_POST['pay'])){

$amount = $_POST['amount']; 
$phonenumber = $_POST['phone'];
$Account_no = ' ROOM 3'; 
$url = 'https://tinypesa.com/api/v1/express/initialize';
$data = array(
    'amount' => $amount,
    'msisdn' => $phonenumber,
    'account_no'=>$Account_no,
);
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'ApiKey: XsfmcyFxfZG'
 );
$info = http_build_query($data);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);
$msg_resp = json_decode($resp);


if ($msg_resp ->success == 'true') {
  echo '<script>alert("Wait for stk pop up.");
  window.location.href="index.php";
  </script';
} else {
  echo '<script>alert("It failed.");
  window.location.href="index.php";
  </script';
 
}
}