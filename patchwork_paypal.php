<?php


$paypalEndPoint = 'nvp?';
$paypalData =  array(
    'USER' => 'rashid.akram-facilitator_api1.putitout.co.uk',
    'PWD' => 'B7B6BGFXJTA92GME',
    'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AUyz3714civtWFCQmkYGHRSzzlIY',
    'METHOD' => 'SetExpressCheckout',
    'VERSION' => '98',
    'PAYMENTREQUEST_0_AMT' => '10',
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
    'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
    'cancelUrl' => 'http://kidlr.lotiv.com/patchwork_paypal.php',
    'returnUrl' => 'http://kidlr.lotiv.com/patchwork_paypal.php',
  
);
$getPaypalQuery = http_build_query($paypalData);
//echo $getPaypalQuery; die();

sendPaypalRequest($paypalEndPoint, $paypalData , 'GET' );

function sendPaypalRequest($endPoint, $data , $method = 'POST'){
        $host = 'https://api-3t.sandbox.paypal.com/';
        $url = $host.$endPoint.http_build_query($data);
       // echo $url;
       
        $ch = curl_init();                    // initiate curl
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
       // curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
        //if($putRequest){
       // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        //}
       // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // define what you want to post
        //curl_setopt($ch, CURLOPT_HEADER, true);
        $output = curl_exec($ch); // execute
        if($errno = curl_errno($ch)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
        }
        curl_close($ch); // close curl handle
        //var_dump($output);
        echo $output;
       
}
