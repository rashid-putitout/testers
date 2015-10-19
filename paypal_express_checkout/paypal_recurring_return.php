<?php

include_once('credentials.php');
include_once('functions.php');
//Operation GetExpressCheckout:

//getExpressCheckoutDetails.php See the GitHub PayPal Developer Brazil
$token = filter_input(INPUT_GET, 'token');
$PayerID = filter_input(INPUT_GET, 'PayerID');
if($token && !$PayerID){
$paypalData =  array(
        'USER' => USER,
        'PWD' => PASSWORD,
        'SIGNATURE' => SIGNATURE,
        'METHOD' => 'GetExpressCheckoutDetails',
        'VERSION' => '98',
        'TOKEN' => $token,
    );
  sendPaypalRequest(ENDPOINT, $paypalData );
}
    //'TOKEN=EC%2d9X131737EH360434A&BILLINGAGREEMENTACCEPTEDSTATUS=0&CHECKOUTSTATUS=PaymentActionNotInitiated&TIMESTAMP=2015%2d09%2d22T08%3a03%3a04Z&CORRELATIONID=a88a8ce18e6dd&ACK=Success&VERSION=98&BUILD=000000&CURRENCYCODE=USD&AMT=3%2e00&SHIPPINGAMT=0%2e00&HANDLINGAMT=0%2e00&TAXAMT=0%2e00&INSURANCEAMT=0%2e00&SHIPDISCAMT=0%2e00&PAYMENTREQUEST_0_CURRENCYCODE=USD&PAYMENTREQUEST_0_AMT=3%2e00&PAYMENTREQUEST_0_SHIPPINGAMT=0%2e00&PAYMENTREQUEST_0_HANDLINGAMT=0%2e00&PAYMENTREQUEST_0_TAXAMT=0%2e00&PAYMENTREQUEST_0_INSURANCEAMT=0%2e00&PAYMENTREQUEST_0_SHIPDISCAMT=0%2e00&PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED=false&PAYMENTREQUEST_0_ADDRESSNORMALIZATIONSTATUS=None&PAYMENTREQUESTINFO_0_ERRORCODE=0';

  if($PayerID && $token){
      
       $paypalData =  array(
            'USER' => USER,
            'PWD' => PASSWORD,
            'SIGNATURE' => SIGNATURE,
                'METHOD' => 'CreateRecurringPaymentsProfile',
                'VERSION' => '98',
                'TOKEN' => $token,
                'PAYERID' => $PayerID,   //Identifies the customer's account
                'PROFILESTARTDATE' => '2015-09-22T00:00:00Z',    //Billing date start, in UTC/GMT format
                'DESC' => 'Package1Membership',    //Profile description - same as billing agreement description
                'BILLINGPERIOD' => 'Month',    //Period of time between billings
                'BILLINGFREQUENCY' => 1,    //Frequency of charges 
                'AMT' => 3,    //The amount the buyer will pay in a payment period
                'CURRENCYCODE' => 'USD',    //The currency, e.g. US dollars
                //'COUNTRYCODE' => 'US',    #The country code, e.g. US  
                'MAXFAILEDPAYMENTS' => 3,    #Maximum failed payments before suspension of the profile
                

            );
            //echo $getPaypalQuery; die();
        $response =   sendPaypalRequest(ENDPOINT, $paypalData);
        echo '<pre>';
                print_r($response);
  }

