<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.adpia.vn/v2/merchant/get_merchant_program_description?mid=shopee',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'cache-control: no-cache'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
