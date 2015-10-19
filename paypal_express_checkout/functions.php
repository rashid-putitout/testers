<?php

function sendPaypalRequest($endPoint, $data ){
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
          //  echo "cURL error ({$errno}):\n {$error_message}";
        }
        curl_close($ch); // close curl handle
        //var_dump($output);
        //echo $output;
        $arr = array();
        parse_str($output,$arr);
       // echo '<pre>'; print_r($arr);
 return $arr;
       
}