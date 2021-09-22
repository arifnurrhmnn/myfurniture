<?php

$key = "4aecd64265f0426f99899087c0b058d3";

$origin = isset($_GET['city_origin']) ? $_GET['city_origin'] : '';
$destination = isset($_GET['city_destination']) ? $_GET['city_destination'] : '';
$weight = isset($_GET['weight']) ? $_GET['weight'] : '';
$courier = isset($_GET['courier']) ? $_GET['courier'] : '';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $key"
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