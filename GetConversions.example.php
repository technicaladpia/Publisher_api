<?php
    
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
        
    $curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.adpia.local/index.php/v2/affiliate/get_conversions?page=1&sdate=20211011&edate=20211012&limit=50",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Basic a2hpY29ub25saW5lOjEyMzQ1Ng==",
		    "cache-control: no-cache",
		    "content-type: application/json"
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
