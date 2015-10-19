<?php

include_once('credentials.php');
include_once('functions.php');


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
  $response = sendPaypalRequest(ENDPOINT, $paypalData );
  if(isset($response['ACK']) && $response['ACK'] == 'Success'){
      header('Location: '.URL.'/cgi-bin/webscr?cmd=_express-checkout&token='.$response['TOKEN']);
  }


