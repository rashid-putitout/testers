<?php

const USER = 'rashid.akram-facilitator_api1.putitout.co.uk';
const PASSWORD = 'B7B6BGFXJTA92GME';
const SIGNATURE = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AUyz3714civtWFCQmkYGHRSzzlIY';
const CANCEL = 'http://localhost/testers/paypal_recurring_cancel.php';
const RETURN_URL = 'http://localhost/testers/paypal_recurring_return.php';
const ENDPOINT = 'nvp?';

$token = '';
$status = 0;
$payerId = 0;
if(isset($_REQUEST['ACK']) && $_REQUEST['ACK'] == 'Success'){
    
      
        echo '<pre>'; print_r($_REQUEST);
}
else{
    GetExpressCheckout();
}
function GetExpressCheckout(){
        //Operation GetExpressCheckout:

        //getExpressCheckoutDetails.php See the GitHub PayPal Developer Brazil

         $paypalData =  array(
                'USER' => USER,
                'PWD' => PASSWORD,
                'SIGNATURE' => SIGNATURE,
                'METHOD' => 'GetExpressCheckoutDetails',
                'VERSION' => '98',
                'TOKEN' => $_REQUEST['token'],
            );
            //'TOKEN=EC%2d9X131737EH360434A&BILLINGAGREEMENTACCEPTEDSTATUS=0&CHECKOUTSTATUS=PaymentActionNotInitiated&TIMESTAMP=2015%2d09%2d22T08%3a03%3a04Z&CORRELATIONID=a88a8ce18e6dd&ACK=Success&VERSION=98&BUILD=000000&CURRENCYCODE=USD&AMT=3%2e00&SHIPPINGAMT=0%2e00&HANDLINGAMT=0%2e00&TAXAMT=0%2e00&INSURANCEAMT=0%2e00&SHIPDISCAMT=0%2e00&PAYMENTREQUEST_0_CURRENCYCODE=USD&PAYMENTREQUEST_0_AMT=3%2e00&PAYMENTREQUEST_0_SHIPPINGAMT=0%2e00&PAYMENTREQUEST_0_HANDLINGAMT=0%2e00&PAYMENTREQUEST_0_TAXAMT=0%2e00&PAYMENTREQUEST_0_INSURANCEAMT=0%2e00&PAYMENTREQUEST_0_SHIPDISCAMT=0%2e00&PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED=false&PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS=None&PAYMENTREQUESTINFO_0_ERRORCODE=0';
          sendPaypalRequest(ENDPOINT, $paypalData );
}


function  CreateRecurringPaymentsProfile($token,$payerId){
        //createRecurringPaymentsProfile.php See the GitHub PayPal Developer Brazil

        $paypalData =  array(
                'USER' => USER,
                'PWD' => PASSWORD,
                'SIGNATURE' => SIGNATURE,
                'METHOD' => 'CreateRecurringPaymentsProfile',
                'VERSION' => '98',
                'TOKEN' => 'EC-9X131737EH360434A',
                'PAYERID' => 'payer_id_value',   //Identifies the customer's account
                'PROFILESTARTDATE' => '2015-09-22T00:00:00Z',    //Billing date start, in UTC/GMT format
                'DESC' => 'Package1Membership',    //Profile description - same as billing agreement description
                'BILLINGPERIOD' => 'Month',    //Period of time between billings
                'BILLINGFREQUENCY' => 1,    //Frequency of charges 
                'AMT' => 3,    //The amount the buyer will pay in a payment period
                'CURRENCYCODE' => 'USD',    //The currency, e.g. US dollars
                //'COUNTRYCODE' => 'US',    #The country code, e.g. US  
                'MAXFAILEDPAYMENTS' => 3,    #Maximum failed payments before suspension of the profile
                'cancelUrl' => $cancelURL,
                'returnUrl' => $returnURL,

            );
            //echo $getPaypalQuery; die();
          sendPaypalRequest($paypalEndPoint, $paypalData , 'GET' );
}

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
            echo "cURL error ({$errno}):\n {$error_message}";
        }
        curl_close($ch); // close curl handle
        //var_dump($output);
        //echo $output;
        $arr = array();
        parse_str($output,$arr);
        echo '<pre>'; print_r($arr);
 return $arr;
       
}