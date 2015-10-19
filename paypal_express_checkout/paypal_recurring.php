<?php

$method = 'SetExpressCheckout';
const USER = 'rashid.akram-facilitator_api1.putitout.co.uk';
const PASSWORD = 'B7B6BGFXJTA92GME';
const SIGNATURE = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AUyz3714civtWFCQmkYGHRSzzlIY';
const CANCEL = 'http://localhost/testers/paypal_recurring_cancel.php';
const RETURN_URL = 'http://localhost/testers/paypal_recurring_return.php';
const ENDPOINT = 'nvp?';



SetExpressCheckout();    
function SetExpressCheckout(){

            $paypalData =  array(
                'USER' => USER,
                'PWD' => PASSWORD,
                'SIGNATURE' => SIGNATURE,
                'METHOD' => 'SetExpressCheckout',
                'VERSION' => '98',
                'PAYMENTREQUEST_0_AMT' => '3',
                'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
                'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
                'L_BILLINGTYPE0'=>'RecurringPayments',    //The type of billing agreement
                'L_BILLINGAGREEMENTDESCRIPTION0' => 'Package1Membership',    //The description of the billing agreement
                'cancelUrl' => CANCEL,
                'returnUrl' => RETURN_URL,

            );
            //echo $getPaypalQuery; die();
          $response = sendPaypalRequest($paypalEndPoint, $paypalData );
          if(isset($response['ACK']) && $response['ACK'] == 'Success'){
              header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$response['TOKEN']);
          }
}
  
function  CreateRecurringPaymentsProfile(){
        //createRecurringPaymentsProfile.php See the GitHub PayPal Developer Brazil

        $paypalData =  array(
                'USER' => $user,
                'PWD' => $password,
                'SIGNATURE' => $signature,
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
function    UpdateExpressCheckout(){    
        //Operation UpdateRecurringPaymentsProfile:


        $curl  = curl_init ();

        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($curl, CURLOPT_POST, true);
        curl_setopt ($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
        curl_setopt ($curl, CURLOPT_POSTFIELDS, http_build_query (array (
            'USER'  => $user,
            'PWD'  => $password,
            'SIGNATURE'  => $signature,

            'METHOD'  => 'UpdateRecurringPaymentsProfile',
            'Version'  => '108',
            'PROFILEID'  => 'I-FYYMDB55ADSH',

            'NOTE'  => 'An optional note explaining the reason for the change',
            'AMT'  => 120,
            'CurrencyCode'  => 'BRL'
        )));

        $response  = curl_exec ($curl);

        curl_close ($curl);

        $nvp  = array ();

        if  (preg_match_all ('/ ( <name> [^ \ =] +) \ = ( <value> [^ &] +) & /', $response, $matches)) {
            foreach  ($matches['name'] as $offset  => $name) {
                $nvp [$name] = urldecode ($matches ['value'] [$offset]);
            }
        }

        print_r ($nvp);
        
}


function sendPaypalRequest($endPoint, $data ){
        $host = 'https://api-3t.sandbox.paypal.com/';
        $url = $host.ENDPOINT.http_build_query($data);
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